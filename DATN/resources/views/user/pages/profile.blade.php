@section('title') 2001 @endsection
@extends('user.app')
@section('content')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Dashboard</h1>
					<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
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
        <div class="dashboard-wrapper dashboard-user-profile">
          <div class="media">
            <div class="pull-left text-center" href="#!">
              <img class="media-object user-img" src="../user/images/avater.jpg" alt="Image">
              <a href="#x" class="btn btn-transparent mt-20">Change Image</a>
            </div>
            <div class="media-body">
              <ul class="user-profile-list">
                <li><span>Full Name:</span>{{$dtProF->full_name}}</li>
                <li><span>Address:</span>{{$dtProF->address}}</li>
                <li><span>Email:</span>{{$dtProF->email}}</li>
                <li><span>Phone:</span>{{$dtProF->phone}}</li>
                <li><span>Date of Birth:</span>{{$dtProF->date_of_birth}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection