@extends('dashboard.layout.dashboard-admin')
@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> Brand</a></li>
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
                            <a href="{{route('admin.formAddProductType')}}" class="btn btn-primary pull-right">Add
                                Product Type</a>
                        </p>
                    </div>
                    <div class="header-content clearfix">
                        <div>
                            <div class="header-right">
                                <div class="input-group icons">
                                    <form type="get" action="{{route('admin.searchProductType','lsProductType')}}">
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
                                    <th>ID</th>
                                    <th>Product Type</th>
                                    <th>Categories</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lsProductType as $ptype)
                                @if($ptype->status == 1)
                                <tr>
                                    <td>{{$ptype->id}}</td>
                                    <td>{{$ptype->product_type_name}}</td>
                                    <td>{{$ptype->categories}}</td>
                                    <td>{{$ptype->status}}</td>
                                    <td>
                                        <a href="{{route('admin.formEditProductType',['id_ProT'=>$ptype->id])}}"
                                            data-toggle="tooltip" data-placement="top" title="Edit"
                                            class="btn btn-light"><i
                                                class="fa fa-pencil color-muted m-r-5"></i></a>&emsp;
                                        <button class="btn btn-light" onclick="return confirm('Are you sure?')"><a
                                                href="{{route('admin.deleteProductType',['id_ProT'=>$ptype->id])}}"
                                                data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i></a></button>
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
                                    <th>ID</th>
                                    <th>Product Type</th>
                                    <th>Categories</th>
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