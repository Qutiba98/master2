<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Xmee | Register Form Html Templates</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/img-Register/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/css-Register/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('fonts/font-Register/fontawesome-all.min.css') }}">

    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('fonts/font-Register/flaticon.css') }}">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style-Register.css') }}">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>

    <section class="fxt-template-animation fxt-template-layout6" data-bg-image="{{ asset('img/img-Register/figure/bradcam2.png') }}">
        <div class="fxt-header">
            <a href="{{ route('home') }}" class="fxt-logo"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>
        </div>
        <div class="fxt-content">
            <div class="fxt-form">
                <h2>Register for new account</h2>
                

                <form method="POST" action="{{ route('register.post') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}" required>
                        @error('full_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="number" placeholder="Number" value="{{ old('number') }}" required>
                        @error('number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}" required>
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="fxt-btn-fill">Register</button>
                    </div>
                </form>
            </div>
            <div class="fxt-footer">
                <p>Already have an account?<a href="{{ route('login') }}" class="switcher-text2 inline-text">Log in</a></p>
            </div>
        </div>
    </section>

    <!-- jquery-->
    <script src="{{ asset('js/js-Register/jquery.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/js-Register/bootstrap.min.js') }}"></script>
    <!-- Imagesloaded js -->
    <script src="{{ asset('js/js-Register/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Validator js -->
    <script src="{{ asset('js/js-Register/validator.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('js/js-Register/main.js') }}"></script>



    
</body>

</html>
