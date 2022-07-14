@extends('dashboard.app')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Cart</a></li>
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
                                    <input type="search" class="form-control" placeholder="Search Order"
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
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Shipping Address</th>
                                    <th>Total</th>
                                    <th> Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dtInv as $Inv)
                                <tr>
                                    <td>{{$Inv->id}}</td>
                                    <td>{{$Inv->full_name}}</td>
                                    <td>{{$Inv->phone}}</td>
                                    <td>{{$Inv->email}}</td>
                                    <td>{{$Inv->shipping_address}}</td>
                                    <td>{{$Inv->total}}</td>
                                    <td>{{$Inv->date_time}}</td>
                                    <td>
                                        <a class="abc" data-url="{{ route('sale.ordertracking.get',$Inv->id)}}"
                                            data-toggle="modal" data-placement="top" data-target="#product-modal"
                                            title="View"><i class="fa fa-eye color-muted m-r-5"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('sale.confirm',$Inv->id)}}" data-toggle="tooltip"
                                            data-placement="top" title="Confirm"><i
                                                class="fa fa-check color-muted m-r-5"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
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
                                            <h4>Invoice Detail</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order ID</th>
                                                        <th>Product</th>
                                                        <th>Size</th>
                                                        <th>Amount</th>
                                                        <th>Price</th>
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
            </div>
        </div><!-- /.modal -->
    </div>
</div>
<script>
    $('.abc').on('click', function() {
        var data = $(this).attr('data-url');
        $.ajax({
                url: data, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                type: "get", // phương thức gửi dữ liệu.
                dataType: "json",
                success: function(response) {
                    $('#cthd').html("");
                    $.each(response.data, function(key, item) {
                        $('#cthd').append('<tr>\
                        <th>' + item.invoice + '</th>\
                        <td>' + item.product_name + '</td>\
                        <td>' + item.size + '</td>\
                        <td>' + item.amount + '</td>\
                        <td>$' + item.price + '</td>\
                        <td>$' + item.total + '</td>\
                    \</tr>');
                    });
                },
                error: function(data, textStatus, errorThrown) {},
            }),
            event.preventDefault();
    })

    

    </script>
@endsection