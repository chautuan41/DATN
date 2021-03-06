@extends('dashboard.layout.dashboard-admin')
@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Input Invoices</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="header-left ">
                        <p>
                            <a href="{{route('admin.listIInvoices')}}" class="btn btn-primary pull-right"> Input
                                Invoices</a>
                        </p>
                    </div>
                    <div class="header-left ">
                        <p>
                            <a href="{{route('admin.listWaitIInvoices')}}" class="btn btn-primary pull-right">Confirm
                                Orders</a>
                        </p>
                    </div>
                    <div class="header-content clearfix">
                        <div>
                            <div class="header-right">
                                <div class="input-group icons">
                                    <form type="get" action="{{route('admin.searchIInvoices','lsIInvoice')}}">
                                        <input type="search" name="query" class="form-control" placeholder="Search">
                                    </form>
                                    <div class="input-group-prepend">
                                        <button class="input-group-text bg-transparent border-0 pr-2 pr-sm-3"
                                            id="basic-addon1"><i class="mdi mdi-magnify"></i>
                                        </button>
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
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Account</th>
                                    <th>Supplier</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lsIInvoice as $iin)
                                @if($iin->status == 1)
                                <tr>
                                    <td>{{$iin->date}}</td>
                                    <td>{{$iin->total}}</td>
                                    @foreach($Acc as $acc)
                                    @if($acc->id == $iin->account)
                                    <td>{{$acc->email}}</td>
                                    @endif
                                    @endforeach

                                    @foreach($Sup as $sup)
                                    @if($sup->id == $iin->supplier)
                                    <td>{{$sup->supplier_name}}</td>
                                    @endif
                                    @endforeach
                                    <td value="{{$iin->status}}">Confirmed</td>

                                    <td>
                                        <a data-url="{{ route('ii.order.get',$iin->id)}}" data-toggle="modal"
                                            data-placement="top" data-target="#product-modal" title="View"
                                            class="btn btn-light cthdn"><i class="fa fa-eye color-muted m-r-5"></i></a>
                                    </td>

                                    <!-- <button class="btn btn-light" onclick="return confirm('Are you sure?')"><a
                                                href="#"
                                                data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i></a></button> -->

                                </tr>
                                @endif
                                @empty
                                <tr>
                                    <td colspan="5">Empty data</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Account</th>
                                    <th>Supplier</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal product-modal fade" id="product-modal">
            <div class="modal-dialog " role="document">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times color-muted m-r-10"></i>
                </button>
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h4>Input Invoices Detail</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Product ID</th>
                                                        <th>Amount</th>
                                                        <th>Price</th>
                                                        <th>Size</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cthdn">

                                                </tbody>
                                            </table>
                                        </div>
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
<script src="{{asset('user/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$('.cthdn').on('click', function() {
    var data = $(this).attr('data-url');
   
    $.ajax({
            url: data, // ???????ng d???n khi g???i d??? li???u ??i 'search' l?? t??n route m??nh ?????t b???n m??? route l??n xem l?? hi???u n?? l?? c??i j.
            type: "get", // ph????ng th???c g???i d??? li???u.
            dataType: "json",
            success: function(response) {
                $('#cthdn').html("");
                $.each(response.data, function(key, item) {
                    $('#cthdn').append('<tr>\
                        <td>' + item.sku + '</td>\
                        <td>' + item.amount + '</td>\
                        <td>$' + item.price + '</td>\
                        <td>' + item.size + '</td>\
                    \</tr>');
                });
            },
            error: function(data, textStatus, errorThrown) {},
        }),
        event.preventDefault();
})
</script>
@endsection