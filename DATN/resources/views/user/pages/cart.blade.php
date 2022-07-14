@section('title') 2001 @endsection
@extends('user.app')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Favourite</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Favourite</li>
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
                                                    <img width="80" src="{{asset($Cart->image)}}" alt="" />
                                                    <a href="#!">{{$Cart->product_name}}, {{$Cart->size}}</a>

                                                </div>
                                            </td>


                                            <td class="">
                                               
                                                    <div class="product-quantity">
                                                    <div class="col-md-5">
                                                        <div class="product-quantity-slider">
                                                            <input id="product-quantity" type="text" value="1"
                                                                name="quantity" max="5" style="height:34px;">
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                            <td class="">
                                                ${{number_format($price)}}
                                            </td>


                                            <td class="">
                                                <a class="product-update btn-solid-border" href="#!">Add to cart</a>
                                                <a class="product-remove" href="#!">Remove</a>
                                            </td>
                                        </tr>

                                        @endforeach

                                    </tbody>



                                </table>

                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection