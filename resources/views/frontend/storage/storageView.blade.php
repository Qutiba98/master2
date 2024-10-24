<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Storage Information</title>
    <base href="{{ url('/') }}/" target="_self">
    <!-- CSS هنا -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
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

<style>
    body {
        color: black;
    }
    .list-group-item strong {
        color: black;
    }
    h2{
        color: black
    }
</style>


   <x-navigation />
   <div class="container mt-5">
       <h2 class="text-center mb-4">Your Storage Information</h2>
       <p class="text-center">Here you can view the details of your storage request.</p>

       <div class="card">
           <div class="card-header bg-success text-white">
               <h5 class="mb-0">Storage Request Details</h5>
           </div>
           <div class="card-body">
               <ul class="list-group">
                  <li class="list-group-item"><strong>name:</strong> {{ $storageRequest->name }}</li>
                   <li class="list-group-item"><strong>Governorate:</strong> {{ $storageRequest->governorate }}</li>
                   <li class="list-group-item"><strong>Housing Details:</strong> {{ $storageRequest->housing_details }}</li>
                   <li class="list-group-item"><strong>Phone Number:</strong> {{ $storageRequest->number }}</li>
                   <li class="list-group-item"><strong>Size:</strong> {{ $storageRequest->size }}</li>
                   <li class="list-group-item"><strong>Breakable:</strong> {{ $storageRequest->breakable }}</li>
                   <li class="list-group-item"><strong>Delivery Service:</strong> {{ $storageRequest->delivery_service }}</li>
                   <li class="list-group-item"><strong>Complete storage details:</strong> {{ $storageRequest->message }}</li>
                   <li class="list-group-item"><strong>payment:</strong> {{ $storageRequest->payment_method }}</li>
                   <li class="list-group-item"><strong>total:</strong> {{ $storageRequest->total_price }}$</li>

               </ul>
               <div class="text-center mt-4">
                   <button type="button" class="btn btn-primary" style="background-color: #FF3414;" onclick="confirmRequest()">Confirm Request</button>
               </div>
           </div>
       </div>
   </div>

   <x-footer />

   <!-- JS هنا -->
   <script src="js/vendor/modernizr-3.5.0.min.js"></script>
   <script src="js/vendor/jquery-1.12.4.min.js"></script>
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
   <script src="js/main.js"></script>

<script>
   function confirmRequest() {
       var requestId = {{ $storageRequest->id }};  // افترض أن لديك معرف الطلب في المتغير $storageRequest
       // انتقل إلى صفحة الدفع مع معرف الطلب
       window.location.href = '/payment/' + requestId;
   }
</script>

</body>
</html>
