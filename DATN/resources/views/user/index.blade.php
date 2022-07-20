@section('title') 2001 @endsection
@extends('user.app')
@section('content')
<div class="hero-slider">
    <div class="slider-item th-fullpage hero-area" style="background-image: url(../user/images/slider/ysl.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">YSL</p>
                    <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">I love black because it affirms, designs<br>
                        and styles. A woman in a black dress<br>
                        is a pencil stroke
                    </h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                        href="/shop">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item th-fullpage hero-area" style="background-image: url(../user/images/slider/versace.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">VERSACE</p>
                    <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Fashion is about
                        dreaming<br>
                        and making other people dream.</h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                        href="/shop">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-item th-fullpage hero-area" style="background-image: url(../user/images/slider/rolex.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">ROLEX</p>
                    <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">A crown for every achievement 
                        </h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                        href="/shop">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="products section bg-gray">
    <div class="container">
    <div class="row">
            <div class="title text-center">
                <h2>New Products</h2>
            </div>
        </div>
        <div class="row">
            @foreach($dtPro as $SP)
            <div class="col-md-4">
                <a href="#"></a>
                <div class="product-item">

                    <div class="product-thumb">

                        @if($SP->discount!=0)

                        <span class="bage">Sale</span>
                        @endif
                        <img class="img-responsive" src="{{asset($SP->image)}}" alt="product-img1"
                            style="height: 500px;" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <a href="{{route('user.productdetail',['id'=>$SP->id])}}"><i
                                            class="tf-ion-ios-search-strong"></i></a>
                                </li>
                                <li>
                                    <a href="{{route('user.favourite.add',['id'=>$SP->id])}}"><i
                                            class="tf-ion-ios-heart"></i></a>
                                </li>
                                <li>
                                    <a class="like" data-url="{{ route('user.like',$SP->id)}}"><i
                                            class="tf-ion-thumbsup"></i></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="product-content">
                        <h4><a href="{{route('user.productdetail',['id'=>$SP->id])}}">{{$SP->product_name}}</a></h4>
                        <p class="price">${{number_format($SP->discount != 0 ? $SP->discount : $SP->price)}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="title text-center">
                <h2>Seller Products</h2>
            </div>
        </div>
        <div class="row">
            @foreach($dtSP as $SP)
            <div class="col-md-4">
                <a href="product-single.html"></a>
                <div class="product-item">
                    <div class="product-thumb">
                        <img class="img-responsive" src="{{asset($SP->image)}}" alt="product-img" style="height: 500px;"/>
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <a href="{{route('user.productdetail',['id'=>$SP->id])}}"><i
                                            class="tf-ion-ios-search-strong"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                                </li>
                                <li>
                                    <a class="like" data-url="{{ route('user.like',$SP->id)}}"><i
                                            class="tf-ion-thumbsup"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="{{route('user.productdetail',['id'=>$SP->id])}}">{{$SP->product_name}}</a></h4>
                        <p class="price">${{number_format($SP->discount != 0 ? $SP->discount : $SP->price)}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<script>
var timeout = null;
$('.like').on('click', function() {
    var data = $(this).attr('data-url');
    clearTimeout(timeout);
    timeout = setTimeout(function() {
        $.ajax({
            url: data, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
            type: "get", // phương thức gửi dữ liệu.

        });
    }, 1000);
})
</script>
@endsection