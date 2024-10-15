<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User</title>
    <base href="{{ url('/') }}/" target="_self">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">

    <style>
        body {
            background-color: #1d1f21;
            color: #c4c4c4;
        }

        .container {
            margin-top: 30px;
        }

        h1 {
            color: #ffffff;
            margin-bottom: 20px;
        }

        label {
            color: #f0f0f0;
        }

        .form-control {
            background-color: #2b2d2f;
            color: #f0f0f0;
            border: 1px solid #00c89e;
        }

        .form-control:focus {
            background-color: #333;
            color: #fff;
            border-color: #ffffff;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #ffffff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #ffffff;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: center;
            color: #f0f0f0;
        }

        .custom-table thead th {
            background-color: #282a2c;
            padding: 12px;
            border-bottom: 2px solid #ffffff;
        }

        .custom-table tbody tr {
            border-bottom: 1px solid #444;
        }

        .custom-table tbody tr:hover {
            background-color: #343636;
            color: #fcfcfc;
            cursor: pointer;
        }

        .custom-table td,
        .custom-table th {
            padding: 12px;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #f0f0f0;
        }

        .my-custom-error-alert {
            background-color: #555252;
            color: #ffffff;
            border: 1px solid #e20b20;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .my-custom-alert {
            background-color: #ffffff;
            border: 1px solid #ffffff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>

</head>

<body>

    @include('layout.dash')

    <div class="container mt-5">
        <h1>Wearhouse</h1>

        @if ($errors->any())
            <div class="alert my-custom-error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert my-custom-alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="custom-table mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Warehouse Name</th>
                    <th>Warehouse ID</th>
                    <th>Space (sqm)</th>
                    <th>Total Space (sqm)</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($inventories) && $inventories->isNotEmpty())
                    @foreach($inventories as $inventory)
                        <tr>
                            <td>{{ $inventory->id }}</td>
                            <td>{{ $inventory->location->name ?? '' }}</td>
                            <td>{{ $inventory->name ?? '' }}</td>
                            <td>{{ $inventory->space ?? '' }}</td>
                            <td>{{ $inventory->total_space ?? '' }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No inventories found.</td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                @if(isset($totalSpaceByWarehouse) && $totalSpaceByWarehouse->isNotEmpty())
                    @foreach($totalSpaceByWarehouse as $locationId => $totalSpace)
                        <tr>
                            <td colspan="3">{{ $inventories->where('location_id', $locationId)->first()->location->name ?? '' }}</td>
                            <td colspan="2"><strong>{{ $totalSpace }} sqm</strong></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No total space found.</td>
                    </tr>
                @endif
            </tfoot>
        </table>
    </div>

 

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>
