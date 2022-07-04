@extends('dashboard.layout.dashboard-admin')
@section('content')
<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i> Information</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Categories</li>
        <li class="breadcrumb-item"><a href="#">Add Categories</a></li>
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
                        <form method="POST" acction="{{route('admin.handleAddCategories')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Categories Name</label>
                                <input class="form-control" name="categories_name" type="text" value=""
                                    placeholder="Categories Name" required>
                                @if($errors->has('categories_name'))
                                <span>{{$errors->first('categories_name')}}</span>
                                @endif
                            </div>
                            <div class="tile-footer">
                                <button type="submit" class="btn btn-primary"
                                    onclick="return confirm('Are you sure?')">Add Categories</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection