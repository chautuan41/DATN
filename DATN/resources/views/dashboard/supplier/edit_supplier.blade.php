@extends('dashboard.layout.dashboard-admin')
@section('content')

<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i> Information</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Edit</li>
        <li class="breadcrumb-item"><a href="#">Supplier</a></li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <form method="POST" acction="{{route('admin.handleEditSupplier',['id_supplier' => $id_supplier])}}"
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
                                    <label for="exampleInputEmail1">Supplier ID</label>
                                    <input type="text" name="supplier_id" value="{{$lsSupplier->supplier_id}}"
                                        class="form-control" placeholder="Supplier ID" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier Name</label>
                                    <input type="text" name="supplier_name" value="{{$lsSupplier->supplier_name}}"
                                        class="form-control" placeholder="Supplier Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" name="phone" value="{{$lsSupplier->phone}}" class="form-control"
                                        placeholder="Phone" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Addess</label>
                                    <input type="text" name="address" value="{{$lsSupplier->address}}"
                                        class="form-control" placeholder="Addess" required>
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