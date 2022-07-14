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

@if ($paginator->hasPages())
<!-- Pagination -->
<div class="text-center">
    <ul class="pagination post-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li>
            <span style="color:black;">Prev</span>
        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}">
                <span>Prev</span>
            </a>
        </li>
            @foreach ($elements as $element)
            {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page != $paginator->currentPage() && $page < $paginator->currentPage() + 1 )
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="active"><a>{{ $page }}</a></li>
            @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page ==
            $paginator->lastPage())
            <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
            @endforeach
            @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}">
                    <span>Next</span>
                </a>
            </li>
            @else
            <li>
                <span style="color:black;">Next</span>
            </li>
            @endif
    </ul>
</div>
<!-- Pagination -->
@endif

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

<!-- Search -->
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js')}}"></script>