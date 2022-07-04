@extends('dashboard.layout.dashboard-admin')
@section('content')
<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i>Information</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Input Invoices</li>
        <li class="breadcrumb-item"><a href="#">Add Input Invoices</a></li>
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
                    <form method="POST" acction="{{route('admin.handleAddIInvoices')}}">
                        @csrf
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Total</label>
                            <input class="form-control" name="total" type="text" value="" placeholder="Total" required>
                            @if($errors->has('date'))
                            <span>{{$errors->first('date')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Account</label>
                            <input class="form-control" name="account" type="text" value="" placeholder="Account" required>
                            @if($errors->has('account'))
                            <span>{{$errors->first('account')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Supplier</label>
                            <input class="form-control" name="supplier" type="text" value="" placeholder="Supplier" required>
                            @if($errors->has('supplier'))
                            <span>{{$errors->first('supplier')}}</span>
                            @endif
                        </div>
                        <div class="tile-footer">
                            <button type="submit" class="btn btn-primary"
                                onclick="return confirm('Are you sure?')">Add Input Invoices</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>


@endsection