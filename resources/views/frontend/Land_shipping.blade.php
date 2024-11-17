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


.bradcam_bg_2 {
    background-image: url('/img/service/Land_shipping.jpg') !important; /* تغيير الصورة هنا */
}


.bradcam_area::before {
    position: absolute !important;
    left: 0 !important;
    top: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background-image: url('/img/service/2.png') !important; /* تغيير الصورة هنا */
    background-size: cover !important;
    background-position: center !important;
    z-index: -1 !important;
    content: '' !important;
    opacity: .0 !important;
} 


/* تحديد تنسيق للقائمة */
.custom-list {
    list-style-type: disc; /* تعيين النقاط الافتراضية */
    margin-left: 20px; /* إضافة مسافة من اليسار */
}

/* تحديد تنسيق خاص لكل عنصر li */
.custom-list li {
    font-size: 16px; /* تغيير حجم الخط */
    color: #333; /* تغيير لون النص */
}

/* إذا كنت ترغب في تخصيص لون النقطة أو إضافة نقطة مخصصة */
.custom-list li::before {
    content: '\2022'; /* النقطة */
    color: black; /* لون النقطة */
    font-size: 20px; /* حجم النقطة */
    margin-right: 10px; /* المسافة بين النقطة والنص */
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


</style>

<body>

    
    <!-- bradcam_area  -->


    <x-navigation />

    <div class="bradcam_area bradcam_area2  bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Land shipping  </h3>
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
                                        role="tab" aria-controls="v-pills-home" aria-selected="true">Land Transport</a>
                                    <a class="" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                        role="tab" aria-controls="v-pills-profile" aria-selected="false">Ocean Freight</a>
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
                                                                                


                                    </div>


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
                                    

                                    {{-- <div class="accordion_area">
                                        <div class="faq_ask">
                                            <h3>Frequently ask</h3>
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingTwo">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseTwo" aria-expanded="false"
                                                                aria-controls="collapseTwo">
                                                                Adieus who direct esteem <span>It esteems
                                                                    luckily?</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseOne" aria-expanded="false"
                                                                aria-controls="collapseOne">
                                                                Who direct esteem It esteems?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingThree">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseThree" aria-expanded="false"
                                                                aria-controls="collapseThree">
                                                                Duis consectetur feugiat auctor?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}


                                    {{-- <div class="download_brochure d-flex align-items-center justify-content-between">
                                        <div class="download_left d-flex align-items-center">
                                            <div class="icon">
                                                <img src="img/svg_icon/download.svg" alt="">
                                            </div>
                                            <div class="download_text">
                                                <h3>Download Our Brochure</h3>
                                                <p>Esteem spirit temper too say adieus who direct.</p>
                                            </div>
                                        </div>
                                        <div class="download_right">
                                            <a class="boxed-btn3-line" href="#">Download Now</a>
                                        </div>
                                    </div> --}}


                                </div>


                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="service_details_info">
                                        <h3>Ocean Freight   </h3>
                                        <p>With our broad product range we cover different equipment types and consolidation services 
                                            to ensure your cargo reaches the right place, at the right time in a cost-efficient way. 
                                            In order to deliver highest reliability we have planned space protection from every major
                                             container port in the world.</p>


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


                                    {{-- <div class="accordion_area">
                                        <div class="faq_ask">
                                            <h3>Frequently ask</h3>
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingTwo1">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseTwo1" aria-expanded="false"
                                                                aria-controls="collapseTwo">
                                                                Adieus who direct esteem <span>It esteems
                                                                    luckily?</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo1"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingOne2">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseOne2" aria-expanded="false"
                                                                aria-controls="collapseOne">
                                                                Who direct esteem It esteems?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingThree3">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseThree3" aria-expanded="false"
                                                                aria-controls="collapseThree">
                                                                Duis consectetur feugiat auctor?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseThree3" class="collapse" aria-labelledby="headingThree3"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="download_brochure d-flex align-items-center justify-content-between">
                                        <div class="download_left d-flex align-items-center">
                                            <div class="icon">
                                                <img src="img/svg_icon/download.svg" alt="">
                                            </div>
                                            <div class="download_text">
                                                <h3>Download Our Brochure</h3>
                                                <p>Esteem spirit temper too say adieus who direct.</p>
                                            </div>
                                        </div>
                                        <div class="download_right">
                                            <a class="boxed-btn3-line" href="#">Download Now</a>
                                        </div>
                                    </div> --}}

                                    
                                </div>


                            </div>


                            
                        </div>
            </div>
        </div>
    </div>
    <!-- service_details_start  -->

   <br>



    <x-footer />



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