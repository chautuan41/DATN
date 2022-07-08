<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                <ul class="social-media">
                        <li>
                            <a href="https://www.facebook.com/themefisher">
                                <i class="tf-ion-social-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/themefisher">
                                <i class="tf-ion-social-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com/themefisher">
                                <i class="tf-ion-social-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.pinterest.com/themefisher/">
                                <i class="tf-ion-social-pinterest"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="/">
                        <!-- replace logo here -->
                        <svg width="5px" height="29px" viewBox="0 0 155 29" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                                font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="108.94" y="325"><img src="{{asset('assets/logo.png')}}" width="170px"></tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Cart -->
                <ul class="top-menu text-right list-inline">
                    <li class="dropdown search dropdown-slide">
                        <a href="/search" class="dropdown-toggle"><i
                                class="tf-ion-ios-search-strong"></i></a>
                        
                    </li><!-- / Search -->
                    @if (Auth::check())
                    <!-- Search -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle"><i class="tf-ion-ios-heart"></i>{{$cart}}</a>
                    </li><!-- / Search -->

                    <!-- Search -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false"><i class="tf-ion-android-person"></i></a>
                        <div class="dropdown-menu">
                            <div class="row">
                                <!-- Basic -->
                                <div class="col-lg-12 col-md-12 mb-sm-6">
                                    <ul>
                                        <li><a href="{{route('user.profile',['id'=>Auth::user()->id])}}">Profile</a>
                                        </li>
                                        <li><a href="{{ route('user.order') }}">Purchase History</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li><!-- / Search -->

                    <!-- Search -->

                    <!-- Search -->
                    <li class="dropdown search dropdown-slide">
                        <a href="{{ route('user.cart') }}" class="dropdown-toggle"><i class="tf-ion-android-cart"></i>{{$cart}}</a>
                    </li><!-- / Search -->
                    @else
                    <!-- Search -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle"><i class="tf-ion-ios-heart"></i></a>
                    </li><!-- / Search -->

                    <!-- Search -->
                    <li class="dropdown dropdown-slide">
                        <a href="/login" class="dropdown-toggle"><i class="tf-ion-android-person"></i></a>

                    </li><!-- / Search -->

                    <!-- Search -->

                    <!-- Search -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle"><i class="tf-ion-android-cart"></i></a>
                    </li><!-- / Search -->
                    @endif


                </ul><!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section><!-- End Top Header Bar -->