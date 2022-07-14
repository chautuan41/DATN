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
                                            <th class="">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($dtF as $Cart)
                                    
                                    
                                        <tr class="">
                                            <td class="">

                                                <div class="product-info">
                                                    <img width="80" src="{{asset($Cart->image)}}" alt="" />
                                                    <a href="{{route('user.productdetail',['id'=>$Cart->id])}}">{{$Cart->product_name}} </a>

                                                </div>
                                            </td>
                                            
                                           
                                            <td class="">
                                                <a class="product-update btn-solid-border" href="{{route('user.productdetail',['id'=>$Cart->id])}}">Add to cart</a>
                                                <a class="product-remove" href="{{route('user.favourite.delete',['id'=>$Cart->ifa])}}">Remove</a>
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