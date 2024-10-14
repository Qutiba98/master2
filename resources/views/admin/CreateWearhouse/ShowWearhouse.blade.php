

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

        h1 {
            color: #00c89e;
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
            border-color: #00c89e;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #00c89e;
            border: none;
        }

        .btn-primary:hover {
            background-color: #009e7e;
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
            border-bottom: 2px solid #00c89e;
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

        .custom-table .highlight {
            background-color: #343636;
            font-weight: bold;
            color: #fcfcfc;
            border-bottom: 1px solid #ddd;
        }

        .custom-table strong {
            color: #00c89e;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #f0f0f0;
        }


.my-custom-error-alert {
    background-color: #555252; /* Light red background */
    color: #ffffff; /* Dark red text */
    border: 1px solid #e20b20; /* Red border */
    padding: 15px; /* Padding */
    margin-bottom: 20px; /* Margin at the bottom */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Font size */
}

.my-custom-alert {
    background-color: #3fa457; /* Light green background */
    color: #155724; /* Dark green text */
    border: 1px solid #1a7e31; /* Green border */
    padding: 15px; /* Padding */
    margin-bottom: 20px; /* Margin at the bottom */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Font size */
}



    </style>

</head>

<body>



    @include('layout.dash')
    <div class="container mt-5">


<table class="custom-table mt-5">

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
                <td colspan="5"></td>
            </tr>
        @endif
    </tbody>
    <tfoot>
        @if(isset($totalSpaceByWarehouse) && $totalSpaceByWarehouse->isNotEmpty())
            @foreach($totalSpaceByWarehouse as $locationId => $totalSpace)
                <tr class="highlight">
                    <td colspan="3">
                        @php
                            $location = $inventories->where('location_id', $locationId)->first();
                        @endphp
                        {{ $location ? $location->location->name : '' }}
                    </td>
                    <td colspan="2"><strong>{{ $totalSpace }} sqm</strong></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5"></td>
            </tr>
        @endif
    </tfoot>
</table>

    </div>

    <footer>
        &copy; 2024 Your Company. All rights reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>
