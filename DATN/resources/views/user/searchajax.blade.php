@section('title')Search - 2001 @endsection
@extends('user.app')
@section('content')
<section class="menu">
    <nav class="navbar navigation">
        <div class="container">
            <!-- Navbar Links -->
            <div id="navbar" class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">
                    <!-- Elements -->
                    <li class="dropdown dropdown-slide">
                        <div class="col-md-12">
                            <div class="post post-single">
                                <div class="post-comments-form">
                                    <h4 class="widget-title">Search</h4>
                                    <form action="{{ route('search') }}" method="POST" id="form" role="form">
                                        @csrf
                                        <div class="form-group col-md-12">
                                            <!-- Website -->
                                            <input type="text" name="country_name" id="country_name"
                                                class=" form-control" placeholder="Search..." maxlength="700"
                                                style="width:600px">
                                            <div id="countryList"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li><!-- / Elements -->
                </ul><!-- / .nav .navbar-nav -->
            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>
 <!-- Search -->
 <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js')}}"></script>
@endsection