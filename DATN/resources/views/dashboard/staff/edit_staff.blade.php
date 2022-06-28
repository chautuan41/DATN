@extends('dashboard.layout.dashboard-admin')
@section('content')

<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i> Information</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Edit</li>
        <li class="breadcrumb-item"><a href="#">Staff</a></li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <form method="POST" acction="{{route('admin.handleEditStaff',['id_staff' => $id_staff])}}"
                id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                <div>
                    <section>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" value="{{$lstStaff->email}}" class="form-control"
                                        placeholder="Email" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Full Name</label>
                                    <input type="text" name="full_name" value="{{$lstStaff->full_name}}"
                                        class="form-control" placeholder="Full Name" required>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date of Birth</label>
                                    <input type="text" name="date_of_birth" value="{{$lstStaff->date_of_birth}}"
                                        class="form-control" placeholder="Date of Birth" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" name="phone" value="{{$lstStaff->phone}}" class="form-control"
                                        placeholder="Phone" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Addess</label>
                                    <input type="text" name="address" value="{{$lstStaff->address}}"
                                        class="form-control" placeholder="Addess" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Staff</label>
                                    <select class="form-control" id="val-skill" name="role">
                                        @foreach($rl as $role)
                                        @if($role->id == $lstStaff->role)
                                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                                        @endif
                                        
                                        @endforeach
                                        @foreach($rl as $role)
                                        <option value="{{$role->id}}">{{$role->role_name}}</option>
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