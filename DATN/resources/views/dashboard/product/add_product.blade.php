@extends('dashboard.layout.dashboard-admin')
@section('content')
<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i> Information</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Product</li>
        <li class="breadcrumb-item"><a href="#">Add Product</a></li>
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
                        <form action="{{ route('admin.handleAddProduct') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">

                                <label for="exampleInputEmail1">Product Name</label>

                                <input type="text" class="form-control" id="val-username" name="product_name"
                                    placeholder="Product Name">

                            </div>
                            <div class="form-group">

                                <label for="exampleInputEmail1">Description</label>

                                <input type="text" class="form-control" id="val-username" name="description"
                                    value="" placeholder="Description">

                            </div>
                            <div class="form-group">

                                <label for="exampleInputEmail1">Gender</label>

                                <select class="form-control" id="val-skill" name="gender">
                                    <option value="">Please select</option>
                                    <option value="0">Women</option>
                                    <option value="1">Men</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Categorie</label>

                                <select class="form-control" id="val-skill" name="categories">
                                    <option value="">Please select</option>
                                    @foreach($dtC as $C)
                                    <option value="{{$C->id}}">{{$C->categories_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Type</label>

                                <select class="form-control" id="val-skill" name="product_type">
                                    <option value="">Please select</option>
                                    @foreach($dtProT as $ProT)
                                    <option value="{{$ProT->id}}">{{$ProT->product_type_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Supplier</label>

                                <select class="form-control" id="val-skill" name="supplier">
                                    <option value="">Please select</option>
                                    @foreach($dtS as $S)
                                    <option value="{{$S->id}}">{{$S->supplier_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand</label>

                                <select class="form-control" id="val-skill" name="brand">
                                    <option value="">Please select</option>
                                    @foreach($dtB as $B)
                                    <option value="{{$B->id}}">{{$B->brand_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <textarea placeholder="Image" class="form-control" name="image" id="my-editor"
                                    cols="30" rows="10"></textarea>

                            </div> -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Images</label>
                                    <input type="file" class="form-control" name="images[]" accept="image/*" multiple>
                            </div>

                            <div class="tile-footer">
                                <button type="submit" class="btn btn-primary"
                                    onclick="return confirm('Are you sure?')">Add Product</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection