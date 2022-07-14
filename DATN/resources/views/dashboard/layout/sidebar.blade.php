<!--**********************************
            Sidebar start
        ***********************************-->

<div class="nk-sidebar" >
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu" >
            <li class="nav-label" >Sale Dashboard</li>
            <li style="background-color:#EAF6F6">
                <a href="{{route('admin.sale')}}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
               
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-layers menu-icon"></i><span class="nav-text">Order Management</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('sale.order')}}">Order ({{$order}})</a></li>
                    <li><a href="{{route('sale.ordertracking')}}">Order Tracking ({{$tracking}})</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->