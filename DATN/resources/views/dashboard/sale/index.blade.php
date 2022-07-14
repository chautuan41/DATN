@section('title') 2001 @endsection
@extends('dashboard.app')
@section('content')
<div class="container-fluid mt-3">
    @php $count=0; $date=now(); $revenue=0; $profit=0; $cost=0; @endphp
    @foreach($dtInvD as $InvD)
    @php $count+=$InvD->amount @endphp
    @endforeach
    @foreach($dtInv as $Inv)
    @php $revenue += $Inv->total @endphp
    @endforeach
    @foreach($dtIInv as $Inv)
    @php $cost += $Inv->total @endphp
    @endforeach
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
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">New Customers</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{$acc}}</h2>
                        <p class="text-white mb-0">{{$date->toFormattedDateString()}}</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Profit</h3>
                    <div class="d-inline-block">
                        @php $profit = $revenue - $cost @endphp
                        <h2 class="text-white">$ {{$profit}}</h2>
                        <p class="text-white mb-0">{{$date->toFormattedDateString()}}</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Sale Revenue</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">$ {{$revenue}}</h2>
                        <p class="text-white mb-0">{{$date->toFormattedDateString()}}</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-signal"></i></span>
                </div>
            </div>
        </div>
    </div>






    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hourly Revenue</h4>
                    <div id="bar-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Expenses For The Month</h4>
                    <div id="bar-chart1"></div>
                </div>
            </div>
        </div>
        
    </div>

    

    

    



    
</div>
<!-- #/ container -->

@endsection