@extends('dashboard.layout.dashboard-admin')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Product</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-left ">
                        <p>
                            <a href="{{route('admin.formAddProduct')}}" class="btn btn-primary pull-right">Add
                                Product</a>
                        </p>
                    </div>
                    <div class="header-content clearfix">
                        <div>
                            <div class="header-right">
                                <div class="input-group icons">
                                    <form type="get" action="{{route('admin.searchProduct','lsProduct')}}">
                                        <input type="search" name="query" class="form-control" placeholder="Search">
                                    </form>
                                    <div class="input-group-prepend">
                                        <button class="input-group-text bg-transparent border-0 pr-2 pr-sm-3"
                                            id="basic-addon1"><i class="mdi mdi-magnify"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>SKU</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                    <th>Image</th>
                                    <th>Image Details</th>
                                    <!-- <th>Categorie</th>
                                    <th>Product Type</th>
                                    <th>Supplier</th>
                                    <th>Brand</th> -->
                                    <th>Size Details</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lsProduct as $product)
                                @if($product->status == 1)
                                <tr>

                                    <td>{{$product->sku	}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>${{$product->price}}</td>
                                    <td>{{$product->amount}}</td>
                                    <td>{{$product->discount}}</td>
                                    <td>
                                        <img src="{{asset($product->image)}}"
                                            style="width:70px;height:70px;border-radius:100%;" alt="">
                                    </td>
                                    <td><a href="{{route('admin.images',['product_id'=>$product->id])}}">View Images</a>
                                    </td>
                                    <!-- <td>{{$product->categories}}</td>
                                    <td>{{$product->product_type}}</td>
                                    <td>{{$product->supplier}}</td>
                                    <td>{{$product->brand}}</td> -->
                                    <td><a href="{{route('admin.sizes',['product_id'=>$product->id])}}">View Size</a>
                                    </td>
                                    <td>{{$product->status}}</td>
                                    <td>
                                        <a href="{{route('admin.formEditProduct',['product_id'=>$product->id])}}"
                                            data-toggle="tooltip" data-placement="top" title="Edit"
                                            class="btn btn-light"><i
                                                class="fa fa-pencil color-muted m-r-5"></i></a>&emsp;
                                        <a href="{{route('admin.deleteProduct',['product_id'=>$product->id])}}"
                                            data-toggle="tooltip" data-placement="top" title="Delete"
                                            class="btn btn-light" onclick="return confirm('Are you sure?')"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="12">Empty data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SKU</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Amout</th>
                                    <th>Discount</th>
                                    <th>Image</th>
                                    <th>Image Details</th>
                                    <!-- <th>Categorie</th>
                                    <th>Product Type</th>
                                    <th>Supplier</th>
                                    <th>Brand</th> -->
                                    <th>Size Details</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection