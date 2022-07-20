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
<div class="header-right" style="padding: 0px 300px 0px 0px">
    <div class="container">
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <br>
                <img src="{{asset($dt->image)}}" alt="" style="width:250px; height:250px">
            </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-9">
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
                        <form action="{{ route('admin.handleEditProduct',['product_id'=>$dt->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">

                                <label for="exampleInputEmail1">Product Name</label>

                                <input type="text" class="form-control" id="val-username" name="product_name"
                                    value="{{$dt->product_name}}" placeholder="Product Name">

                            </div>
                            <div class="form-group">

                                <label for="exampleInputEmail1">Description</label>

                                <input type="text" class="form-control" id="val-username" name="description"
                                    value="{{$dt->description}}" placeholder="Description">

                            </div>
                            <div class="form-group">

                                <label for="exampleInputEmail1">Gender</label>

                                <select class="form-control" id="val-skill" name="gender">
                                    <option value="{{$dt->gender}}">
                                        @if($dt->gender == 0)
                                        Women
                                        @endif
                                        @if($dt->gender == 1)
                                        Men
                                        @endif
                                    </option>
                                    <option value="0">Women</option>
                                    <option value="1">Men</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>

                                <input type="text" class="form-control" id="val-currency" name="price"
                                    value="{{$dt->price}}" placeholder="0">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Discount</label>

                                <input type="text" class="form-control" id="val-currency" name="discount"
                                    value="{{$dt->discount}}" placeholder="$">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Like</label>

                                <input type="text" class="form-control" id="val-currency" name="like"
                                    value="{{$dt->like}}" placeholder="0">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Categorie</label>

                                <select class="form-control" id="val-skill" name="categories">
                                    @foreach($dtC as $C)
                                    @if($C->id == $dt->categories)
                                    <option value="{{$C->id}}">{{$C->categories_name}}</option>
                                    @endif
                                    @endforeach
                                    @foreach($dtC as $C)
                                    <option value="{{$C->id}}">{{$C->categories_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Type</label>

                                <select class="form-control" id="val-skill" name="product_type">
                                    @foreach($dtProT as $dtPT)
                                    @if($dtPT->id == $dt->product_type)
                                    <option value="{{$dtPT->id}}">{{$dtPT->product_type_name}}</option>
                                    @endif
                                    @endforeach
                                    @foreach($dtProT as $ProT)
                                    <option value="{{$ProT->id}}">{{$ProT->product_type_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Supplier</label>

                                <select class="form-control" id="val-skill" name="supplier">
                                    @foreach($dtS as $S)
                                    @if($S->id == $dt->supplier)
                                    <option value="{{$S->id}}">{{$S->supplier_name}}</option>
                                    @endif
                                    @endforeach
                                    @foreach($dtS as $S)
                                    <option value="{{$S->id}}">{{$S->supplier_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand</label>

                                <select class="form-control" id="val-skill" name="brand">
                                    @foreach($dtB as $B)
                                    @if($B->id == $dt->brand)
                                    <option value="{{$B->id}}">{{$B->brand_name}}</option>
                                    @endif
                                    @endforeach
                                    @foreach($dtB as $B)
                                    <option value="{{$B->id}}">{{$B->brand_name}}</option>
                                    @endforeach
                                </select>

                            </div>
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
                                    onclick="return confirm('Are you sure?')">Update</button>
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