<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Transfer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <base href="{{ url('/') }}/" target="_self">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
    
    <style>
        .container{
            height: auto;
            margin-top: 150px;
       
        }
        @media (max-width: 768px) {
            .form-group {
                margin-bottom: 15px;
            }

            .row > .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>


    
    @include('layout.dash')
    <div class="container ">
        
        <h2>Add Transfer Type</h2>
        
        <!-- Display success message after addition or deletion -->
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        
        <form action="{{ route('admin.transfers.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="name">Transfer Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="dimensions">Dimensions</label>
                    <input type="text" name="dimensions" id="dimensions" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="duration">Duration (Optional)</label>
                    <input type="text" name="duration" id="duration" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="space_dimensions">Space Dimensions</label>
                    <input type="text" name="space_dimensions" id="space_dimensions" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="max_items">Max Items</label>
                    <input type="number" name="max_items" id="max_items" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="surveillance">Surveillance</label>
                    <select name="surveillance" id="surveillance" class="form-control" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="rental_duration">Rental Duration</label>
                    <input type="text" name="rental_duration" id="rental_duration" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="delivery_service">Delivery Service</label>
                    <select name="delivery_service" id="delivery_service" class="form-control" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="usage_rules">Usage Rules</label>
                    <textarea name="usage_rules" id="usage_rules" class="form-control" required></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>

        <h2 style="margin-top: 25px">Available Transfer Types</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Transfer Name</th>
                    <th>Dimensions</th>
                    <th>Price</th>
                    <th>Duration</th>
                    <th>Space Dimensions</th>
                    <th>Max Items</th>
                    <th>Surveillance</th>
                    <th>Rental Duration</th>
                    <th>Delivery Service</th>
                    <th>Usage Rules</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packageTypes as $packageType)
                    <tr>
                        <td>{{ $packageType->name }}</td>
                        <td>{{ $packageType->dimensions }}</td>
                        
                        @php
                            // استخدام أول قيمة من packagePricing
                            $packagePricing = $packageType->packagePricing->first();
                        @endphp
                        
                        <td>{{ $packagePricing->price ?? 'غير متوفر' }}</td>
                        <td>{{ $packagePricing->duration ?? 'غير متوفر' }}</td>
                        <td>{{ $packagePricing->space_dimensions ?? 'غير متوفر' }}</td>
                        <td>{{ $packagePricing->max_items ?? 'غير متوفر' }}</td>
                        <td>{{ $packagePricing->surveillance ?? 'غير متوفر' }}</td>
                        <td>{{ $packagePricing->rental_duration ?? 'غير متوفر' }}</td>
                        <td>{{ $packagePricing->delivery_service ?? 'غير متوفر' }}</td>
                        <td>{{ $packagePricing->usage_rules ?? 'غير متوفر' }}</td>

                        <td>
                            <!-- زر التحرير -->
                            <a href="{{ route('admin.transfers.edit', $packageType->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- نموذج الحذف -->
                            <form action="{{ route('admin.transfers.destroy', $packageType->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
