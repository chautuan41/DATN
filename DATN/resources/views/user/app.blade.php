<!DOCTYPE html>
<html lang="en">

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

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />

    <!-- Themefisher Icon font -->
    <link rel="stylesheet" href="{{asset('user/plugins/themefisher-font/style.css')}}">
    <!-- bootstrap.min css -->
    <link rel="stylesheet" href="{{asset('user/plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- Animate css -->
    <link rel="stylesheet" href="{{asset('user/plugins/animate/animate.css')}}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{asset('user/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('user/plugins/slick/slick-theme.css')}}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="body">

    @include('user.layouts.header')
    @include('user.layouts.sidebar')
    @yield('content')
    <footer class="footer section text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="footer-menu text-uppercase">
                        <li>
                            <a href="contact.html">CONTACT</a>
                        </li>
                        <li>
                            <a href="/shop">SHOP</a>
                        </li>
                        <li>
                            <a href="pricing.html">Pricing</a>
                        </li>
                        <li>
                            <a href="contact.html">PRIVACY POLICY</a>
                        </li>
                    </ul>
                    <p class="copyright-text">Copyright &copy;2022, Designed &amp; Developed by <a
                            href="#">2001</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- 
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
    <script src="{{asset('user/plugins/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{asset('user/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Bootstrap Touchpin -->
    <script src="{{asset('user/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{asset('user/plugins/instafeed/instafeed.min.js')}}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{asset('user/plugins/ekko-lightbox/dist/ekko-lightbox.min.js')}}"></script>
    <!-- Count Down Js -->
    <script src="{{asset('user/plugins/syo-timer/build/jquery.syotimer.min.js')}}"></script>

    <!-- slick Carousel -->
    <script src="{{asset('user/plugins/slick/slick.min.js')}}"></script>
    <script src="{{asset('user/plugins/slick/slick-animation.min.js')}}"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{asset('user/plugins/google-map/gmap.js')}}"></script>

    <!-- Main Js File -->
    <script src="{{asset('user/js/script.js')}}"></script>

    
    
</body>

</html>
<script>
$(document).ready(function() {
    $('#country_name').keyup(function() { //b???t s??? ki???n keyup khi ng?????i d??ng g?? t??? kh??a tim ki???m
        var query = $(this).val(); //l???y g??a tr??? ng d??ng g??
        if (query != '') //ki???m tra kh??c r???ng th?? th???c hi???n ??o???n l???nh b??n d?????i
        {
            var _token = $('input[name="_token"]').val(); // token ????? m?? h??a d??? li???u
            $.ajax({
                url: "{{ route('search') }}", // ???????ng d???n khi g???i d??? li???u ??i 'search' l?? t??n route m??nh ?????t b???n m??? route l??n xem l?? hi???u n?? l?? c??i j.
                method: "POST", // ph????ng th???c g???i d??? li???u.
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) { //d??? li???u nh???n v???
                    $('#countryList').fadeIn();
                    $('#countryList').html(
                        data
                    ); //nh???n d??? li???u d???ng html v?? g??n v??o c???p th??? c?? id l?? countryList
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