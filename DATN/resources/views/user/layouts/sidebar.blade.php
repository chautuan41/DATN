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
										<li class="dropdown-header text-center">{{$C->categories_name}}</li>
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
										<img class="img-responsive" src="{{asset('user/images/shop/bb.jpg')}}" alt="menu image" />
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
										<li class="dropdown-header text-center">{{$C->categories_name}}</li>
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
										<img class="img-responsive" src="{{asset('user/images/shop/rl.jpg')}}" alt="menu image" />
									</a>
								</div>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Men -->
                    <li class="dropdown ">
                        <a href="{{route('user.sale')}}" >Sale</a>
                    </li>


                    
                </ul><!-- / .nav .navbar-nav -->

            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>