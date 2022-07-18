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
    <link rel="stylesheet"
        href="{{asset('dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
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

        @include('dashboard.layout.header')
        @include('dashboard.layout.sidebar')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
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

    <!-- Bootstrap 3.1 -->
    <script src="{{asset('user/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    $('.abc').on('click', function() {
        var data = $(this).attr('data-url');
        $.ajax({
                url: data, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                type: "get", // phương thức gửi dữ liệu.
                dataType: "json",
                success: function(response) {
                    $('#cthd').html("");
                    $.each(response.data, function(key, item) {
                        $('#cthd').append('<tr>\
                        <th>' + item.invoice + '</th>\
                        <td>' + item.product_name + '</td>\
                        <td>' + item.size + '</td>\
                        <td>' + item.amount + '</td>\
                        <td>$' + item.price + '</td>\
                        <td>$' + item.total + '</td>\
                    \</tr>');
                    });
                },
                error: function(data, textStatus, errorThrown) {},
            }),
            event.preventDefault();
    })
    </script>
    @if ($check == 1) 
    <script>
    var data = <?= json_encode($stats) ?>;
    
    Morris.Bar({
        element: 'bar-chart',
        data: data,
        xkey: 'year',
        ykeys: ['count'],
        labels: ['Revenue'],
        barColors: ['#7571f9'],
        hideHover: 'auto',
        gridLineColor: 'transparent',
        resize: true
    });
    </script>
    <script>
    var data = <?= json_encode($stats1) ?>;
    
    Morris.Bar({
        element: 'bar-chart1',
        data: data,
        xkey: 'year',
        ykeys: ['count'],
        labels: ['Cost'],
        barColors: ['#FC6C8E'],
        hideHover: 'auto',
        gridLineColor: 'transparent',
        resize: true
    });
    </script>
    @endif
</body>

</html>