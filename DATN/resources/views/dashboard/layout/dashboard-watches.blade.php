<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>2001</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/icon.jpg')}}">
    <!-- Pignose Calender -->
    <link href="{{asset('dashboard/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <!-- Custom Stylesheet -->
    <link href="{{asset('dashboard/css/style.css')}}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header" style="background-color:white">
            <div class="brand-logo">
                <a href="{{route('admin.indexDH')}}">
                    <!-- <b class="logo-abbr"><img src="{{asset('dashboard/images/logo.png')}}" alt=""> </b>
                    <span class="logo-compact"><img src="{{asset('dashboard/images/logo-compact.png')}}" alt=""></span> -->
                    <span class="brand-title">
                        <img src="{{asset('assets/logo.png')}}" style="width:100%; height:100%;margin-top: -30px;margin-left:-3.30px" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <!-- <span class="badge badge-pill gradient-1">3</span> -->
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                </div>
                                
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <!-- <span class="badge badge-pill gradient-2">3</span> -->
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span>English</span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="javascript:void()">English</a></li>
                                        <li><a href="javascript:void()">Việt Nam</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="{{asset('dashboard/images/user/1.png')}}" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{route('admin.personalInfoWC',['id_staff'=>Auth::user()->id])}}"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li><a href="{{route('admin.logout')}}"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Home</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-label">Table</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Table Data</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#" aria-expanded="false">Watches</a></li>
                            <li><a href="#" aria-expanded="false">Product Types</a></li>
                            <li><a href="#" aria-expanded="false">Supplier</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
        @yield('content')
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>2001 &copy; ALL RIGHTS RESERVED  <a href="{{route('admin.indexDH')}}">2001</a> 2022</p>
            </div>
        </div>  
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('dashboard/plugins/common/common.min.js')}}"></script> 
    <script src="{{asset('dashboard/js/custom.min.js')}}"></script>
    <script src="{{asset('dashboard/js/settings.js')}}"></script>
    <script src="{{asset('dashboard/js/gleek.js')}}"></script>
    <script src="{{asset('dashboard/js/styleSwitcher.js')}}"></script>

    <!-- Chartjs -->
    <script src="{{asset('dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{asset('dashboard/plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Datamap -->
    <script src="{{asset('dashboard/plugins/d3v3/index.js')}}"></script>
    <script src="{{asset('dashboard/plugins/topojson/topojson.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/datamaps/datamaps.world.min.js')}}"></script> 
    <!-- Morrisjs -->
    <script src="{{asset('dashboard/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{asset('dashboard/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{asset('dashboard/plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{asset('dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>

    <script src="{{asset('dashboard/js/dashboard/dashboard-1.js')}}"></script>

</body>

</html>