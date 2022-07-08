@extends('dashboard.layout.dashboard-clothing')
@section('content')

<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i> Information</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Edit</li>
        <li class="breadcrumb-item"><a href="#">Input Invoices</a></li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <form method="POST" acction="{{route('admin.handleEditIInvoices',['id_input' => $id_input])}}"
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
                                    <label for="exampleInputEmail1">Date</label>
                                    <input type="text" name='date' value="{{$lsIInvoice->date}}"
                                        class="form-control" placeholder="Date" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total</label>
                                    <input type="text" name='total' value="{{$lsIInvoice->total}}"
                                        class="form-control" placeholder="Total" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Account</label>
                                    <input type="text" name='account' value="{{$lsIInvoice->account}}"
                                        class="form-control" placeholder="Account" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier</label>
                                    <input type="text" name='supplier' value="{{$lsIInvoice->supplier}}"
                                        class="form-control" placeholder="Supplier" required>
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