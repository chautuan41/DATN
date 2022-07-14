@section('title')Shop - 2001 @endsection
@extends('user.app')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">{{$title}}</h1>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">shop</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="products section">
    <div class="container">
        <div class="row">
            @foreach($dtSP as $SP)
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        @if($SP->discount!=0)
                        <span class="bage">Sale</span>
                        @endif
                        <img class="img-responsive" src="{{asset($SP->image)}}" alt="product-img" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <a href="{{route('user.productdetail',['id'=>$SP->id])}}"><i
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
                        <h4><a href="product-single.html">{{$SP->product_name}}</a></h4>
                        <p class="price">${{number_format($SP->discount != 0 ? $SP->discount : $SP->price)}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{$dtSP->links('name')}}
@endsection