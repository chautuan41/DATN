@extends('dashboard.layout.dashboard-admin')
@section('content')
<div class="container-fluid">
    <div>
        <h1>&emsp;<i class="fa fa-edit"></i> Images for product</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb" style="background-color:#fff">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Images</li>
    </ul>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{ route('admin.addImages',['product_id'=>$Pro->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Images</label>
                                <input type="file" class="form-control" name="images[]" accept="image/*" multiple>
                            </div>
                            <div class="tile-footer">
                                <button type="submit" class="btn btn-primary"
                                    onclick="return confirm('Are you sure?')">Add
                                    Images</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="max-width:75rem;">
            <div class="row">
                @foreach($IMG as $image)
                @if($Pro->id == $image->product)
                <div class="col-lg-4" style="margin:10px">
                    <img src="{{asset($image->image)}}" class="card-img-top"  alt="">
                    <a href="{{route('admin.deleteImages',['product_id'=>$image->id])}}" data-toggle="tooltip"
                            data-placement="top" title="Delete" class="btn btn-light" style="margin:10px">
                    
                        
                            <i class="fa fa-trash"></i>
                        
                    </a>
                </div>
                @endif
                @endforeach

            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection