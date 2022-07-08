@extends('dashboard.layout.dashboard-seller')
@section('content')

<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i>Change Password</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Staff</a></li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
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
            <form acction="{{route('admin.handleChangePWSL',['id_staff'=>$lsStaff->id])}}"  method="POST">
                {{ csrf_field() }}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Current Password</label>
                    <input class="form-control" id='password' name="password_old" type="password" required> 
                    @if($errors->has('password_old'))
                    <span>{{$errors->first('password_old')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input class="form-control" id='password_new' name="password_new" type="password" required>
                    @if($errors->has('password_new'))
                    <span>{{$errors->first('password_new')}}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input class="form-control" id='password_cf' name="password_cf" type="password" required>
                    @if($errors->has('password_cf'))
                    <span>{{$errors->first('password_cf')}}</span>
                    @endif
                  </div>
                <div class="tile-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
        </div>
    </div>
</div>
@endsection