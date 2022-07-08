@extends('dashboard.layout.dashboard-watches')
@section('content')

<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i>Personal Information</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Staff</a></li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
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
            <form method="POST" acction="{{route('admin.handlePersonalInfoWC',['id_staff' => $id_staff])}}"
                id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                <div>
                    <section>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" value="{{$lsStaff->email}}" class="form-control"
                                        placeholder="Email" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Full Name</label>
                                    <input type="text" name="full_name" value="{{$lsStaff->full_name}}"
                                        class="form-control" placeholder="Full Name" required>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Date of Birth</label>
                                    <input type="text" name="date_of_birth" value="{{$lsStaff->date_of_birth}}"
                                        class="form-control" placeholder="Date of Birth" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" name="phone" value="{{$lsStaff->phone}}" class="form-control"
                                        placeholder="Phone" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Addess</label>
                                    <input type="text" name="address" value="{{$lsStaff->address}}" class="form-control"
                                        placeholder="Addess" required>
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
            <br><div class="tile-footer">
                <a href="{{route('admin.formChangePWWC',$id_staff)}}" role="button" class="btn btn-primary">Change
                    Password</a>
            </div>
        </div>
    </div>
</div>
@endsection