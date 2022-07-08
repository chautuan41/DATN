<!-- Main Menu Section -->
<section class="menu">
    <nav class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <h2 class="menu-title">Main Menu</h2>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div><!-- / .navbar-header -->

            <!-- Navbar Links -->
            <div id="navbar" class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">

                    <!-- Home -->
                    <li class="dropdown ">
                        <a href="/">Home</a>
                    </li><!-- / Home -->

                    <!-- Women -->
                    <li class="dropdown full-width dropdown-slide">
                        <a href="{{route('shop.women')}}" class="dropdown-toggle" data-hover="dropdown"
                            data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Women <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">
                            @foreach($dtC as $C)
										<!-- Introduction -->
								<div class="col-sm-3 col-xs-12">
									<ul>
										<li class="dropdown-header">{{$C->categories_name}}</li>
										<li role="separator" class="divider"></li>
										<li><a href="{{route('categories.women',['id'=>$C->id])}}">all {{$C->categories_name}}</a></li>
										@foreach($dtProT as $ProT)
										@if($ProT->categories==$C->id)
										<li><a href="{{route('producttypes.women',['id'=>$ProT->id])}}">{{$ProT->product_type_name}}</a></li>
										@endif
										@endforeach
									</ul>
								</div>
							@endforeach
                                <!-- Mega Menu -->
                                <div class="col-sm-3 col-xs-12">
									<a href="#">
										<img class="img-responsive" src="../user/images/shop/header-img.jpg" alt="menu image" />
									</a>
								</div>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Women -->

                     <!-- Men -->
					 <li class="dropdown full-width dropdown-slide">
                        <a href="{{route('shop.men')}}" class="dropdown-toggle" data-hover="dropdown"
                            data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Men <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">
                            @foreach($dtC as $C)
										<!-- Introduction -->
								<div class="col-sm-3 col-xs-12">
									<ul>
										<li class="dropdown-header">{{$C->categories_name}}</li>
										<li role="separator" class="divider"></li>
										<li><a href="{{route('categories.men',['id'=>$C->id])}}">all {{$C->categories_name}}</a></li>
										@foreach($dtProT as $ProT)
										@if($ProT->categories==$C->id)
										<li><a href="{{route('producttypes.men',['id'=>$ProT->id])}}">{{$ProT->product_type_name}}</a></li>
										@endif
										@endforeach
									</ul>
								</div>
							@endforeach

								
                                <!-- Mega Menu -->
                                <div class="col-sm-3 col-xs-12">
									<a href="#">
										<img class="img-responsive" src="../user/images/shop/header-img.jpg" alt="menu image" />
									</a>
								</div>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Men -->



                    <!-- Blog -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Blog <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                            <li><a href="blog-full-width.html">Blog Full Width</a></li>
                            <li><a href="blog-grid.html">Blog 2 Columns</a></li>
                            <li><a href="blog-single.html">Blog Single</a></li>
                        </ul>
                    </li><!-- / Blog -->

                    <!-- Shop -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-delay="350" role="button" aria-haspopup="true" aria-expanded="false">Elements <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="alerts.html">Alerts</a></li>
                        </ul>
                    </li><!-- / Blog -->
                </ul><!-- / .nav .navbar-nav -->

            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>