@section('title') 2001 @endsection
@extends('user.app')
@section('content')
<div class="hero-slider">
    <div class="slider-item th-fullpage hero-area" style="background-image: url(../user/images/slider/versace.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-left">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Versace</p>
                    <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Fashion is about dreaming<br>
                        and making other people dream.</h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                        href="shop.html">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item th-fullpage hero-area" style="background-image: url(../user/images/slider/dior.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-center">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                    <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br>
                        is hidden in details.</h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                        href="shop.html">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item th-fullpage hero-area" style="background-image: url(../user/images/slider/rolex.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-right">
                    <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
                    <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br>
                        is hidden in details.</h1>
                    <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn"
                        href="shop.html">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-category section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title text-center">
                    <h2>Product Category</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="category-box category-box-2">
                    <a href="#!">
                        <img src="../user/images/shop/category/LV.jpg" alt="" />
                        <div class="content">

                            <h3>Clothes Sales</h3>
                            <p>Shop New Season Clothing</p>
                        </div>
                    </a>
                </div>

            </div>
            <div class="col-md-6">
                <div class="category-box">
                    <a href="#!">
                        <img src="../user/images/shop/category/chanel.jpg" alt="" />
                        <div class="content">
                            <h3>Smart Casuals</h3>
                            <p>Get Wide Range Selection</p>
                        </div>
                    </a>
                </div>
                <div class="category-box">
                    <a href="#!">
                        <img src="../user/images/shop/category/rolex.jpg" alt="" />
                        <div class="content">
                            <h3>Jewellery</h3>
                            <p>Special Design Comes First</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

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
                        <img class="img-responsive" src="{{asset($SP->image)}}" alt="product-img1" style="height: 500px;"/>
                        <div class="preview-meta">
                            <ul>
                                <li >
                                    <a href="{{route('user.productdetail',['id'=>$SP->id])}}"><i
                                            class="tf-ion-ios-search-strong"></i></a>
                                </li>
                                <li>
                                    <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                                </li>
                                <li >
                                    <a class="like" data-url="{{ route('user.like',$SP->id)}}"><i
                                            class="tf-ion-thumbsup"></i></a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="product-content">
                        <h4><a href="#">{{$SP->product_name}}</a></h4>
                        <p class="price">${{number_format($SP->discount != 0 ? $SP->discount : $SP->price)}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="title text-center">
                <h2>Featured products</h2>
            </div>
        </div>
        <div class="row">
            @foreach($dtSP as $SP)
            <div class="col-md-4">
                <a href="product-single.html"></a>
                <div class="product-item">
                    <div class="product-thumb">
                        <img class="img-responsive" src="{{asset($SP->image)}}" alt="product-img" />
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
                        <h4><a href="product-single.html">{{$SP->product_name}}</a></h4>
                        <p class="price">${{$SP->discount != 0 ? $SP->discount : $SP->price}}</p>
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