<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="../user/plugins/themefisher-font/style.css">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="../user/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Animate css -->
    <link rel="stylesheet" href="../user/plugins/animate/animate.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="../user/plugins/slick/slick.css">
    <link rel="stylesheet" href="../user/plugins/slick/slick-theme.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../user/css/style.css">

    <title>Search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


</head>

<body>
    @include('user.layouts.header')
    @include('user.layouts.sidebar')

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
                                                <div id="countryList"><br>
                                                </div>
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



    <!-- 
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="../user/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="../user/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="../user/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="../user/plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="../user/plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="../user/plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="../user/plugins/slick/slick.min.js"></script>
    <script src="../user/plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="../user/plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="../user/js/script.js"></script>



</body>

</html>

<script>
$(document).ready(function() {

    $('#country_name').keyup(function() { //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
        var query = $(this).val(); //lấy gía trị ng dùng gõ
        if (query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
        {
            var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
            $.ajax({
                url: "{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "POST", // phương thức gửi dữ liệu.
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) { //dữ liệu nhận về
                    $('#countryList').fadeIn();
                    $('#countryList').html(
                        data
                    ); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                }
            });
        }
    });

    $(document).on('click', 'h4', function() {
        $('#country_name').val($(this).text());
        $('#countryList').fadeOut();
    });

});
</script>