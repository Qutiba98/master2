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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            color: white;
        }
        .text-center {
            color: #ffffff;
        }

        h4 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: white;
        }





        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
            background: #191C24;
            color: white;
        }

        th {
            color: #ffffff;
        }



        tr:nth-child(even) {
            background-color: #191C24;
        }

        tr:hover {
            background-color: #ffffff;
            color: white;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-size: 0.9em;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-info {
            background-color: #17a2b8;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        .btn-custom {
            margin-right: 5px;
        }

        .custom-button {
            margin-bottom: 5px;
        }



    </style>
</head>
<body>
    <div>s</div>
    <div>s</div>

    @include('layout.dash')

    <div class="custom-container">
        <div class="container mt-5">
            <h4 class="text-center">My Requests</h4>
            @if($inventoryRequests->isEmpty())
                <div class="alert alert-warning text-center">You have no current requests.</div>
            @else
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Name</th>
                        <th>Housing Details</th>
                        <th>Status</th>
                        <th>Size</th>
                        <th>Breakable</th>
                        <th>Requested Service</th>
                        <th>Message</th>
                        <th>Total Price</th>
                        <th>Request Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
@foreach($inventoryRequests as $inventoryRequest)
    <tr>
        <td>{{ $inventoryRequest->id }}</td>
        <td>{{ $inventoryRequest->name }}</td>
        <td>{{ $inventoryRequest->housing_details }}</td>
        <td>
            @if($inventoryRequest->status_id == 1)
                <span class="badge badge-success">Pending</span>
            @elseif($inventoryRequest->status_id == 2)
                <span class="badge badge-info">In Progress</span>
            @else
                <span class="badge badge-danger">Completed</span>
            @endif
        </td>
        <td>{{ $inventoryRequest->size }}</td>
        <td>{{ $inventoryRequest->breakable ? 'Yes' : 'No' }}</td>
        <td>{{ $inventoryRequest->delivery_service }}</td>
        <td>{{ $inventoryRequest->message }}</td>
        <td>${{ number_format($inventoryRequest->total_price, 2) }}</td>
        <td>{{ $inventoryRequest->created_at->format('d/m/Y') }}</td>
<td>
    <!-- التحقق من حالة الطلب لعرض الأزرار المناسبة -->
    @if($inventoryRequest->status_id == 1)
        <!-- أزرار القبول والرفض فقط في حالة الطلب "معلق" -->
        <form action="{{ route('admin.updateRequest', $inventoryRequest->id) }}" method="POST" class="d-flex flex-column">
            @csrf
            @method('PATCH')
            <input type="hidden" name="size" value="{{ $inventoryRequest->size }}">
            <input type="hidden" name="location_id" value="{{ $inventoryRequest->location_id }}">
            <button type="submit" name="action" value="accept" class="btn btn-success btn-sm w-100 custom-button">Accept</button>
            <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm w-100 custom-button">Reject</button>
        </form>
    @elseif($inventoryRequest->status_id == 2)
        <!-- إذا كان الطلب قيد التنفيذ، يمكن إظهار زر "Reject" لتغييره إلى مرفوض -->
        <form action="{{ route('admin.updateRequest', $inventoryRequest->id) }}" method="POST" class="d-flex flex-column">
            @csrf
            @method('PATCH')
            <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm w-100 custom-button">Reject</button>
        </form>
    @elseif($inventoryRequest->status_id == 3)
        <!-- إذا كان الطلب مرفوضًا، يمكن إظهار زر "Accept" لتغييره إلى "Pending" أو "In Progress" -->
        <form action="{{ route('admin.updateRequest', $inventoryRequest->id) }}" method="POST" class="d-flex flex-column">
            @csrf
            @method('PATCH')
            <button type="submit" name="action" value="accept" class="btn btn-success btn-sm w-100 custom-button">Accept</button>
            <button type="submit" name="action" value="pending" class="btn btn-warning btn-sm w-100 custom-button">Set to Pending</button>
        </form>
        <span class="badge badge-danger">Rejected</span>
    @endif
</td>
    </tr>
@endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
