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
                <div class="dashboard-wrapper dashboard-user-profile">
                    <div class="media">
                        <div class="pull-left text-center" href="#!">
                            <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <img class="media-object user-img" src="{{asset($dtProF->avatar)}}"
                                    alt="{{$dtProF->avatar}}">

                            </form>
                        </div>
                        <div class="media-body">
                            <div class="col-md-6 col-md-4">
                                <form class="text-left clearfix" method="POST" action="{{ route('profile.change.post',$dtProF->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="newpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="newpassword" required autocomplete="new-password"
                                        placeholder="New Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" name="confirmation" required autocomplete="new-password"
                                        placeholder="Confirm Password" required>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-main btn-small btn-round-full btn-solid-border"
                                            type="submit">Change
                                        Password</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script>

</script>

@endsection