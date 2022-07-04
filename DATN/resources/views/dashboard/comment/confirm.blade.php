@extends('dashboard.layout.dashboard-admin')
@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Comment</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-left " style="margin-bottom:20px;">
                        <p>
                            <a href="{{route('admin.listComment')}}" class="btn btn-primary pull-right">Confirmed</a>
                        </p>
                    </div>
                    <div class="header-left " style="margin-bottom:20px;">
                        <p>
                            <a href="{{route('admin.listConfirmComment')}}" class="btn btn-primary pull-right">Wait for confirmation</a>
                        </p>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Comment</th>
                                    <th>Date</th>
                                    <th>Product</th>
                                    <th>Account</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lsComment as $comment)
                                <tr>
                                    <td>{{$comment->comment}}</td>
                                    <td>{{$comment->date_time}}</td>
                                    @foreach($product as $pro)
                                    @if($pro->id == $comment->product)
                                    <td value="{{$pro->id}}">{{$pro->product_name}}</td>
                                    @endif
                                    @endforeach
                                    @foreach($account as $acc)
                                    @if($acc->id == $comment->account)
                                    <td value="{{$acc->id}}">{{$acc->full_name}}</td>
                                    @endif
                                    @endforeach
                                    <td value="{{$comment->status}}">Wait for confirmation</td>
                                    <td>
                                        <button class="btn btn-light" onclick="return confirm('Are you sure?')"><a
                                                href="{{route('admin.confirmComment',['id_comment'=>$comment->id])}}"
                                                data-toggle="tooltip" data-placement="top" title="Comfirm">
                                                <i class="fa fa-check"></i>
                                            </a></button>

                                        &emsp;
                                        <button class="btn btn-light" onclick="return confirm('Are you sure?')"><a
                                                href="{{route('admin.hardDeleteCmt',['id_comment'=>$comment->id])}}"
                                                data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </a></button>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">Empty data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Comment</th>
                                    <th>Date</th>
                                    <th>Product</th>
                                    <th>Account</th>
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