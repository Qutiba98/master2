<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Information</title>
    <base href="{{ url('/') }}/" target="_self">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>



    <style>
        body {
            color: black;
            background-color: #f8f9fa; /* Light background color */
        }
        .card {
            border: none;
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }
        .card-header {
            border-radius: 15px 15px 0 0; /* Rounded corners on top */
        }
        h1, h4 {
            color: #333; /* Darker text color */
        }
        .btn-primary {
            background-color: #FF3414; /* Required color */
            border: none;
            transition: background-color 0.3s; /* Transition effect */
        }
        .btn-primary:hover {
            background-color: #e63012; /* Hover color */
        }
        .form-group {
            margin-bottom: 1.5rem; /* Increase space between fields */
        }
    </style>
</head>
<body>
   <x-navigation />
   <div class="container mt-5">


@if(session('success'))
    <script>
        swal({
            title: "Success!",
            text: "Your booking request has been successfully submitted.",
            icon: "success",
            button: "Okay",
        });
    </script>
@endif

       <h1 class="text-center mb-4">Payment Process</h1>

       @if(isset($pricing))
           <h4 class="text-center mb-3">Please fill in the payment details below:</h4>
           <div class="card">
               <div class="card-header bg-info text-white">
                   <h5 class="mb-0">Payment Form</h5>
               </div>
               <div class="card-body">
                   <form action="{{ route('booking.requests.store') }}" method="POST">
                       @csrf
                       <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                       <input type="hidden" name="package_type_id" value="{{ $pricing->package_type_id }}">
                       <input type="hidden" name="duration" value="{{ $pricing->duration }}">
                       <input type="hidden" name="price" value="{{ $pricing->price }}">

                       <div class="row">
                           <div class="form-group col-md-6">
                               <label for="country" class="text-dark">Country</label>
                               <select name="country" class="form-control" required onchange="updatePrice()">
                                   <option data-display="Select Country" value="">Select Country</option>
                                   <option value="Germany" data-price="100">Germany - $100</option>
                                   <option value="France" data-price="120">France - $120</option>
                                   <option value="Italy" data-price="110">Italy - $110</option>
                                   <option value="Spain" data-price="105">Spain - $105</option>
                                   <option value="Netherlands" data-price="115">Netherlands - $115</option>
                                   <option value="Egypt" data-price="80">Egypt - $80</option>
                                   <option value="USA" data-price="130">USA - $130</option>
                               </select>
                           </div>

                           <div class="form-group col-md-6">
                               <label for="breakable" class="text-dark">Is the item breakable?</label>
                               <select id="breakable" name="breakable" class="form-control" required onchange="updatePrice()">
                                   <option value="" disabled selected>Select breakable option</option>
                                   <option value="yes">Yes</option>
                                   <option value="no">No</option>
                               </select>
                           </div>
                       </div>

                       <div class="row">
                           <div class="form-group col-md-6">
                               <label for="cardName" class="text-dark">Cardholder Name</label>
                               <input type="text" class="form-control" id="cardName" name="card_name" required>
                           </div>

                           <div class="form-group col-md-6">
                               <label for="cardNumber" class="text-dark">Card Number</label>
                               <input type="text" class="form-control" id="cardNumber" name="card_number" required>
                           </div>
                       </div>

                       <div class="row">
                           <div class="form-group col-md-6">
                               <label for="expiryDate" class="text-dark">Expiry Date</label>
                               <input type="month" class="form-control" id="expiryDate" name="expiry_date" required>
                           </div>

                           <div class="form-group col-md-6">
                               <label for="cvv" class="text-dark">CVV</label>
                               <input type="text" class="form-control" id="cvv" name="cvv" required>
                           </div>
                       </div>

                       <div class="mt-4">
                           <h5>Price Details:</h5>
                           <ul id="price-details" class="list-group">
                               <li class="list-group-item">Package Price: <span id="package-price">0</span> $</li>
                               <li class="list-group-item">Country Price: <span id="country-price">0</span> $</li>
                               <li class="list-group-item">Breakable Item Surcharge: <span id="breakable-price">0</span> $</li>
                           </ul>
                       </div>

                       <div class="form-group">
                           <label for="total" class="text-dark">Total</label>
                           <input type="text" class="form-control" id="total" name="total" readonly>
                       </div>

                       <div class="text-center mt-4">
                           <button type="submit" class="btn btn-primary">Confirm Payment</button>
                       </div>
                   </form>
               </div>
           </div>
       @else
           <p class="text-center">No data available to display.</p>
       @endif
   </div>

   <x-footer />

   <script src="js/vendor/jquery-1.12.4.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/main.js"></script>

   <script>
       let basePrice = parseFloat("{{ $pricing->price }}"); // Get the base price once

       function updatePrice() {
           const countrySelect = document.querySelector('select[name="country"]');
           const selectedOption = countrySelect.options[countrySelect.selectedIndex];
           const countryPrice = parseFloat(selectedOption.getAttribute('data-price')) || 0;

           const breakableSelect = document.getElementById('breakable');
           const isBreakable = breakableSelect.value === "yes";

           // Calculate surcharge if the item is breakable
           const breakableIncrease = isBreakable ? basePrice * 0.05 : 0;

           // Calculate package price
           const packagePrice = basePrice; // You can customize the package price as needed

           // Calculate total
           const total = packagePrice + countryPrice + breakableIncrease;

           // Update fields
           document.getElementById('total').value = total.toFixed(2); // Display number in decimal format
           document.querySelector('input[name="price"]').value = total.toFixed(2); // Store total in price

           // Update price details
           document.getElementById('package-price').innerText = packagePrice.toFixed(2);
           document.getElementById('country-price').innerText = countryPrice.toFixed(2);
           document.getElementById('breakable-price').innerText = breakableIncrease.toFixed(2);
       }

       // Add event to update price when changing breakable option
       document.getElementById('breakable').addEventListener('change', updatePrice);
   </script>

</body>
</html>
