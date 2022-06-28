@extends('dashboard.layout.dashboard-admin')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
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
                            <a href="{{route('admin.formAddProduct')}}" class="btn btn-primary pull-right">Add Product</a>
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
                                    
                                    <th>Product ID</th>
                                    <th>SKU</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                    <th>Image</th>
                                    <th>Categorie</th>
                                    <th>Product Type</th>
                                    <th>Supplier</th>
                                    <th>Brand</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lsProduct as $product)
                                @if($product->status == 1)
                                <tr>
                                    <td>{{$product->product_id}}</td>
                                    <td>{{$product->sku	}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>${{$product->price}}</td>
                                    <td>{{$product->amount}}</td>
                                    <td>{{$product->discount}}</td>
                                    <td>{{$product->image}}</td>
                                    <td>{{$product->categories}}</td>
                                    <td>{{$product->product_type}}</td>
                                    <td>{{$product->supplier}}</td>
                                    <td>{{$product->brand}}</td>
                                    <td>{{$product->status}}</td>
                                    <td>
                                        <a href="{{route('admin.formEditProduct',['product_id'=>$product->id])}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-light"><i
                                                class="fa fa-pencil color-muted m-r-5"></i></a>
                                        <a href="{{route('admin.deleteProduct',['product_id'=>$product->id])}}" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-light"><i class="fa fa-trash"></i></a>
                                       
                                        
                                    </td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="13">Empty data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Product ID</th>
                                    <th>SKU</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Amout</th>
                                    <th>Discount</th>
                                    <th>Image</th>
                                    <th>Categorie</th>
                                    <th>Product Type</th>
                                    <th>Supplier</th>
                                    <th>Brand</th>
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