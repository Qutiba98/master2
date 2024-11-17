
       <!-- contact_location  -->
    <div class="contact_location">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="location_left">
                        <div class="logo">
                            <a href="index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="single_location">
                        <h3> <img src="img/icon/address.svg" alt=""> Location</h3>
                        <p>Amman , Jordan</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="single_location">
                        <h3> <img src="img/icon/support.svg" alt=""> Location</h3>
                        <p>+962 779 199 880 <br>
                            support@logistico.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


   
   
   
   <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Services
                            </h3>
                            <ul>
                                <li><a href="{{ route('AirFreight') }}">Air Transportation</a></li>
                                <li><a href="{{ route('service-details') }}">Ocean Freight</a></li>
                                <li><a href="{{ route('AirFreight') }}">Air Transportation</a></li>
                                <li><a href="{{ route('Land_shipping') }}">Land shipping</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Company
                            </h3>
                            <ul>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                <li><a href="{{ route('contact') }}"> Why Us?</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Requests
                            </h3>
                            <ul>
                                <li><a href="packeg">Packeg</a></li>
                                <li><a href="storage">Storage</a></li>
                    <li>
                        @auth
                            <a href="{{ route('frontend.profile.profile') }}">{{ auth()->user()->name }}</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    </li>
                            </ul>
                        </div>
                    </div>


            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                    <h3> logistico@gmail.com</h3>
                    <p>Send us your query anytime!</p>
                </div>
            </div>




                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->
