@extends('dashboard.layout.dashboard-clothing')
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
                            <label for="exampleInputEmail1">Amount</label>
                            <input class="form-control" name="amount" type="text" value="" placeholder="Amount" required>
                            @if($errors->has('amount'))
                            <span>{{$errors->first('amount')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input class="form-control" name="price" type="text" value="" placeholder="Price" required>
                            @if($errors->has('account'))
                            <span>{{$errors->first('account')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product</label>
                            <input class="form-control" name="product" type="text" value="" placeholder="Product" required>
                            @if($errors->has('product'))
                            <span>{{$errors->first('product')}}</span>
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