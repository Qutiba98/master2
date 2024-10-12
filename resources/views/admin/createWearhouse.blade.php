   
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
</head>
<body>

   

@include('layout.dash')

<div class="container mt-5"">
<DIV> </DIV>
<DIV> </DIV>

    <h1 style="color: white">Create Inventory</h1>

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
            {{-- <label for="name">Name</label> --}}
            {{-- <input type="text" name="name" class="form-control" required>
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required> --}}
        </div>

        <button type="submit" class="btn btn-primary">Create Inventory</button>

    </form>
</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</body>
</html>
