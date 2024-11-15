<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Transportion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<style>
.bradcam_area::before {
    position: absolute !important;
    left: 0 !important;
    top: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background-size: cover !important;
    background-position: center !important;
    z-index: -1 !important;
    content: '' !important;
    opacity: .5 !important;
} 
.custom-list {
    list-style-type: disc; /* تعيين النقاط الافتراضية */
    margin-left: 20px; /* إضافة مسافة من اليسار */
}
.custom-list li {
    font-size: 16px; /* تغيير حجم الخط */
    color: #333; /* تغيير لون النص */
}
.custom-list li::before {
    content: '\2022'; /* النقطة */
    color: black; /* لون النقطة */
    font-size: 20px; /* حجم النقطة */
    margin-right: 10px; /* المسافة بين النقطة والنص */
}
.land_service_gallery {
    display: flex; /* لعرض العناصر بجانب بعضها */
    gap: 10px; /* مسافة بين الصور */
    justify-content: center; /* محاذاة الصور في المنتصف */
}
.land_service_gallery .service_thumb {
    flex: 1; /* لجعل العناصر تأخذ نفس المساحة النسبية */
    max-width: 30%; /* يعين العرض النسبي لكل صورة */
    height: 200px; /* يضبط نفس الطول لجميع الصور */
}
.land_service_gallery .service_thumb img {
    width: 100%; /* يجعل الصورة تملأ العرض */
    height: 100%; /* يجعل الصورة تملأ الطول */
    object-fit: cover; /* لضبط الصورة داخل الإطار بدون تشويه */
    border: 1px solid #ddd; /* إطار بسيط حول الصور */
}
.specific_service_gallery {
    display: flex; /* لجعل العناصر بجانب بعضها */
    gap: 10px; /* مسافة بين الصور */
    justify-content: center; /* محاذاة الصور في المنتصف */
}
.specific_service_gallery .service_thumb {
    flex: 1; /* يجعل كل العناصر تأخذ مساحة متساوية */
    max-width: 30%; /* يعين العرض النسبي */
    height: 200px; /* الطول الموحد */
}
.specific_service_gallery .service_thumb img {
    width: 100%; /* لملء عرض العنصر بالكامل */
    height: 100%; /* لملء الطول بالكامل */
    object-fit: cover; /* لضبط الصورة داخل العنصر دون تشويه */
    border: 1px solid #ddd; /* إطار خفيف حول الصور */
}
</style>

<body>

    
    <!-- bradcam_area  -->


    <x-navigation />

    <div class="bradcam_area bradcam_area2  bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Ocean Freight</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- service_details_start  -->
    <div class="service_details_area">
        <div class="container">
            <div class="row">
                    <div class="col-lg-4 col-md-4">
                            <div class="service_details_left">
                                <h3>Services</h3>
                                <div class="nav nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class=" active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                        role="tab" aria-controls="v-pills-home" aria-selected="true">Ocean Freight</a>
                                    <a class="" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                        role="tab" aria-controls="v-pills-profile" aria-selected="false">Land Transport</a>
                                    <a class="" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                                        role="tab" aria-controls="v-pills-messages" aria-selected="false">Air Freight</a>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-8 col-md-8">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="service_details_info">

                                        <h3>Ocean Freight   </h3>
                                        <p>With our broad product range we cover different equipment types and consolidation services 
                                            to ensure your cargo reaches the right place, at the right time in a cost-efficient way. 
                                            In order to deliver highest reliability we have planned space protection from every major
                                             container port in the world.</p>

                                                                                


                                    </div>


                                    <div class="specific_service_gallery">
                                        <div class="service_thumb">
                                            <img class="img-fluid" src="img/service/service_details.png" alt="">
                                        </div>
                                        <div class="service_thumb">
                                            <img class="img-fluid" src="img/service/s22.jpg" alt="">
                                        </div>
                                        <div class="service_thumb">
                                            <img class="img-fluid" src="img/service/s11.jpg" alt="">
                                        </div>
                                    </div>

                                </div>


                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="service_details_info">


                                             <h3>Land Transport
                                            </h3>
                                            <p>We provide smart logistics services which are tailor-made to your needs. At AHES you’ll find a variety of advanced services which include:
    
    
                                            </p>
    
    
                                            <ul class="custom-list">
                                                <li class="list-item">Storage in containers</li>
                                                <li class="list-item">Overland storage space</li>
                                                <li class="list-item">Domestic transportation</li>
                                                <li class="list-item">Disassembling plants</li>
                                                <li class="list-item">Packing and unloading services</li>
                                                <li class="list-item">Containers for different purposes</li>
                                            </ul>
                                                                                    
    


                                            <div class="land_service_gallery">
                                                <div class="service_thumb">
                                                    <img class="img-fluid" src="img/service/land1.jpg" alt="">
                                                </div>
                                                <div class="service_thumb">
                                                    <img class="img-fluid" src="img/service/land11.jpg" alt="">
                                                </div>
                                                <div class="service_thumb">
                                                    <img class="img-fluid" src="img/service/land22.jpg" alt="">
                                                </div>
                                            </div>
        


                                </div>
                            </div>

                        </div>
            </div>
        </div>
    </div>
    <!-- service_details_start  -->

   <br>

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
                                <li><a href="#">Air Transportation</a></li>
                                <li><a href="#">Ocean Freight</a></li>
                                <li><a href="#">Ocean Cargo</a></li>
                                <li><a href="#">Logistics</a></li>
                                <li><a href="#">Warehouse Moving</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Company
                            </h3>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#"> Testimonials</a></li>
                                <li><a href="#"> Why Us?</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Industries
                            </h3>
                            <ul>
                                <li><a href="#">Chemicals</a></li>
                                <li><a href="#">Automotive</a></li>
                                <li><a href="#"> Consumer Goods</a></li>
                                <li><a href="#">Life Science</a></li>
                                <li><a href="#">Foreign Trade</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Subscribe
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Subscribe</button>
                            </form>
                            <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems
                                luckily.</p>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->



    <!-- JS here -->
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
    <!-- <script src="js/gijgo.min.js"></script> -->
    <script src="js/slick.min.js"></script>



    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>


    <script src="js/main.js"></script>

    
</body>

</html>