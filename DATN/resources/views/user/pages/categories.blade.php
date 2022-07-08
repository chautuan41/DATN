@section('title'){{$dtCid->categories_name}} - 2001 @endsection
@extends('user.app')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">{{$dtCid->categories_name}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">shop</li>
                        <li class="active">{{$dtCid->categories_name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="products section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="widget">
                    <h4 class="widget-title">Short By</h4>
                    <form method="post" action="#">
                        <select class="form-control">
                            <option>New Arrivals</option>
                            <option>High To Low</option>
                            <option>Low To High</option>
                        </select>
                    </form>
                </div>
                <div class="widget product-category">
                    <div class="panel-group commonAccordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Brand
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <ul>
                                        @foreach($dtB as $B)
                                        <li><a href="{{route('user.brand',['id'=>$B->id])}}">{{$B->brand_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach($dtPro as $Pro)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img class="img-responsive" src="{{asset('user/images/shop/products/TO1_C.jpg')}}"
                                    alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <a href="{{route('user.productdetail',['id'=>$Pro->id])}}"><i
                                                    class="tf-ion-ios-search-strong"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="tf-ion-ios-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-single.html">{{$Pro->product_name}}</a></h4>
                                <p class="price">${{$Pro->price}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection