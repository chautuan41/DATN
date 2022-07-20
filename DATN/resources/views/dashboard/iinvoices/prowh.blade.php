@extends('dashboard.layout.dashboard-warehouse')
@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Input Invoices</a></li>
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
                                    <form type="get" action="{{route('admin.searchIInvoices','lsIInvoice')}}">
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
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Inventory Value</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wh as $pro)
                               
                                <tr>
                                    <td>{{$pro->id}}</td>
                                    <td>{{$pro->product_name}}</td>
                                    <td>{{$pro->size}}</td>
                                    <td>{{$pro->amount}}</td>
                                   @php $total=$pro->amount*$pro->price @endphp
                                    <td>${{number_format($total)}}</td>
                                    
                                </tr>
                                
                               
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>#</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Inventory Value</th>
                                    
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