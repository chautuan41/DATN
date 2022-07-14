@extends('dashboard.layout.dashboard-admin')
@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Out Invoices</a></li>
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
                        <!-- <p>
                            <a href="#" class="btn btn-primary pull-right">Add Input
                                Invoices</a>
                        </p> -->
                    </div>
                    <div class="header-content clearfix">
                        <div>
                            <div class="header-right">
                                <div class="input-group icons">
                                    <form type="get" action="{{route('admin.searchOInvoices','lsOInvoice')}}">
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
                                    <th>Shipping Address</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Account</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lsOInvoice as $oin)
                                @if($oin->status == 2)
                                <tr>
                                    <td>{{$oin->id}}</td>
                                    <td>{{$oin->shipping_address}}</td>
                                    <td>{{$oin->date_time}}</td>
                                    <td>{{$oin->total}}</td>
                                    @foreach($lsAcc as $acc)
                                    @if($acc->id == $oin->account)
                                    <td value="{{$acc->id}}">{{$acc->account}}</td>
                                    @endif
                                    @endforeach
                                    <td>{{$oin->status}}</td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="6">Empty data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Shipping Address</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Account</th>
                                    <th>Status</th>
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