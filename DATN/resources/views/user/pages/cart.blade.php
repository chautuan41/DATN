@section('title') 2001 @endsection
@extends('user.app')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Cart</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="page-wrapper">
    <div class="cart shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-12">
                    <div class="block">
                        <div class="product-list">
                            <form method="post">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="">Item Name</th>
                                            <th class="">Item Quantity</th>
                                            <th class="">Item Price</th>
                                            <th class="">Subtotal</th>
                                            <th class="">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total=0 @endphp
                                        @foreach($dtCart as $Cart)
                                        @php
                                        $price=$Cart->discount != 0 ? $Cart->discount : $Cart->price;
                                        $subtotal = $price *$Cart->quantity;
                                        $total += $subtotal ;
                                        @endphp
                                        <tr class="">
                                            <td class="">

                                                <div class="product-info">
                                                    <img width="80" src="../user/images/shop/cart/cart-1.jpg" alt="" />
                                                    <a href="#!">{{$Cart->product_name}}, {{$Cart->size}}</a>

                                                </div>
                                            </td>
                                            <td class="">{{$Cart->quantity}}</td>
                                            <td class="">
                                                ${{number_format($price)}}
                                            </td>
                                            <td class="">${{ number_format($subtotal, 0,'','.') }}</td>

                                            <td class="">
                                                <a class="product-update btn-solid-border" href="#!">Update</a>
                                                <a class="product-remove" href="#!">Remove</a>
                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>

                                   

                                </table>

                                <a href="checkout.html" class="btn btn-main pull-right">Checkout</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-md-3">
                    <div class="block billing-details">
                        <h4 class="widget-title">Billing Details</h4>
                        
                        <form class="checkout-form">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" id="full_name" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="user_address">Address</label>
                                <input type="text" class="form-control" id="user_address" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="user_post_code">Phone</label>
                                <input type="text" class="form-control" id="user_post_code" name="zipcode" value="">
                            </div>
                            <div class="product-checkout-details">
                        <div class="block">
                            <ul class="summary-prices">

                            </ul>
                            <div class="summary-total">
                                <span>Total</span>
                                <span>$250</span>
                            </div>
                        </div>
                    </div>
                            <a href="confirmation.html" class="btn btn-main mt-20">Place Order</a>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection