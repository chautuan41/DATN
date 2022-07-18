@extends('dashboard.layout.dashboard-admin')
@section('content')
<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i> Sizes for product</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Sizes</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-6">
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if($errors)
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                        @endif
                        <form method="post" action="{{route('admin.handleAddSizes',['product_id'=>$Pro->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Size</label>
                                <input class="form-control" name="size" type="text" value=""
                                    placeholder="Size" required>
                                @if($errors->has('size'))
                                <span>{{$errors->first('size')}}</span>
                                @endif
                            </div>
                            <div class="tile-footer">
                                <button type="submit" class="btn btn-primary"
                                    onclick="return confirm('Are you sure?')">Add Size</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Size</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($Size as $size)
                                @if($size->status == 1 || $size->status == 0)
                                <tr>@if($size->product == $Pro->id)
                                    <td>{{$Pro->sku}}</td>
                                    <td>{{$size->size}}</td>
                                    <td>{{$size->amount}}</td>
                                    <td>{{$size->status}}</td>
                                    <td>
                                        <a href="{{route('admin.hideSizes',['product_id'=>$size->id])}}" data-toggle="tooltip" data-placement="top" title="Edit"
                                            class="btn btn-light"><i
                                                class="fa fa-pencil color-muted m-r-5"></i></a>&emsp;
                                        <a href="{{route('admin.deleteSizes',['product_id'=>$size->id])}}" class="btn btn-light" onclick="return confirm('Are you sure?')"
                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endif
                                @endif
                                @empty
                                <tr>
                                    <td colspan="4">Empty data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Size</th>
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