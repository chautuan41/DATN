@extends('dashboard.app')
@section('content')

<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i> Information</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Edit</li>
        <li class="breadcrumb-item"><a href="#">Account Type</a></li>
    </ul>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <form method="POST" acction="{{route('sale.orderdetail.post',$dtInvD->id)}}"
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
                                    <label for="exampleInputEmail1">Product</label>
                                    @foreach($pro as $p)
                                    @if($p->id == $dtInvD->product)
                                    <input type="hidden" value="{{$p->product_name}}" class="form-control" required>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Size</label>
                                    <select class="form-control" id="val-skill" name="size">
                                    @foreach($size as $s)
                                    @if($s->id==$dtInvD->size)
                                    <option value="{{$s->id}}">
                                    {{$s->size}}
                                    </option>
                                    @endif
                                    @endforeach
                                    @foreach($size as $s)
                                    @if($s->id!=$dtInvD->size)
                                    <option value="{{$s->id}}">
                                    {{$s->size}}
                                    </option>
                                    @endif
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="number" value="{{$dtInvD->amount}}" name="amount"class="form-control" required>
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