@section('title')Cart - 2001 @endsection
@extends('user.app')
@section('content')
@if($cart!=0)
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Cart</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="page-wrapper">
    <div class="checkout shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="product-checkout-details">
                        <div class="block">
                            <h4 class="widget-title">Order Summary</h4>
                            @php $total=0 @endphp
                            @foreach($dtCart as $Cart)
                            @php
                            $price=$Cart->discount != 0 ? $Cart->discount : $Cart->price;
                            $subtotal = $price *$Cart->quantity;
                            $total += $subtotal ;
                            @endphp
                            <div class="media product-card">
                                <a class="pull-left" href="{{route('user.productdetail',['id'=>$Cart->id])}}">
                                    <img class="media-object" src="{{asset($Cart->image)}}" alt="Image" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a
                                            href="{{route('user.productdetail',['id'=>$Cart->id])}}">{{$Cart->product_name}}</a>
                                    </h4>
                                    @foreach($dtsize as $size)
                                    @if($Cart->size==$size->id)
                                    <p class="price">Size: {{$size->size}}</p>
                                    @endif
                                    @endforeach
                                    <p class="price">{{$Cart->quantity}} x ${{number_format($price)}}</p>
                                    <a href="{{ route('user.cart.delete',['id'=>$Cart->icart]) }}"><span
                                            class="remove">Remove</span> </a>
                                    <ul class="summary-prices">
                                        <li>
                                            <span>Subtotal:</span>
                                            <span>${{ number_format($subtotal, 0,'','.') }}</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block billing-details">
                        <h4 class="widget-title">Billing Details</h4>
                        <div class="product-checkout-details">
                            <div class="summary-total">
                                <span>Total:</span>
                                <span>${{ number_format($total, 0,'','.') }}</span>
                            </div>
                        </div>
                        <form class="checkout-form" action="{{ route('user.checkout.post') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="name"
                                    value="{{ Auth::user()->full_name }}">
                            </div>
                            <div class="form-group">
                                <label for="user_address">Address</label>
                                <input type="text" class="form-control" id="user_address" name="address"
                                    value="{{ Auth::user()->address }}">
                            </div>
                            <div class="form-group">
                                <label for="user_post_code">Phone</label>
                                <input type="text" class="form-control" id="user_post_code" name="phone"
                                    value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="full_name" name="account"
                                    value="{{ Auth::user()->id }}">
                                <input type="hidden" class="form-control" id="full_name" name="total"
                                    value="{{ $total }}">
                            </div>
                            <button type="submit" class="btn btn-main mt-20">Proceed to checkout</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@else
<section class="empty-cart page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="block text-center">
                    <i class="tf-ion-ios-cart-outline"></i>
                    <h2 class="text-center">Your cart is currently empty.</h2>
                    <a href="/shop" class="btn btn-main mt-20">Return to shop</a>
                </div>
            </div>
        </div>
</section>
@endif
@endsection