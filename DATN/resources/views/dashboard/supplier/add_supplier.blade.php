@extends('dashboard.layout.dashboard-admin')
@section('content')
<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i> Information</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Supplier</li>
        <li class="breadcrumb-item"><a href="#">Add Supplier</a></li>
    </ul>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
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
                        <form method="POST" acction="{{route('admin.handleAddSupplier')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Supplier Name</label>
                                <input class="form-control" name="supplier_name" type="text" value=""
                                    placeholder="Supplier Name" required>
                                @if($errors->has('supplier_name'))
                                <span>{{$errors->first('supplier_name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input class="form-control" name="phone" type="text" value="" placeholder="Phone"
                                    required>
                                @if($errors->has('phone'))
                                <span>{{$errors->first('phone')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input class="form-control" name="address" type="text" value="" placeholder="Addess"
                                    required>
                                @if($errors->has('address'))
                                <span>{{$errors->first('address')}}</span>
                                @endif
                            </div>
                            <div class="tile-footer">
                                <button type="submit" class="btn btn-primary"
                                    onclick="return confirm('Are you sure?')">Add Supplier</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection