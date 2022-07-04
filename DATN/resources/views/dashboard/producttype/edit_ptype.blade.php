@extends('dashboard.layout.dashboard-admin')
@section('content')

<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i> Information</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Product Type</li>
        <li class="breadcrumb-item"><a href="#">Product Type</a></li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <form method="POST" acction="{{route('admin.handleEditProductType',['id_ProT' => $id_ProT])}}"
                id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                <div>
                    <section>
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
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Type</label>
                                    <input type="text" name="product_type_name" value="{{$lsProductType->product_type_name}}"
                                        class="form-control" placeholder="Product Type" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Categories</label>
                                    <select class="form-control" id="val-skill" name="categories">
                                        @foreach($cate as $ct)
                                        @if($ct->id == $lsProductType->categories)
                                        <option value="{{$ct->id}}">{{$ct->categories_name}}</option>
                                        @endif
                                        
                                        @endforeach
                                        @foreach($cate as $ct)
                                        <option value="{{$ct->id}}">{{$ct->categories_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                    </section>
                    <div class="tile-footer">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection