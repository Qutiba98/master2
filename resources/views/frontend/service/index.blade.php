<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<style>@import url('https://fonts.googleapis.com/css?family=Abel');

body {
  background: #F0EDED;
  color: rgb(210, 90, 90);
}

#wrapper {
  width: 100%;
    
  @media screen and (min-width: 1024px) {
    width: 1100px;
    margin: 0 auto;
  }
  
  #pricing-tables {
    font-family: "Abel", sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    
    @media screen and (min-width: 1024px) {
      flex-direction: row;
    }
    
    .pricing-table {
      max-width: 300px;
      width: 100%;
      margin: 15px 0;
      
      @media screen and (min-width: 1024px) {
        margin: 0;
      }
      
      .header {
        
        .title {
          text-align: center;
          text-transform: uppercase;
          padding: 15px 0;
          background: #e4e4e4;
          color: #000;
          font-size: 16x;
        }
        
        .price {
          text-align: center;
          text-transform: uppercase;
          padding: 15px 0;
          background: #f6f6f6;
          color: #000;
          font-size: 28px;
          font-weight: 300;
            
            span {
              font-size: 14px;
              vertical-align: super;
            }
        }
      }
      
      .features {
        background: #fff;
      
        ul {
          list-style: none;
          margin: 0;
          padding: 15px 0;

          li {
            padding: 8px 5px;
            text-align: center;
            
            span {
              color: #999;
            }
          }
        }
      }
      .signup {
        background: #fff;
        padding: 2px 0 25px 0;
        width: 100%;
        display: flex;
        justify-content: center;
        
        a {
          width: auto;
          margin: 0 auto;
          padding: 8px 10px;
          text-align: center;
          text-decoration: none;
          color: #FC4445;
          border: 1px solid #FC4445;
          transition: all .2s ease;
          
          &:hover {
            color: #fff;
            background: #FC4445;
          }
        }
      }
      
      &.featured {
        
        .header {
          
          .title {
            background: #FC4445;
            color: #fff;
          }
        }
        
        .signup {
          
          a {
            background: #FC4445;
            color: #fff;
            
            &:hover {
              color: #FC4445;
              background: #fff;
            }
          }
        }
      }
    }
  }
}
</style>
<body>
    
   <x-navigation />


        @php
            $pricing = $packageType->packagePricing->keyBy('duration');
        @endphp



<div id="wrapper">
  <div id="pricing-tables">
    <!-- Month 1 Package -->
    <div class="pricing-table">
      <div class="header">
        <div class="title">Month 1</div>
        <div class="price">{{ $packageType && isset($pricing['month_1']) ? $pricing['month_1']->price : 'No prices available' }}$<span>/mo</span></div>
      </div>
      <div class="features">
        <ul>
        <li>{{ $pricing['month_1']->space_dimensions ?? 'Not specified' }} <span>Item storage space</span></li>
        <li>{{ $pricing['month_1']->max_items ?? 'Not specified' }} <span>Maximum allowed items</span></li>
        <li>{{ $pricing['month_1']->rental_duration ?? 'Not specified' }} <span>Rental duration</span></li>
        <li>{{ $pricing['month_1']->insurance ?? 'Not specified' }} <span>Item insurance</span></li>
        <li>{{ $pricing['month_1']->delivery_service ?? 'Not specified' }} <span>Delivery service</span></li>
        <li>{{ $pricing['month_1']->usage_rules ?? 'Not specified' }} <span>Usage rules</span></li>
        </ul>
      </div>
      <div class="signup">
        <a href="#">Choose plan</a>
      </div>
    </div>

    <!-- Month 6 Package -->
    <div class="pricing-table featured">
      <div class="header">
        <div class="title">Month 6</div>
        <div class="price">{{ $packageType && isset($pricing['month_6']) ? $pricing['month_6']->price : 'No prices available' }}$<span>/mo</span></div>
      </div>
      <div class="features">

    <ul>
      <li>{{ $pricing['month_6']->space_dimensions ?? 'Not specified' }} <span>Item storage space</span></li>
      <li>{{ $pricing['month_6']->max_items ?? 'Not specified' }} <span>Maximum allowed items</span></li>
      <li>{{ $pricing['month_6']->rental_duration ?? 'Not specified' }} <span>Rental duration</span></li>
      <li>{{ $pricing['month_6']->insurance ?? 'Not specified' }} <span>Item insurance</span></li>
      <li>{{ $pricing['month_6']->delivery_service ?? 'Not specified' }} <span>Delivery service</span></li>
      <li>{{ $pricing['month_6']->usage_rules ?? 'Not specified' }} <span>Usage rules</span></li>
    </ul>

      </div>
      <div class="signup">
        <a href="#">Choose plan</a>
      </div>
    </div>

    <!-- 1 Year Package -->
    <div class="pricing-table">
      <div class="header">
        <div class="title">1 Year</div>
        <div class="price">{{ $packageType && isset($pricing['year_1']) ? $pricing['year_1']->price : 'No prices available' }}$<span>/mo</span></div>
      </div>
      <div class="features">

    <ul>
      <li>{{ $pricing['year_1']->space_dimensions ?? 'Not specified' }} <span>Item storage space</span></li>
      <li>{{ $pricing['year_1']->max_items ?? 'Not specified' }} <span>Maximum allowed items</span></li>
      <li>{{ $pricing['year_1']->rental_duration ?? 'Not specified' }} <span>Rental duration</span></li>
      <li>{{ $pricing['year_1']->insurance ?? 'Not specified' }} <span>Item insurance</span></li>
      <li>{{ $pricing['year_1']->delivery_service ?? 'Not specified' }} <span>Delivery service</span></li>
      <li>{{ $pricing['year_1']->usage_rules ?? 'Not specified' }} <span>Usage rules</span></li>
    </ul>

      </div>
      <div class="signup">
        <a href="#">Choose plan</a>
      </div>
    </div>
  </div>
</div>


   <x-footer />

   <!-- JS here -->
   <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
   <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
   <script src="{{ asset('js/popper.min.js') }}"></script>
   <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
   <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
   <script src="{{ asset('js/ajax-form.js') }}"></script>
   <script src="{{ asset('js/waypoints.min.js') }}"></script>
   <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
   <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
   <script src="{{ asset('js/scrollIt.js') }}"></script>
   <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
   <script src="{{ asset('js/wow.min.js') }}"></script>
   <script src="{{ asset('js/nice-select.min.js') }}"></script>
   <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
   <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
   <script src="{{ asset('js/plugins.js') }}"></script>
   <script src="{{ asset('js/slick.min.js') }}"></script>

   <!-- contact js -->
   <script src="{{ asset('js/contact.js') }}"></script>
   <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
   <script src="{{ asset('js/jquery.form.js') }}"></script>
   <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
   <script src="{{ asset('js/mail-script.js') }}"></script>

   <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
