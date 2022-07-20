<!--**********************************
            Nav header start
        ***********************************-->
<div class="nav-header" style="background-color:white;border-radius:10x;">
    <div class="brand-logo">
        <a href="{{route('admin.index')}}">
            <b class="logo-abbr"><img src="{{asset('assets/favicon.ico')}}" alt=""> </b>
            <span class="logo-compact"><img src="{{asset('assets/favicon.ico')}}" alt=""></span>
            <span class="brand-title">
                <img src="{{asset('assets/logo.png')}}"
                    style="width:100%; height:100%;margin-top: -30px;margin-left:-3.30px" alt="">
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
        <!-- <div class="header-left">
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
</div> -->
        <div class="header-right">
            <ul class="clearfix">
                
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{asset('dashboard/images/user/1.png')}}" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{route('admin.personalInfo',['id_admin'=>Auth::user()->id])}}"><i
                                            class="icon-user"></i> <span>Profile</span></a>
                                </li>
                                <!-- <li>
                            <a href="javascript:void()">
                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                            </a>
                        </li> -->

                                <hr class="my-2">
                                <!-- <li>
                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                        </li> -->
                                <li><a href="{{route('admin.logout')}}"><i class="icon-key"></i>
                                        <span>Logout</span></a></li>
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