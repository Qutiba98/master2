<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Inventory</title>
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
            color: #ffffff;
        }

        label {
            color: #f0f0f0;
        }

        .form-control {
            background-color: #2b2d2f;
            color: #f0f0f0;
            border: 1px solid #ffffff;
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

        .my-custom-alert {
            background-color: #1d643b;
            color: #ffffff;
            border: 1px solid #28a745;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .my-custom-error-alert {
            background-color: #721c24;
            color: #ffffff;
            border: 1px solid #f5c6cb;
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
        <h1>Create Inventory</h1>

        @if (session('success'))
            <div class="alert alert-success my-custom-alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger my-custom-error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.storeWearhouse') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="location">Location Wearhouse</label>
                <select style="color:#e5e6e7" name="Locationname" class="form-control" required>
                    <option value="">Select Wearhouse</option>
                    <option value="Amman">Amman</option>
                    <option value="Salt">Salt</option>
                    <option value="Irbad">Irbad</option>
                </select>

                <label for="type" style="padding-top: 15px">Type</label>
                <select style="color:#e5e6e7" name="type" class="form-control" required>
                    <option value="" disabled selected>Select type</option>
                    <option value="global">Global</option>
                    <option value="local">Local</option>
                </select>

                <label for="name" style="padding-top: 15px">Name</label>
                <select style="color:#e5e6e7" name="Inventoryname" class="form-control" required>
                    <option value="">Select category</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>

                <label for="space" style="padding-top: 15px">Space</label>
                <input type="number" name="space" class="form-control" placeholder="Enter space in meters" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Create Inventory</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
