@extends('dashboard.layout.dashboard-warehouse')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h2 class="page-title">Input Invoices</h2>

            </div>

        </div>
    </div>


    <div class="container-fluid">
        <div class="flex-button-hdn">
        </div>
        <div class="row">
            <div class="col-lg-12 col-xlg-9 col-md-12">

                <form method="POST" action="#" class="col-lg-12">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="row">
                                    <div class="col">
                                        <div class="header-right ">
                                            <p>
                                                <a href="{{route('admin.addProduct')}}"
                                                    class="btn btn-primary pull-right">Add Product</a>
                                            </p>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="col-md-9">Supplier</label>
                                                <select class="form-control" name="supplier">
                                                    @foreach($Sup as $sup)
                                                    <option value="{{$sup->id}}">{{$sup->supplier_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- <button type="submit" id="form-add" data-url="#" class="btn btn-primary btn_showne" >
                                        Complete
                                    </button> --}}
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <div id="themcthd">
                <form>
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal form-material">
                                <div class="row">
                                    <div class="col">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="col-md-6">Product</label>
                                                <select class="form-control" name="sku">
                                                    @foreach($Pro as $pro)
                                                    <option value="{{$pro->id}}">{{$pro->sku}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6">Price</label>
                                                <div class="col-md-0 border-bottom p-0">
                                                    <input type="number" placeholder=" " name="price"
                                                        id="ajax-nhapsoluong" class="form-control p-0 border-1">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-6">Quantily</label>
                                                <div class="col-md-0 border-bottom p-0">
                                                    <input type="number" placeholder=" " name="amount"
                                                        id="ajax-nhapsoluong" class="form-control p-0 border-1">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <p id="idcthdne" style="display: none"></p>
                                                <div class="col" style="flex: 0 0 0%">
                                                    <button type="submit" id="form-add-cthd"
                                                        class="btn btn-primary pull-right">Add Product</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Column -->
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Invoice details</a></li>
                    </ol>
                </div>
            </div>
            <table id="123cthdne" class="table text-nowrap" style="background-color: #fbfafa">
                <thead>
                    <tr>
                        <th class="border-top-0">Product</th>
                        <th class="border-top-0">Price</th>
                        <th class="border-top-0">Quantily</th>
                    </tr>
                </thead>
            </table>
        </div>
        <a class="btn btn-primary pull-right" data-url="{{route('admin.handleAddIInvoices')}}" id="hdn"
            href="#">Confirm</a>
    </div>

</div>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function showaddcthd() {
    var btn = document.getElementById('themcthd');
    btn.style.display = "block";
}

function disableButton() {
    var btn = document.getElementById('form-add');
    btn.disabled = true;
    btn.innerText = 'Complete...'
}
var tableID = "123cthdne";

function deleteRow(currentRow) {
    try {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        for (var i = 0; i < rowCount; i++) {
            var row = table.rows[i];

            if (row == currentRow.parentNode.parentNode) {
                if (rowCount <= 1) {
                    alert("Cannot delete all the rows.");
                    break;
                }
                table.deleteRow(i);
                rowCount--;
                i--;
            }
        }
    } catch (e) {
        alert(e);
    }
};


$("#hdn").click(function(event) {
    var url = $(this).attr('data-url');
    let tennhacungcap = $("select[name=supplier]").val();
    let taikhoan_id = $("select[name=sku]").val();
    let _token = $('meta[name="csrf-token"]').attr('content');
    var hoadonnhap_id = $('#idcthdne').html();

    $.ajax({
        url: url,
        type: "POST",
        data: {
            supplier: tennhacungcap,
            _token: _token
        },
        success: function(response) {
            console.log(response);
            if (response) {
                $('.success').text(response.success);
                $('p#idcthdne').html(response.idcthd);
                alert(hoadonnhap_id);
            }
        },
        error: function(error) {
            alert('Please enter enough information');
        }

    });
    $.ajax({
        success: function() {
            laydulieu();
        },
        error: function(error) {
            alert('Please enter enough information');
        }
    });
});
$("#form-add-cthd").click(function(event) {

    event.preventDefault();
    var url = $(this).attr('data-url-ctsp');
    let soluong = $("input[name=amount]").val();
    let gia = $("input[name=price]").val();
    let sanpham_id = $("select[name=sku]").val();
    var hoadonnhap_id = $('#idcthdne').html();

    let _token = $('meta[name="csrf-token"]').attr('content');
    var dongianhap = $('#ogiasieunhap').html();

    function themmoichitiethoadon() {
        var table = document.getElementById("123cthdne");
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        cell1.innerHTML = sanpham_id;
        cell2.innerHTML = gia;
        cell3.innerHTML = soluong;
        cell4.innerHTML = hoadonnhap_id;
        cell5.innerHTML =
            "<button onclick='deleteRow(this)' type='button' class='btn btn-danger btn-delete'>Delete</button>";
    }
    $.ajax({
        success: function() {
            themmoichitiethoadon();

        },
        error: function(error) {
            alert('Please enter enough information');
        }
    });
});

function laydulieu() {

    var oTable = document.getElementById('123cthdne');
    var rowLength = oTable.rows.length;

    for (i = 0; i < rowLength; i++) {
        var oCells = oTable.rows.item(i + 1).cells;
        var cellLength = oCells.length;
        var cellVal1 = oCells.item(2).innerHTML;
        var cellVal2 = oCells.item(3).innerHTML;
        alert(oCells.item(3).innerHTML);

        for (var j = 0; j < rowLength - rowLength + 1; j++) {
            var dongianhap = $('#idcthdne').html();
            let sanpham_id = oCells.item(0).innerHTML;
            let gia = oCells.item(1).innerHTML;
            let soluong = oCells.item(2).innerHTML;
            var hoadonnhap_id = dongianhap;
            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/admin/input-invoice/handle/',
                type: "POST",
                data: {
                    amount: soluong,
                    price: gia,
                    import_invoice: hoadonnhap_id,
                    product: sanpham_id,
                    _token: _token
                },
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('.success').text(response.success);
                    }
                },
                error: function(error) {
                    alert('Please enter enough information');
                }
            });
        }
    }
}
</script>

@endsection