@section('title')Orders - 2001 @endsection
@extends('user.app')
@section('content')
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-name">Purchase History</h1>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Orders</li>
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
                    <li><a href="{{route('user.profile',['id'=>Auth::user()->id])}}">Profile</a></li>
                    <li><a class="active" href="{{route('user.order')}}">Orders</a></li>
                </ul>
                <div class="dashboard-wrapper user-dashboard">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Shipping Address</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dtInv as $Inv)
                                @php $item=0; @endphp
                                @foreach($dtInvD as $InvD)
                                @if( $InvD->invoice == $Inv->id)
                                @php $item++; @endphp
                                @endif
                                @endforeach
                                <tr>
                                    <td>#{{$Inv->id}}</td>
                                    <td>{{$Inv->date_time}}</td>
                                    <td>{{$item}}</td>
                                    <td>{{$Inv->shipping_address}}</td>
                                    <td>${{number_format($Inv->total)}}</td>
                                    @if($Inv->status==0)
                                    <td><span class="label label-primary">Processing</span></td>
                                    @elseif($Inv->status==1)
                                    <td><span class="label label-info">Waiting Delivery</span></td>
                                    @else
                                    <td><span class="label label-success">Completed</span></td>
                                    @endif
                                    <td class="btnfo"><button data-toggle="modal" data-target="#product-modal" 
										data-url="{{ route('user.orderdetailsid',$Inv->id)}}"
										
                                        class="btn btn-default abc">View</button>
									</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal -->
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

<script>
	$('.abc').on('click', function(){
		var data = $(this).attr('data-url');
		$.ajax({
            url: data, // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
            type: "get", // phương thức gửi dữ liệu.
            dataType: "json",
            success: function(response) {
				$('#cthd').html("");
                $.each(response.data, function (key, item) {
                    $('#cthd').append('<tr>\
                        <td>' + item.invoice + '</td>\
                        <td>\
                        <a href="/shop/products/'+item.id+'"</a>'+ item.product_name + 
                        '</td>\
                        <td>' + item.size + '</td>\
                        <td>' + item.amount + '</td>\
                        <td>' + item.price  + '</td>\
                        <td>' + item.discount  + '</td>\
                        <td>' + item.total + '</td>\
                    \</tr>');
                });
            },
            error: function(data, textStatus, errorThrown) {

            },        
     	}),
     	event.preventDefault();
 	})
	 
</script>
@if(session('success'))
<script>
    Swal.fire({
    icon: 'success',
  title: 'Thank you!',
  text: 'Your order has been placed successfully',
    showConfirmButton: false,
  timer: 1500
})
</script>
@endif
@endsection