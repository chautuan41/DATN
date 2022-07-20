@extends('dashboard.app')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Cart</a></li>
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
                            <div class="header-right">
                                <div class="input-group icons">
                                    <input type="search" class="form-control" placeholder="Search Order"
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
                                    <th>Order ID</th>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Amount</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dtInvD as $Inv)
                                <tr>
                                    <td>{{$Inv->invoice}}</td>
                                    <td>{{$Inv->product_name}}</td>
                                    <td>{{$Inv->size}}</td>
                                    <td>{{$Inv->amount}}</td>
                                    <td>{{$Inv->total}}</td>
                                    <td>
                                    <a href="{{route('sale.orderdetail.edit',$Inv->id)}}"
                                            data-toggle="tooltip" data-placement="top" title="Edit"
                                            class="btn btn-light" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        &emsp;
                                        <a href="{{route('sale.orderdetail.delete',$Inv->id)}}"
                                            class="btn btn-light" onclick="return confirm('Are you sure?')"
                                            data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection