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
                    <div class="header-content clearfix">
                        <div>
                            <div class="buttonPart">
                                <ul class="list-inline mt-10">
                                    <li class="li"><a href="{{route('products.create')}}" class="btn btn-main btn-small btn-round-full">Create Product</a></li>
                                </ul>                        
                            </div>
                        <div class="header-right">

                                <div class="input-group icons">

                                    <input type="search" class="form-control" placeholder="Search Dashboard"
                                        aria-label="Search Dashboard">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3"
                                            id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                                    </div>
                                    <div class="drop-down animated flipInX d-md-none">
                                        <form action="#">
                                            <input type="text" class="form-control" placeholder="Search">
                                        </form>
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
                                    <th>#</th>
                                    <th>Product ID</th>
                                    <th>SKU</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                    <th>Image</th>
                                    <th>Product Type</th>
                                    <th>Supplier</th>
                                    <th>Brand</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dtPro as $Pro)
                                @if($Pro->status == 1 && $Pro->role != 1)
                                <tr>
                                    <td>{{$Pro->id}}</td>
                                    <td>{{$Pro->product_id}}</td>
                                    <td>{{$Pro->sku	}}</td>
                                    <td>{{$Pro->product_name}}</td>
                                    <td>${{$Pro->price}}</td>
                                    <td>{{$Pro->amount}}</td>
                                    <td>{{$Pro->discount}}</td>
                                    <td>{{$Pro->image}}</td>
                                    <td>{{$Pro->product_type}}</td>
                                    <td>{{$Pro->supplier}}</td>
                                    <td>{{$Pro->brand}}</td>
                                    <td>{{$Pro->status}}</td>
                                    <td>
                                        <a href="{{route('products.edit',['ID'=>$Pro->id])}}" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-pencil color-muted m-r-5"></i></a>&emsp;
                                        <a href="{{route('products.delete',['ID'=>$Pro->id])}}" data-toggle="tooltip" data-placement="top" title="Close"><i
                                                class="fa fa-close color-danger"></i></a>
                                    </td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="3">Empty data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>#</th>
                                    <th>Product ID</th>
                                    <th>SKU</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Amout</th>
                                    <th>Discount</th>
                                    <th>Image</th>
                                    <th>Product Type</th>
                                    <th>Supplier</th>
                                    <th>Brand</th>
                                    <th>Status</th>
                                    <th></th>
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