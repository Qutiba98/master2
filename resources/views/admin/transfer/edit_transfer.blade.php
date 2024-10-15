<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transfer Type</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <base href="{{ url('/') }}/" target="_self">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
</head>
<body>

    @include('layout.dash')

    <div class="container">
        <h2>Edit Transfer Type</h2>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.transfers.update', $packageType->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Transfer Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $packageType->name }}" required>
            </div>
            <div class="form-group">
                <label for="dimensions">Dimensions</label>
                <input type="text" name="dimensions" id="dimensions" class="form-control" value="{{ $packageType->dimensions }}" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $packageType->price) }}" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="number" name="duration" id="duration" class="form-control" value="{{ old('duration', $packageType->duration) }}">
            </div>
            <div class="form-group">
                <label for="space_dimensions">Space Dimensions</label>
                <input type="text" name="space_dimensions" id="space_dimensions" class="form-control" value="{{ old('space_dimensions', $packageType->space_dimensions) }}" required>
            </div>
            <div class="form-group">
                <label for="max_items">Max Items</label>
                <input type="number" name="max_items" id="max_items" class="form-control" value="{{ old('max_items', $packageType->max_items) }}" required>
            </div>
            <div class="form-group">
                <label for="surveillance">Surveillance</label>
                <select name="surveillance" id="surveillance" class="form-control" required>
                    <option value="yes" {{ $packageType->surveillance ? 'selected' : '' }}>Yes</option>
                    <option value="no" {{ !$packageType->surveillance ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rental_duration">Rental Duration</label>
                <input type="text" name="rental_duration" id="rental_duration" class="form-control" value="{{ old('rental_duration', $packageType->rental_duration) }}" required>
            </div>


                <div class="form-group">
                    <label for="delivery_service">Delivery Service</label>
                    <select name="delivery_service" id="delivery_service" class="form-control" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>




       


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- JavaScript to show alert for success message -->
    @if(session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

</body>
</html>
