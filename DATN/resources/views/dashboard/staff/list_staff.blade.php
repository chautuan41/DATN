@extends('dashboard.layout.dashboard-admin')
@section('content')




<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">

            <li class="breadcrumb-item active"><a href="javascript:void(0)">Account</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Staff</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-content clearfix">
                        <div>

                            <div class="header-right">

                                <div class="input-group icons">

                                    <input type="search" class="form-control" placeholder="Search Dashboard"
                                        aria-label="Search Dashboard">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3"
                                            id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                                    </div>
                                    <div class="drop-down animated flipInX d-md-none">
                                        <form action="#">
                                            <input type="text" class="form-control" placeholder="Search">
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <br>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Full Name</th>
                                    <th>Date of Birth</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($listStaff as $staff)
                                @if($staff->status == 1 && $staff->role != 1)
                                <tr>
                                    <td>{{$staff->email}}</td>
                                    <td>{{$staff->full_name}}</td>
                                    <td>{{$staff->date_of_birth}}</td>
                                    <td>{{$staff->phone}}</td>
                                    <td>{{$staff->address}}</td>
                                    <td>{{$staff->status}}</td>
                                    <td>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class="fa fa-pencil color-muted m-r-5"></i></a>&emsp;
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Close"><i
                                                class="fa fa-close color-danger"></i></a>
                                    </td>
                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="3">Empty data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Email</th>
                                    <th>Full Name</th>
                                    <th>Date of Birth</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection