<!-- create_transfer.blade.php -->
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
        .container {
            height: auto;
            margin-top: 150px;
        }
    </style>
</head>
<body>
    @include('layout.dash')
    <div class="container">
        <h2>Add Transfer Type</h2>
        
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        
        <form action="{{ route('admin.transfers.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="name">Transfer Type</label>
                    <select name="name" id="name" class="form-control" required>
                        <option value="">Select Transfer Type</option>
                        <option value="Sea">Sea</option>
                        <option value="Air">Air</option>
                        <option value="Land">Land</option>
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label for="dimensions">Transport Method</label>
                    <select name="dimensions" id="dimensions" class="form-control" required>
                        <option value="">Select Transport Method</option>
                        <option value="By Ship">By Ship</option>
                        <option value="By Air">By Air</option>
                        <option value="By Truck">By Truck</option>
                    </select>
                </div>
            </div>

            <!-- Price and Details for 1 Month -->
            <h3>1 Month</h3>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="price_1_month">Price $</label>
                    <input type="number" name="price_1_month" id="price_1_month" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="space_dimensions_1_month">Space Dimensions</label>
                    <input type="text" name="space_dimensions_1_month" id="space_dimensions_1_month" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="max_items_1_month">Max Items</label>
                    <input type="number" name="max_items_1_month" id="max_items_1_month" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="surveillance_1_month">Surveillance</label>
                    <select name="surveillance_1_month" id="surveillance_1_month" class="form-control" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="rental_duration_1_month">Rental Duration</label>
                    <input type="text" name="rental_duration_1_month" id="rental_duration_1_month" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="delivery_service_1_month">Delivery Service</label>
                    <select name="delivery_service_1_month" id="delivery_service_1_month" class="form-control" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="usage_rules_1_month">Usage Rules</label>
                    <textarea name="usage_rules_1_month" id="usage_rules_1_month" class="form-control" required></textarea>
                </div>
            </div>

            <!-- Price and Details for 6 Months -->
            <h3>6 Months</h3>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="price_6_month">Price $</label>
                    <input type="number" name="price_6_month" id="price_6_month" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="space_dimensions_6_month">Space Dimensions</label>
                    <input type="text" name="space_dimensions_6_month" id="space_dimensions_6_month" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="max_items_6_month">Max Items</label>
                    <input type="number" name="max_items_6_month" id="max_items_6_month" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="surveillance_6_month">Surveillance</label>
                    <select name="surveillance_6_month" id="surveillance_6_month" class="form-control" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="rental_duration_6_month">Rental Duration</label>
                    <input type="text" name="rental_duration_6_month" id="rental_duration_6_month" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="delivery_service_6_month">Delivery Service</label>
                    <select name="delivery_service_6_month" id="delivery_service_6_month" class="form-control" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="usage_rules_6_month">Usage Rules</label>
                    <textarea name="usage_rules_6_month" id="usage_rules_6_month" class="form-control" required></textarea>
                </div>
            </div>

            <!-- Price and Details for 1 Year -->
            <h3>1 Year</h3>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="price_1_year">Price $</label>
                    <input type="number" name="price_1_year" id="price_1_year" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="space_dimensions_1_year">Space Dimensions</label>
                    <input type="text" name="space_dimensions_1_year" id="space_dimensions_1_year" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="max_items_1_year">Max Items</label>
                    <input type="number" name="max_items_1_year" id="max_items_1_year" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="surveillance_1_year">Surveillance</label>
                    <select name="surveillance_1_year" id="surveillance_1_year" class="form-control" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="rental_duration_1_year">Rental Duration</label>
                    <input type="text" name="rental_duration_1_year" id="rental_duration_1_year" class="form-control" required>
                </div>

                <div class="col-md-6 form-group">
                    <label for="delivery_service_1_year">Delivery Service</label>
                    <select name="delivery_service_1_year" id="delivery_service_1_year" class="form-control" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="usage_rules_1_year">Usage Rules</label>
                    <textarea name="usage_rules_1_year" id="usage_rules_1_year" class="form-control" required></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Add Transfer Type</button>
        </form>
    </div>
</body>
</html>
