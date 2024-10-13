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
    </style>

</head>

<body>

    @include('layout.dash')

    <div class="container mt-5">
        <h1>Create Inventory</h1>

        <form action="{{ route('admin.storeWearhouse') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="location">Location Wearhouse</label>
                <select name="Locationname" class="form-control" required>
                    <option value="">Select Wearhouse</option>
                    <option value="Amman">Amman</option>
                    <option value="Salt">Salt</option>
                    <option value="Irbad">Irbad</option>
                </select>

                <label for="type">Type</label>
                <select name="type" class="form-control" required>
                    <option value="" disabled selected>Select type</option>
                    <option value="global">Global</option>
                    <option value="local">Local</option>
                </select>

                <label for="name">Name</label>
                <select name="Inventoryname" class="form-control" required>
                    <option value="">Select category</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Create Inventory</button>
        </form>

        <table class="custom-table mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Wearhouse Name</th>
                    <th>Wearhouse ID</th>
                    <th>Space (sqm)</th>
                    <th>Total Space (sqm)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->id }}</td>
                    <td>{{ $inventory->location->name }}</td>
                    <td>{{ $inventory->name }}</td>
                    <td>{{ $inventory->space }}</td>
                    <td>{{ $inventory->total_space }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                @foreach($totalSpaceByWarehouse as $locationId => $totalSpace)
                <tr class="highlight">
                    <td colspan="3">Total Space for {{ $inventories->where('location_id', $locationId)->first()->location->name }}</td>
                    <td colspan="2"><strong>{{ $totalSpace }} sqm</strong></td>
                </tr>
                @endforeach
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
