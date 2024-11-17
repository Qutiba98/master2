<!-- resources/views/components/navigation.blade.php -->
<header>
    <div class="header-area">
        <div class="header-top_area d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-4">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-8">
                        <div class="header_right d-flex align-items-center">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href=""> <i class="fa fa-envelope"></i> logistico@gmail.com</a></li>
                                    <li><a href=""> <i class="fa fa-phone"></i> 779-199 880</a></li>
                                </ul>
                            </div>

                            <div class="book_btn d-none d-lg-block">
                                @if(auth()->check())
                                    <a class="boxed-btn3-line" href="{{ route('frontend.profile.profile') }}">{{ auth()->user()->name }}</a>
                                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="boxed-btn3-line">Logout</button>
                                    </form>
                                @else
                                    <a class="boxed-btn3-line" href="{{ route('login') }}">Login</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-12 d-block d-lg-none">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{ route('service') }}">Services</a></li>
                                        <li><a href="{{ route('about') }}">About</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- قائمة البرجر للعرض في الأجهزة المحمولة -->
                        <div class="col-12 d-lg-none">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span> <!-- شكل الأيقونة سيعتمد على CSS -->
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <nav>
                                    <ul class="navbar-nav">
                                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('service') }}">Services</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                                        <li class="nav-item dropdown">
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('service-details') }}">Service Details</a>
                                                <a class="dropdown-item" href="{{ route('elements') }}">Elements</a>
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownBlog">
                                            </div>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .navbar-nav .nav-link {
            color: black;
        }

        .navbar-nav .nav-link:hover, 
        .navbar-nav .nav-link:focus {
            background-color: rgb(255, 255, 255); 
            color: white; 
        }

        .navbar-nav .nav-link.active {
            background-color: rgb(255, 255, 255); 
            color: white; 
        }

        .navbar-toggler {
            border: none; 
        }

        .navbar-toggler-icon {
            background-color: red; 
            border-radius: 5px; 
            width: 30px; 
            height: 3px; 
        }

        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            display: block;
            background-color: red;
            height: 3px; 
            margin: 5px 0;
            border-radius: 5px; 
        }
    </style>
</header>
