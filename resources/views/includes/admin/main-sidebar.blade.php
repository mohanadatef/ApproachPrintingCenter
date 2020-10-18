<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Left side column. contains the logo and sidebar -->
        <ul class="sidebar-menu" data-widget="tree">
            @permission('dashboard-show')
            <li><a href="{{ url('admin') }}"><i class="fa fa-circle-o"></i>
                    <span>dashboard</span></a></li>
            @endpermission
            @permission('core-data-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Data</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @permission('size-show')
                    <li><a href="{{ url('admin/size') }}"><i class="fa fa-circle-o"></i>
                            <span>Size</span></a></li>
                    @endpermission
                    @permission('type-show')
                    <li><a href="{{ url('admin/material') }}"><i class="fa fa-circle-o"></i>
                            <span>Material</span></a></li>
                    @endpermission
                    @permission('machine-show')
                    <li><a href="{{ url('admin/machine') }}"><i class="fa fa-circle-o"></i>
                            <span>Machine</span></a></li>
                    @endpermission
                    @permission('color-show')
                    <li><a href="{{ url('admin/color') }}"><i class="fa fa-circle-o"></i>
                            <span>Color</span></a></li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('store-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Store</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @permission('store-show')
                    <li><a href="{{ url('admin/store') }}"><i class="fa fa-circle-o"></i>
                            <span>Store</span></a></li>
                    @endpermission
                  {{--  @permission('store-show')
                    <li><a href="{{ url('admin/store/problem') }}"><i class="fa fa-circle-o"></i>
                            <span>Store problem</span></a></li>
                    @endpermission--}}
                    @permission('store-transaction-show')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Store transaction</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('store-transaction-enter-show')
                            <li><a href="{{ url('admin/store_transaction') }}"><i class="fa fa-circle-o"></i>
                                    <span>Store transaction all</span></a></li>
                            @endpermission
                            @permission('store-transaction-enter-show')
                            <li><a href="{{ url('admin/store_transaction/enter') }}"><i class="fa fa-circle-o"></i>
                                    <span>Store transaction enter</span></a></li>
                            @endpermission
                            @permission('store-transaction-directed-show')
                            <li><a href="{{ url('admin/store_transaction/directed') }}"><i class="fa fa-circle-o"></i>
                                    <span>Store transaction sold out</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('print-price-show')
                    <li><a href="{{ url('admin/print_price') }}"><i class="fa fa-circle-o"></i>
                            <span>Prices for print</span></a></li>
                    @endpermission
                    @permission('import-price-create')
                    <li><a href="{{ url('admin/store/import/price')}}"><i class="fa fa-circle-o"></i>Import Store Price</a></li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('order-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Order</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @permission('customer-show')
                    <li><a href="{{ url('/admin/customer') }}"><i class="fa fa-group"></i><span>All Customer</span></a>
                    </li>
                    @endpermission
                    @permission('customer-create')
                    <li><a href="{{ url('/admin/order/customer/create') }}"><i class="fa fa-group"></i><span>Add Customer</span></a>
                    </li>
                    @endpermission
                    @permission('order-start-customer')
                    <li><a href="{{ url('/admin/order/start/customer') }}"><i class="fa fa-group"></i><span>Search for Order Customer</span></a>
                    </li>
                    @endpermission
                    @permission('order-start')
                    <li><a href="{{ url('admin/order/start') }}"><i class="fa fa-circle-o"></i>
                            <span>Start Order</span></a></li>
                    @endpermission
                    @permission('order-work-index')
                    <li><a href="{{ url('admin/order/work') }}"><i class="fa fa-circle-o"></i>
                            <span>All Order work</span></a></li>
                    @endpermission
                    @permission('order-finish-index-all')
                    <li><a href="{{ url('admin/order/finish/index') }}"><i class="fa fa-circle-o"></i>
                            <span>All Order Finish</span></a></li>
                    @endpermission
                    @permission('order-finish-index-day')
                    <li><a href="{{ url('admin/order/finish/time') }}"><i class="fa fa-circle-o"></i>
                            <span>All Order For time</span></a></li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('laser-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Laser</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @permission('laser-show')
                    <li><a href="{{ url('admin/order/laser') }}"><i class="fa fa-circle-o"></i>
                            <span>All Order Laser</span></a></li>
                    @endpermission
                    @permission('laser-work')
                    <li><a href="{{ url('admin/order/laser/work') }}"><i class="fa fa-circle-o"></i>
                            <span>All Order Laser work</span></a></li>
                    @endpermission
                    @permission('laser-finish-problem')
                    <li><a href="{{ url('admin/order/laser/finish/problem') }}"><i class="fa fa-circle-o"></i>
                            <span>All Order Laser Problem</span></a></li>
                    @endpermission
                    @permission('laser-finish-index')
                    <li><a href="{{ url('admin/order/laser/finish/index') }}"><i class="fa fa-circle-o"></i>
                            <span>All Order Laser Finish</span></a></li>
                    @endpermission
                    @permission('laser-finish-index-day')
                    <li><a href="{{ url('admin/order/laser/finish/time') }}"><i class="fa fa-circle-o"></i>
                            <span>All Order Laser time</span></a></li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('print-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Print</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @permission('print-show')
                    @foreach($machine as $mymachine)
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>{{$mymachine->name}}</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('print-show')
                            <li><a href="{{ url('admin/order/print/index/machine/'.$mymachine->id ) }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Print List {{$mymachine->name}}</span></a></li>
                            @endpermission
                            @permission('print-finish-index')
                            <li><a href="{{ url('admin/order/print/finish/index/machine/'.$mymachine->id) }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Print Finish {{$mymachine->name}}</span></a></li>
                            @endpermission
                            @permission('print-finish-index-day')
                            <li><a href="{{ url('admin/order/print/finish/time/machine/'.$mymachine->id) }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Print Time {{$mymachine->name}}</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endforeach
                    @endpermission
                    @permission('print-all')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>All Print</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('print-work')
                            <li><a href="{{ url('admin/order/print/work') }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Print work </span></a></li>
                            @endpermission
                            @permission('print-finish-index-all')
                            <li><a href="{{ url('admin/order/print/finish/index') }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Print Finish</span></a></li>
                            @endpermission
                            @permission('print-finish-index-all-day')
                            <li><a href="{{ url('admin/order/print/finish/time') }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Print Time</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('type-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Material</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @permission('type-finish-index')
                    <li><a href="{{ url('admin/order/material/finish/index') }}"><i class="fa fa-circle-o"></i>
                            <span>All Order material Finish</span></a></li>
                    @endpermission
                    @permission('type-finish-index-day')
                    <li><a href="{{ url('admin/order/material/finish/time') }}"><i class="fa fa-circle-o"></i>
                            <span>All Order material Time</span></a></li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('chasier-list')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Chasier</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @permission('chasier-list-laser')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Chasier Laser</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('chasier-laser-index')
                            <li><a href="{{ url('admin/chasier/laser/index') }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Laser List</span></a></li>
                            @endpermission
                            @permission('chasier-laser-index-pay')
                            <li><a href="{{ url('admin/chasier/laser/index/pay') }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Laser before</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('chasier-list-print')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Chasier Print</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('chasier-print-index')
                            <li><a href="{{ url('admin/chasier/print/index') }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Print List</span></a></li>
                            @endpermission
                            @permission('chasier-print-index-pay')
                            <li><a href="{{ url('admin/chasier/print/index/pay') }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Print before</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('chasier-list-type')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Chasier Material</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('chasier-type-index')
                            <li><a href="{{ url('admin/chasier/material/index') }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Material List</span></a></li>
                            @endpermission
                            @permission('chasier-type-index-pay')
                            <li><a href="{{ url('admin/chasier/material/index/pay') }}"><i class="fa fa-circle-o"></i>
                                    <span>All Order Material before</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('chasier-list-customer')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Chasier Customer</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('chasier-start-customer')
                            <li><a href="{{ url('/admin/chasier/start') }}"><i class="fa fa-circle-o"></i>
                                    <span>Search For Customer</span></a></li>
                            @endpermission
                            @permission('chasier-wallet-customer')
                            <li><a href="{{ url('/admin/chasier/wallet') }}"><i class="fa fa-circle-o"></i>
                                    <span>Search For Customer Wallet</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('chasier-transaction')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Chasier transaction</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('chasier-transaction-show')
                            <li><a href="{{ url('/admin/chasier_transaction') }}"><i class="fa fa-circle-o"></i>
                                    <span>transaction</span></a></li>
                            @endpermission
                            @permission('chasier-end')
                            <li><a href="{{ url('/admin/chasier/end') }}"><i class="fa fa-circle-o"></i>
                                    <span>end day</span></a></li>
                            @endpermission
                            @permission('user-transaction')
                            <li><a href="{{ url('/admin/user_transaction/') }}"><i class="fa fa-circle-o"></i>
                                    <span>user transaction</span></a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('user-list')
            <li class="treeview">
                <a href="#"><i class="fa fa-group"></i> <span>User</span><span class="pull-right-container"><i
                                class="fa fa-angle-right pull-left"></i></span></a>
                <ul class="treeview-menu">
                    @permission('user-show')
                    <li><a href="{{ url('/admin/user') }}"><i class="fa fa-group"></i><span>All User</span></a>
                    </li>
                    @endpermission

                    @permission('customer-list')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-circle-o"></i> <span>Customer</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            @permission('customer-show')
                            <li><a href="{{ url('/admin/customer') }}"><i class="fa fa-group"></i><span>All Customer</span></a>
                            </li>
                            @endpermission
                            @permission('customer-wallet')
                            <li><a href="{{ url('/admin/customer/wallet') }}"><i class="fa fa-group"></i><span>All wallet transaction</span></a>
                            </li>
                            @endpermission
                            @permission('import-customer-create')
                            <li><a href="{{ url('admin/import/customer')}}"><i class="fa fa-circle-o"></i>Import Customer</a></li>
                            @endpermission
                            @permission('wallet-system')
                            <li><a href="{{ url('admin/wallet_system')}}"><i class="fa fa-circle-o"></i>Wallet System</a></li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('role-show')
                    <li><a href="{{ url('/admin/role') }}"><i class="fa fa-at"></i><span>All Role</span></a>
                    </li>
                    @endpermission

                            @permission('permission-show')
                            <li><a href="{{ url('/admin/permission') }}"><i class="fa fa-group"></i><span>All Permission</span></a>
                            </li>
                            @endpermission

                    @permission('log-show')
                    <li><a href="{{ url('admin/log') }}"><i class="fa fa-circle-o"></i>Log</a></li>
                    @endpermission
                    <li><a href="{{ url('/clear-cache') }}"><i class="fa fa-circle-o"></i>clear cache</a></li>
                </ul>
            </li>
            @endpermission
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@yield('main-sidebar')
