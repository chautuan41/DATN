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
                    <div class="header-left ">
                        <p>
                            <a href="{{route('admin.formAddIInvoices')}}" class="btn btn-primary pull-right">Add Input
                                Invoices</a>
                        </p>
                    </div>
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
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Account</th>
                                    <th>Supplier</th>
                                    <th>Status</th>
                                    <!-- <th>Options</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lsIInvoice as $iin)
                                @if($iin->status == 0)
                                <tr>
                                    <td>{{$iin->date}}</td>
                                    <td>{{$iin->total}}</td>

                                    @foreach($Acc as $acc)
                                    @if($acc->id == $iin->account)
                                    <td>{{$acc->email}}</td>
                                    @endif
                                    @endforeach

                                    @foreach($Sup as $sup)
                                    @if($sup->id == $iin->supplier)
                                    <td>{{$sup->supplier_name}}</td>
                                    @endif
                                    @endforeach
                                    <td value="{{$iin->status}}">Waiting for confirmation</td>
                                    <td>
                                        <!-- <a href="#"
                                            data-toggle="tooltip" data-placement="top" title="Edit"
                                            class="btn btn-light"><i
                                                class="fa fa-pencil color-muted m-r-5"></i></a>&emsp;

                                        <button class="btn btn-light" onclick="return confirm('Are you sure?')"><a
                                                href="#"
                                                data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i></a></button> -->
                                    </td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="5">Empty data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Account</th>
                                    <th>Supplier</th>
                                    <th>Status</th>
                                    <!-- <th>Options</th> -->
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