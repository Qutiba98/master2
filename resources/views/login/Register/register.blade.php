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
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>

    <section class="fxt-template-animation fxt-template-layout6" data-bg-image="{{ asset('img/img-Register/figure/bradcam2.png') }}">
        <div class="fxt-header">
            <a href="{{ route('login') }}" class="fxt-logo"><img src="{{ asset('img/img-Register/logo-6.png') }}" alt="Logo"></a>
        </div>
        <div class="fxt-content">
            <div class="fxt-form">
                <h2>Register for new account</h2>
                <form method="POST" action="{{ route('register.post') }}">
                    @csrf
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="text" class="form-control" name="full_name" placeholder="Full Name" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="text" class="form-control" name="number" placeholder="number" required="number">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="text" class="form-control" name="address" placeholder="Address" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-5">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-6">
                            <button type="submit" class="fxt-btn-fill">Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="fxt-footer">
                <ul class="fxt-socials">
                    <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-7">
                        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-8">
                        <a href="#" title="twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="fxt-google fxt-transformY-50 fxt-transition-delay-9">
                        <a href="#" title="google"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-10">
                        <a href="#" title="linkedin"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                </ul>
                <div class="fxt-transformY-50 fxt-transition-delay-11">
                    <p>Already have an account?<a href="{{ route('login') }}" class="switcher-text2 inline-text">Log in</a></p>
                </div>
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
