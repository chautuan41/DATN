@extends('dashboard.layout.dashboard-admin')
@section('content')


<div class="header-content clearfix">
    <div class="header-left">
        <div class="input-group icons">
            <div class="input-group-prepend">
                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                        class="mdi mdi-magnify"></i></span>
            </div>
            <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
            <div class="drop-down animated flipInX d-md-none">
                <form action="#">
                    <input type="text" class="form-control" placeholder="Search">
                </form>
            </div>
        </div>
    </div>
</div>
@php $count=0; $date=now(); $total=0; @endphp
@foreach($dtInvD as $InvD)
@php $count+=$InvD->amount @endphp
@endforeach
@foreach($dtInv as $Inv)
@php $total+=$Inv->total @endphp
@endforeach
@php $revenue=0; @endphp
@foreach($dtInvS as $Inv)
@php $revenue += $Inv->total @endphp
@endforeach
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Products Sold</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{$count}}</h2>
                        <p class="text-white mb-0">{{$date->toFormattedDateString()}}</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Sale Revenue</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">$ {{$revenue}}</h2>
                        <p class="text-white mb-0">{{$date->toFormattedDateString()}}</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Customers</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{$acc}}</h2>
                        <p class="text-white mb-0">{{$date->toFormattedDateString()}}</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Revenue</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">${{$total}}</h2>
                        <p class="text-white mb-0">{{$date->toFormattedDateString()}}</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-0 d-flex justify-content-between">
                            <div>
                                <h4 class="mb-1">Product Sales</h4>
                                <p>Total Earnings of the Month</p>
                                <h3 class="m-0">$ {{$total}}</h3>
                            </div>
                            <div>
                                <ul>
                                    <li class="d-inline-block mr-3"><a class="text-dark" href="#">Day</a></li>
                                    <li class="d-inline-block mr-3"><a class="text-dark" href="#">Week</a></li>
                                    <li class="d-inline-block"><a class="text-dark" href="#">Month</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <div id="bar-chart2"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Summary</h4>
                    <div id="morris-bar-chart"></div>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card card-widget">
                <div class="card-body">
                    <h5 class="text-muted">Order Overview </h5>
                    <h2 class="mt-4">5680</h2>
                    <span>Total Revenue</span>
                    <div class="mt-4">
                        <h4>30</h4>
                        <h6>Online Order <span class="pull-right">30%</span></h6>
                        <div class="progress mb-3" style="height: 7px">
                            <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar"><span
                                    class="sr-only">30% Order</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4>50</h4>
                        <h6 class="m-t-10 text-muted">Offline Order <span class="pull-right">50%</span></h6>
                        <div class="progress mb-3" style="height: 7px">
                            <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"><span
                                    class="sr-only">50% Order</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h4>20</h4>
                        <h6 class="m-t-10 text-muted">Cash On Develery <span class="pull-right">20%</span></h6>
                        <div class="progress mb-3" style="height: 7px">
                            <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar"><span
                                    class="sr-only">20% Order</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-0">
                    <h4 class="card-title px-4 mb-3">Todo</h4>
                    <div class="todo-list">
                        <div class="tdl-holder">
                            <div class="tdl-content">
                                <ul id="todo_list">
                                    <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#'
                                                class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a href='#'
                                                class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox"><i></i><span>Don't give up the fight.</span><a
                                                href='#' class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox" checked><i></i><span>Do something else</span><a
                                                href='#' class="ti-trash"></a></label></li>
                                </ul>
                            </div>
                            <div class="px-4">
                                <input type="text" class="tdl-new form-control"
                                    placeholder="Write new item and hit 'Enter'...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection