@section('title')Profile - 2001 @endsection
@extends('user.app')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Profile</h1>
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">{{$dtProF->full_name}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="user-dashboard page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline dashboard-menu text-center">
                    <li><a class="active" href="{{route('user.profile',['id'=>Auth::user()->id])}}">Profile</a></li>
                    <li><a href="{{route('user.order')}}">Orders</a></li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="dashboard-wrapper dashboard-user-profile">
                    <div class="media">
                        <div class="pull-left text-center" href="#!">
                            <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <img class="media-object user-img" src="{{asset($dtProF->avatar)}}"
                                    alt="{{$dtProF->avatar}}">
                                <label for="files" class="btn btn-transparent mt-20">Change Image</label>
                                <input id="files" class="selectImage" style="display:none;" name="files" type="file">
                                <input name="id" type="hidden" value="{{Auth::user()->id}}">
                                <div>
                                    <button class="btn btn-main btn-small btn-round-full btn-solid-border "
                                        type="submit">save</button>
                                </div>
                            </form>
                        </div>
                        <div class="media-body">
                            <ul class="user-profile-list">
                                <li><span>Full Name:</span>{{$dtProF->full_name}}</li>
                                <li><span>Address:</span>{{$dtProF->address}}</li>
                                <li><span>Email:</span>{{$dtProF->email}}</li>
                                <li><span>Phone:</span>{{$dtProF->phone}}</li>
                                <li><span>Date of Birth:</span>{{$dtProF->date_of_birth}}</li>
                                <li><a class="btn btn-main btn-small btn-round-full btn-solid-border "
                                        href="{{route('user.profile.edit',['id'=>$dtProF->id])}}">Edit
                                        Profile</a>
                                    <a class="btn btn-main btn-small btn-round-full btn-solid-border "
                                        href="{{route('user.profile.change',['id'=>$dtProF->id])}}">Change
                                        Password</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal product-modal fade" id="product-modal">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="tf-ion-close"></i>
                </button>
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="dashboard-wrapper user-dashboard">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Product</th>
                                                        <th>Size</th>
                                                        <th>Amount</th>
                                                        <th>Price</th>
                                                        <th>Discount</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cthd">

                                                    

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->
        </div>
    </div>
</section>
@if (session('success'))
<script>
Swal.fire(
    'Well done!',
    'Change photo successfully',
    'success'
)
</script>
@elseif (session('error'))
<script>
Swal.fire({
    icon: 'error',
  title: 'Sorry!',
  text: 'Change photo failed',
    showConfirmButton: false,
  timer: 1500
})
</script>
@elseif (session('success1'))
<script>
Swal.fire(
    'Well done!',
    'Successfully changed information',
    'success'
)
</script>
@elseif (session('success2'))
<script>
Swal.fire(
    'Well done!',
    'Password successfully changed',
    'success'
)
</script>
@endif
@endsection