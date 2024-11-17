<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">

                <div class="profile-name">
                    <h5 class="mb-0 font-weight-normal">{{ auth()->user()->name }}</h5>
                    <span>Admin</span>
                </div>
                
                
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <div class="dropdown-divider">ss</div>
                <a href="{{ route('logout') }}" class="dropdown-item preview-item"> 
                  
                  <div class="preview-item-content">
                    @if(auth()->check())
                    <div style="display: flex; align-items: center; gap: 10px;">
    
                        <!-- logout -->
<form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" style="background-color: transparent; color: white; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">Logout</button>
</form>
                    </div>
                @else
                @endif
                                  </div>
                </a>
            </div>
          </li>


          <li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.Dashboard') }}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Home</span>
            </a>
          </li>



          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.createuser') }}">Create New User</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.showUsers') }}">Show Users</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.trashedusers') }}">Trashedusers</a></li>


              </ul>
            </div>
          </li>


          <li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.booking.requests.index') }}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Booking Requests</span>
            </a>
          </li>


    <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('admin.transfers.create') }}">
            <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">Create Transfer</span>
        </a>
    </li>


        <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('admin.showRequest') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-chart-bar"></i>
                </span>
                <span class="menu-title">Show Request</span> 
            </a>
        </li>






          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Wearhouse</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.createWearhouse') }}">createWearhouse</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('admin.createWearhouse1') }}">ShowWearhouse</a></li>
              </ul>
            </div>
          </li>




          <li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('home') }}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Return to the website</span>
            </a>
          </li>



      </nav>






        
