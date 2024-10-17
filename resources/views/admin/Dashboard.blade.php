<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
    <base href="{{ url('/') }}/" target="_self">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    <style>
        /* تنسيق الجدول الأساسي */
        .table-custom {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table-custom th, .table-custom td {
            border: 1px solid #534d4d;
            padding: 8px;
            text-align: left;
            word-wrap: break-word; /* للسماح بكسر الكلمات الطويلة */
        }

        .table-custom th {
            background-color: #191C24;
            color: rgb(255, 255, 255);
            font-weight: bold;
        }

        /* شارات مخصصة */
        .badge-warning, .badge-success, .badge-danger {
            padding: 5px 10px;
            border-radius: 4px;
            display: block; /* اجعل الشارات تظهر في سطر منفصل */
            margin-bottom: 5px; /* إضافة مسافة لتجنب التداخل */
        }

        /* استجابة الجدول */
        @media screen and (max-width: 768px) {
            .table-custom thead {
                display: none; /* إخفاء رأس الجدول على الأجهزة الصغيرة */
            }

            .table-custom tbody, .table-custom tr, .table-custom td {
                display: block;
                width: 100%;
            }

            .table-custom tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                padding: 10px;
                border-radius: 5px;
            }

            .table-custom td {
                text-align: right;
                padding-left: 50%;
                position: relative;
                word-wrap: break-word;
            }

            .table-custom td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                white-space: nowrap;
                font-weight: bold;
            }
        }

        /* تحسين مساحة الرسم البياني */
        .card-body {
            padding: 20px; /* تأكد من أن هناك مسافة كافية حول الرسم البياني */
        }
        
        .infographic {
            margin-top: 20px;
        }

        .warehouse {
            margin-bottom: 15px;
        }
        
        .area {
            height: 20px;
            background-color: rgba(75, 192, 192, 0.7);
        }
    </style>
</head>

<body>

@include('layout.dash')

<div class="col-lg-9 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Users</h4>
            <div class="table-responsive" style="overflow-x:auto;">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>Total Price</th>
                            <th>Size</th>
                            <th>Payment</th>
                            <th>Storage Duration</th>
                            <th>Created</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sortedUsers as $user)
                            @if($user->inventoryRequests->isNotEmpty())
                                @foreach($user->inventoryRequests as $request)
                                    <tr>
                                        <td data-label="User Id">{{ $user->id }}</td>
                                        <td data-label="User Name">{{ $user->name }}</td>
                                        <td data-label="Total Price">{{ $request->total_price }}</td>
                                        <td data-label="Size">{{ $request->size }}</td>
                                        <td data-label="Payment">{{ $request->payment_method }}</td>
                                        <td data-label="Storage Duration">{{ $request->storage_duration }}</td>
                                        <td data-label="Created">{{ $request->created_at }}</td>
                                        <td data-label="Status">
                                            <label class="badge
                                                @if($request->status_id == 1)
                                                    badge-warning
                                                @elseif($request->status_id == 2)
                                                    badge-success
                                                @elseif($request->status_id == 3)
                                                    badge-danger
                                                @endif
                                            ">
                                                @switch($request->status_id)
                                                    @case(1)
                                                        Pending
                                                        @break
                                                    @case(2)
                                                        Accepted
                                                        @break
                                                    @case(3)
                                                        Rejected
                                                        @break
                                                    @default
                                                        Unknown
                                                @endswitch
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br><br>

            <h4 class="card-title">Total Requests</h4>
            <div class="col-lg-6 grid-margin stretch-card">
                <canvas id="barChart"></canvas>
            </div>

<!-- Warehouse Space Section -->
<div class="infographic">
    <h4>Warehouse Space</h4>
    <br>
    @foreach ($totalSpaceByWarehouse as $warehouse)
        <div class="warehouse">
            <h5>Warehouse: {{ $warehouse['inventory_name'] }} from {{ $warehouse['location_name'] }}</h5>
            <p style="color: rgb(182, 180, 180)">Total Space: {{ $warehouse['total_space'] }} Capacity: {{ $warehouse['space'] }}</p>
            <div class="area" style="width: {{ $warehouse['total_space'] }}px;"></div>
        </div>
    @endforeach
</div>

<!-- Including Chart.js Library for Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('barChart').getContext('2d');

        var colorsByYear = {
            2022: 'rgba(255, 99, 132, 0.5)',
            2023: 'rgba(54, 162, 235, 0.5)',
            2024: 'rgba(75, 192, 192, 0.5)',
            2025: 'rgba(153, 102, 255, 0.5)'
        };

        var borderColorByYear = {
            2022: 'rgba(255, 99, 132, 1)',
            2023: 'rgba(54, 162, 235, 1)',
            2024: 'rgba(75, 192, 192, 1)',
            2025: 'rgba(153, 102, 255, 1)'
        };

        var labels = [];
        var data = [];
        var backgroundColors = [];
        var borderColors = [];

        @foreach($monthlyRequests as $request)
            labels.push('{{ $request->year }}');
            data.push({{ $request->total }});
            backgroundColors.push(colorsByYear[{{ $request->year }}]);
            borderColors.push(borderColorByYear[{{ $request->year }}]);
        @endforeach

        var barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Requests',
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 2, // ثخانة الحواف
                    borderRadius: 8, // إضافة زوايا دائرية
                    hoverBackgroundColor: 'rgba(0, 200, 158, 0.5)', // تغيير اللون عند المرور
                    hoverBorderColor: 'rgba(0, 200, 158, 1)', // تغيير لون الحواف عند المرور
                }]
            },
            options: {
                responsive: true, // جعل المخطط متجاوب
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw + ' requests';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#555', // لون النص في المحور Y
                        }
                    },
                    x: {
                        ticks: {
                            color: '#555', // لون النص في المحور X
                        }
                    }
                }
            }
        });
    });
</script>

<!-- plugins:js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
