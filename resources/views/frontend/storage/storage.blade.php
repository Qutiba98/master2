<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

   <x-navigation />
<!-- Estimate_area start  -->
<div class="Estimate_area overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-5">
                <div class="Estimate_info">
                    <h3>Get free Estimate</h3>
                    <p>Esteem spirit temper too say adieus who direct esteem. It look estee luckily or picture placing.</p>
                    <a href="#" class="boxed-btn3">+10 672 457 356</a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-7">
                <div class="form">



<form action="{{ route('inventory.request') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xl-6">
            <div class="input_field">
                <input type="text" name="name" placeholder="Your name" value="{{ Auth::user()->name }}" required readonly>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="input_field">
                <input type="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}" required readonly>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="input_field">
                <select name="governorate" class="wide" required>
                    <option data-display="Select Governorate" value="">Select Governorate</option>
                    <option value="1">Amman</option>
                    <option value="Zarqa">Zarqa</option>
                    <option value="Irbid">Irbid</option>
                    <option value="Aqaba">Aqaba</option>
                    <option value="Ma'an">Ma'an</option>
                    <option value="Karak">Karak</option>
                    <option value="Ajloun">Ajloun</option>
                    <option value="Madaba">Madaba</option>
                    <option value="Tafilah">Tafilah</option>
                    <option value="Balqa">Balqa</option>
                    <option value="Mafraq">Mafraq</option>
                </select>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="input_field">
                <input type="text" name="housing_details" placeholder="Address" required>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="input_field">
                <input type="text" name="number" placeholder="Number" value="{{ old('number') }}" required>
            </div>
            @error('number') 
                <div class="text-danger mt-2">{{ $message }}</div> 
            @enderror
        </div>
        
        <div class="col-xl-6">
            <div class="input_field">
                <select name="size" class="wide" id="size_select" required>
                    <option data-display="Select Size (m²)" value="">Select Size (m²)</option>
                    <option value="4" data-price="20">2x2 - $20</option>
                    <option value="9" data-price="30">3x3 - $30</option>
                    <option value="16" data-price="40">4x4 - $40</option>
                    <option value="25" data-price="50">5x5 - $50</option>
                    <option value="36" data-price="60">6x6 - $60</option>
                    <option value="49" data-price="70">7x7 - $70</option>
                    <option value="64" data-price="80">8x8 - $80</option>
                    <option value="81" data-price="90">9x9 - $90</option>
                    <option value="100" data-price="100">10x10 - $100</option>
                </select>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="input_field">
                <label for="breakable">Is the item breakable?</label>
                <select id="breakable" name="breakable" class="wide" required>
                    <option value="" disabled selected>Select Breakable Option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="input_field">
                <label for="delivery_service">Do you need delivery service?</label>
                <select id="delivery_service" name="delivery_service" class="wide" required>
                    <option value="" disabled selected>Select Delivery Service</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="input_field">
                <select name="storage_duration" class="wide" required>
                    <option data-display="Select Storage Duration" value="">Select Storage Duration</option>
                    <option value="1 month">1 Month</option>
                    <option value="2 months">2 Months</option>
                    <option value="3 months">3 Months</option>
                    <option value="6 months">6 Months</option>
                    <option value="1 year">1 Year</option>
                </select>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="input_field">
                <label for="location_id"></label>
                <select name="location_id" id="location_id" required>
                    <option data-display="Select Warehouse" value="">Select Warehouse</option>
                    <option value="1">Amman</option>
                    <option value="2">Salt</option>
                    <option value="3">Irbid</option>
                </select>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="input_field">
                <textarea name="message" placeholder="Message"></textarea>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="input_field">
                <label for="payment_method">Payment Method:</label>
                <select id="payment_method" name="payment_method" class="wide" required>
                    <option value="">Select Payment Method</option>
                    <option value="visa">Visa</option>
                    <option value="cash">Cash</option>
                </select>
            </div>
        </div>

        <div class="col-xl-12" id="visa_payment_section" style="display: none;">
            <div class="input_field">
                <label for="card_number">Visa Card Number:</label>
                <input type="text" name="card_number" id="card_number" placeholder="Enter Visa Card Number" required>
            </div>
            <div class="input_field">
                <label for="card_expiry">Expiry Date:</label>
                <input type="text" name="card_expiry" id="card_expiry" placeholder="MM/YY" required>
            </div>
            <div class="input_field">
                <label for="card_cvv">CVV:</label>
                <input type="text" name="card_cvv" id="card_cvv" placeholder="Enter CVV" required>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="input_field">
                <label class="text-white">Size and Total Price:</label>
                <input type="hidden" name="total_price" id="total_price_hidden">
                <span id="selected_size" class="text-white">Selected Size: - </span>
                <span id="total_price" class="text-white">Total Price: $0.00</span>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="input_field">
                <button class="boxed-btn3-line" type="submit">Send Estimate</button>
            </div>
        </div>
    </div>
</form>



                </div>
            </div>
        </div>
    </div>
</div>
<!-- Estimate_area end  -->

<x-footer />

<!-- JS هنا -->
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/ajax-form.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/scrollIt.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/nice-select.min.js"></script>
<script src="js/jquery.slicknav.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/slick.min.js"></script>

<!-- Contact js -->
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>

<script src="js/main.js"></script>


<script>
// Define base prices for each size and month
const basePricePerMonth = {
    "4": 20,
    "3x3": 30,
    "4x4": 40,
    "5x5": 50,
    "6x6": 60,
    "7x7": 70,
    "8x8": 80,
    "9x9": 90,
    "10x10": 100,
};

// Define tax rate (for example, 25% tax)
const taxRate = 0.25;

// Define delivery price
const deliveryPrice = 15; // Example delivery fee

// Show or hide Visa payment section based on selected payment method
$("#payment_method").change(function () {
    const selectedPaymentMethod = $(this).val();
    if (selectedPaymentMethod === "visa") {
        $("#visa_payment_section").show();  // Show Visa payment section
        $("#card_number").prop('required', true);
        $("#card_expiry").prop('required', true);
        $("#card_cvv").prop('required', true);
    } else {
        $("#visa_payment_section").hide();  // Hide Visa payment section
        $("#card_number").prop('required', false);
        $("#card_expiry").prop('required', false);
        $("#card_cvv").prop('required', false);
    }
});


function calculateTotal() {
    const selectedSize = $("select[name='size']").val();
    const selectedDuration = $("select[name='storage_duration']").val();
    const deliveryService = $("select[name='delivery_service']").val();

    let totalPrice = 0;

    if (selectedSize && selectedDuration) {
        const basePrice = basePricePerMonth[selectedSize]; // Get base price for the selected size
        const durationMonths = parseInt(selectedDuration); // Extract number of months from the selected duration
        totalPrice = basePrice * durationMonths; // Calculate total price based on size and duration

        // Add delivery price if "Yes" is selected
        if (deliveryService === "yes") {
            totalPrice += deliveryPrice;
        }

        // Calculate tax
        const taxAmount = totalPrice * taxRate;
        totalPrice += taxAmount; // Add tax to total price
    }

    $("#total_price").text(`$${totalPrice.toFixed(2)}`); // Display the total price with tax
    $("#total_price_hidden").val(totalPrice.toFixed(2));
}

// Update total price when size, storage duration, or delivery service is changed
$("select[name='size'], select[name='storage_duration'], select[name='delivery_service']").change(function () {
    calculateTotal();
});

</script>


</body>
</html>


