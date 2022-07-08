@extends('dashboard.layout.dashboard-admin')
@section('content')
<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i> Information</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Product Type</li>
        <li class="breadcrumb-item"><a href="#">Add Product Type</a></li>
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
                        <form method="POST" acction="{{route('admin.handleAddProductType')}}">
                            @csrf

                            <div class="header-left">
                                <p>
                                    <a href="{{route('admin.formAddCategories')}}"
                                        class="btn btn-primary pull-right">Add New Categories If Not Already
                                    </a>
                                </p>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Type</label>
                                <input class="form-control" name="product_type_name" type="text" value=""
                                    placeholder="Product Type" required>
                                @if($errors->has('product_type_name'))
                                <span>{{$errors->first('product_type_name')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Categories</label>
                                <select class="form-control" id="val-skill" name="categories">
                                    <option value="">Please select</option>
                                    @foreach($cate as $ct)
                                    <option value="{{$ct->id}}">{{$ct->categories_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="tile-footer">
                                <button type="submit" class="btn btn-primary"
                                    onclick="return confirm('Are you sure?')">Add Product Type</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection