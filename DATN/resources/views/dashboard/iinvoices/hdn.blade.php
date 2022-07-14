@extends('dashboard.layout.dashboard-warehouse')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Add invoice</h4>
            </div>
           
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="flex-button-hdn">
            <!-- <div>
                <a href="#" class="btn btn-primary pull-right">Back</a>
            </div> -->
            <div class="header-left ">
                        <p>
                            <a href="{{route('admin.addProduct')}}" class="btn btn-primary pull-right">Add Product</a>
                        </p>
                    </div>
        </div>
       
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
         
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-12 col-xlg-9 col-md-12">
               
                <form method="POST" action="#">
                    @csrf
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Supplier</label>
                                                <div class="col-md-12 border-bottom p-0">
                                                <select class="disb form-select shadow-none p-0 border-0" name="supplier" id="thay-doi-dgn">
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
                                        <div class="form-group mb-4">
                                            <label class="col-md-4 p-0">Product</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <select class="disb form-select shadow-none p-0 border-0" name="sku" id="thay-doi-dgn">
                                                    @foreach($Pro as $pro)
                                                    <option value="{{$pro->id}}">{{$pro->sku}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>     
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label class="col-md-4 p-0">Price</label>
                                            <div class="col-md-0 border-bottom p-0">
                                                <input type="number" placeholder=" " name="price" id="ajax-nhapsoluong"
                                                    class="form-control p-0 border-1"> </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group mb-4">
                                            <label class="col-md-4 p-0">Quantily</label>
                                            <div class="col-md-0 border-bottom p-0">
                                                <input type="number" placeholder=" " name="amount" id="ajax-nhapsoluong"
                                                    class="form-control p-0 border-1"> </div>
                                        </div>
                                    </div>
                                    <p id="idcthdne" style="display: none"></p>
                                    <div class="col" style="flex: 0 0 0%">
                                        <button type="submit" id="form-add-cthd" class="btn btn-success">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>    
                </form>
            </div>
            <!-- Column -->
            <p class="badge bg-primary text-wrap font-weight fontdetail">Invoice details</p>
            <table id="123cthdne" class="table text-nowrap" style="background-color: #fbfafa">
                <thead>
                    <tr>
                        <th class="border-top-0">Product</th>
                        <th class="border-top-0">Price</th>
                        <th class="border-top-0">Quantily</th>
                        <th class="border-top-0">Status</th>
                    </tr>
                </thead>
            </table>
        </div>

        <a class="btn btn-success" data-url="{{route('admin.handleAddIInvoices')}}" id="hdn" href="#">
            
        Success</a>

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
    var tableID ="123cthdne";
    function deleteRow(currentRow) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for (var i = 0; i < rowCount; i++) {
                var row = table.rows[i];
                /*var chkbox = row.cells[0].childNodes[0];*/
                /*if (null != chkbox && true == chkbox.checked)*/
                
        if (row==currentRow.parentNode.parentNode) {
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
   
    
    $("#hdn").click(function(event){
    //     alert("Mess");
        var url = $(this).attr('data-url');
      let tennhacungcap = $("select[name=supplier]").val();
      let taikhoan_id = $("select[name=sku]").val();
      let _token   = $('meta[name="csrf-token"]').attr('content');
       var hoadonnhap_id = $('#idcthdne').html();
      
      $.ajax({
        url: url,
        type:"POST",
        data:{
            supplier:tennhacungcap,
            _token: _token
        },
        success:function(response){
          console.log(response);
          if(response) {
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
        success:function(){
            laydulieu();
        },
        error: function(error) {
            alert('Please enter enough information');
        }
       });
    });
    $("#form-add-cthd").click(function(event){
        
        event.preventDefault();
        var url = $(this).attr('data-url-ctsp');
        let soluong = $("input[name=amount]").val();
        let gia = $("input[name=price]").val();
        let sanpham_id = $("select[name=sku]").val();
        var hoadonnhap_id = $('#idcthdne').html();
        
        let _token   = $('meta[name="csrf-token"]').attr('content');
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
            cell5.innerHTML = "<button onclick='deleteRow(this)' type='button' class='btn btn-danger btn-delete'>Delete</button>";
        }
        $.ajax({
        success:function(){
            themmoichitiethoadon();
            
        },
        error: function(error) {
            alert('Please enter enough information');
        }
       });
    });
    function laydulieu() {
        // Text lấy dữ liệu
        //gets table
        var oTable = document.getElementById('123cthdne');
        //gets rows of table
        var rowLength = oTable.rows.length;
        //loops through rows    
        for (i = 0; i < rowLength; i++){
            //gets cells of current row  
            var oCells = oTable.rows.item(i+1).cells;
            //gets amount of cells of current row
            var cellLength = oCells.length;
            var cellVal1 = oCells.item(2).innerHTML;
            var cellVal2 = oCells.item(3).innerHTML;
            alert(oCells.item(3).innerHTML);
            //loops through each cell in current row
            for(var j = 0; j < rowLength-rowLength+1; j++){
                // get your cell info here
                // var cellVal = oCells.item(j).innerHTML;
                // var cellVal1 = oCells.item(2).innerHTML;
                var dongianhap = $('#idcthdne').html();
                let sanpham_id = oCells.item(0).innerHTML;
                let gia = oCells.item(1).innerHTML;
                let soluong = oCells.item(2).innerHTML;
                var hoadonnhap_id = dongianhap;
                let _token   = $('meta[name="csrf-token"]').attr('content');
            
                
                
                $.ajax({
                    url: '/admin/input-invoice/handle/',
                    type:"POST",
                    data:{
                        amount:soluong,
                        price:gia,
                        import_invoice:hoadonnhap_id,
                        product:sanpham_id,
                        _token: _token
                    },
                    success:function(response){
                    console.log(response);
                    if(response) {
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