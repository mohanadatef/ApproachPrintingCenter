<div class="row">
    @permission('core-data-list')
    @permission('size-show')
    <div class="col-md-4">
        <a href="{{ url('admin/size') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Size</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('type-show')
    <div class="col-md-4">
        <a href="{{ url('admin/material') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All material</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('machine-show')
    <div class="col-md-4">
        <a href="{{ url('admin/machine') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All machine</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('color-show')
    <div class="col-md-4">
        <a href="{{ url('admin/color') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All color</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @permission('store-list')
    @permission('store-show')
    <div class="col-md-4">
        <a href="{{ url('admin/store') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All store</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('store-transaction-show')
    @permission('store-transaction-enter-show')
    <div class="col-md-4">
        <a href="{{ url('admin/store_transaction') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>Store transaction</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('store-transaction-enter-show')
    <div class="col-md-4">
        <a href="{{ url('admin/store_transaction/enter') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>Store transaction enter</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('store-transaction-directed-show')
    <div class="col-md-4">
        <a href="{{ url('admin/store_transaction/directed') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>Store transaction directed</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @permission('print-price-show')
    <div class="col-md-4">
        <a href="{{ url('admin/print_price') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>Prices for print</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('import-price-create')
    <div class="col-md-4">
        <a href="{{ url('admin/store/import/price') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>Import Store Price</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @permission('order-list')
    @permission('customer-show')
    <div class="col-md-4">
        <a href="{{ url('admin/customer') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Customer</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('customer-create')
    <div class="col-md-4">
        <a href="{{ url('admin/order/customer/create') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>Add Customer</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('order-start-customer')
    <div class="col-md-4">
        <a href="{{ url('admin/order/start/customer') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>Search for Order Customer</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('order-start')
    <div class="col-md-4">
        <a href="{{ url('admin/order/start') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>Start Order</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('order-work-index')
    <div class="col-md-4">
        <a href="{{ url('admin/order/work') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order work</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('order-finish-index-all')
    <div class="col-md-4">
        <a href="{{ url('admin/order/finish/index') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Finish</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('order-finish-index-day')
    <div class="col-md-4">
        <a href="{{ url('admin/order/finish/time') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Finish</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @permission('laser-list')
    @permission('laser-show')
    <div class="col-md-4">
        <a href="{{ url('admin/order/laser') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Laser</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('laser-work')
    <div class="col-md-4">
        <a href="{{ url('admin/order/laser/work') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Laser work</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('laser-finish-problem')
    <div class="col-md-4">
        <a href="{{ url('admin/order/laser/finish/problem') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Laser Problem</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('laser-finish-index')
    <div class="col-md-4">
        <a href="{{ url('admin/order/laser/finish/index') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Laser Finish</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('laser-finish-index-day')
    <div class="col-md-4">
        <a href="{{ url('admin/order/laser/finish/time') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Laser time</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @permission('print-list')
    @permission('print-show')
    @foreach($machine as $mymachine)
        @permission('print-show')
    <div class="col-md-4">
        <a href="{{ url('admin/order/print/index/machine/'.$mymachine->id) }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Print List {{$mymachine->name}}</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
        @permission('print-finish-index')
        <div class="col-md-4">
            <a href="{{ url('admin/order/print/finish/index/machine/'.$mymachine->id) }}">
                <div class="small-box bg-red">
                    <div class="inner" align="center">
                        <p>All Order Print Finish {{$mymachine->name}}</p>
                    </div>
                </div>
            </a>
        </div>
        @endpermission
        @permission('print-finish-index-day')
        <div class="col-md-4">
            <a href="{{ url('admin/order/print/finish/time/machine/'.$mymachine->id) }}">
                <div class="small-box bg-red">
                    <div class="inner" align="center">
                        <p>All Order Print Time {{$mymachine->name}}</p>
                    </div>
                </div>
            </a>
        </div>
        @endpermission
    @endforeach
    @endpermission
    @permission('print-all')
    @permission('print-work')
    <div class="col-md-4">
        <a href="{{ url('admin/order/print/work') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Print work</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('print-finish-index-all')
    <div class="col-md-4">
        <a href="{{ url('admin/order/print/finish/index') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Print Finish</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('print-finish-index-all-day')
    <div class="col-md-4">
        <a href="{{ url('admin/order/print/finish/index') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Print Time</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @permission('type-list')
    @permission('type-finish-index')
    <div class="col-md-4">
        <a href="{{ url('admin/order/material/finish/index') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order material Finish</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('type-finish-index-day')
    <div class="col-md-4">
        <a href="{{ url('admin/order/material/finish/time') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order material Time</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @endpermission
    @permission('chasier-list')
    @permission('chasier-list-laser')
    @permission('chasier-laser-index')
    <div class="col-md-4">
        <a href="{{ url('admin/chasier/laser/index') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Laser List</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('chasier-laser-index-pay')
    <div class="col-md-4">
        <a href="{{ url('admin/chasier/laser/index/pay') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Laser before</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @permission('chasier-list-print')
    @permission('chasier-print-index')
    <div class="col-md-4">
        <a href="{{ url('admin/chasier/print/index') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Print List</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('chasier-print-index-pay')
    <div class="col-md-4">
        <a href="{{ url('admin/chasier/print/index/pay') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Print before</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @permission('chasier-list-type')
    @permission('chasier-type-index')
    <div class="col-md-4">
        <a href="{{ url('admin/chasier/material/index') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Print List</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('chasier-type-index-pay')
    <div class="col-md-4">
        <a href="{{ url('admin/chasier/material/index/pay') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Order Print before</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @permission('chasier-list-customer')
    @permission('chasier-start-customer')
    <div class="col-md-4">
        <a href="{{ url('admin/chasier/start') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>Search For Customer</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @endpermission
    @permission('user-list')
    @permission('user-show')
    <div class="col-md-4">
        <a href="{{ url('admin/user') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All User</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('customer-list')
    @permission('customer-show')
    <div class="col-md-4">
        <a href="{{ url('admin/customer') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Customer</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('customer-wallet')
    <div class="col-md-4">
        <a href="{{ url('admin/customer/wallet') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All wallet transaction</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
    @permission('role-show')
    <div class="col-md-4">
        <a href="{{ url('admin/role') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Role</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('permission-show')
    <div class="col-md-4">
        <a href="{{ url('admin/permission') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Permission</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @permission('log-show')
    <div class="col-md-4">
        <a href="{{ url('admin/log') }}">
            <div class="small-box bg-red">
                <div class="inner" align="center">
                    <p>All Log</p>
                </div>
            </div>
        </a>
    </div>
    @endpermission
    @endpermission
</div>
@yield('header-contect')