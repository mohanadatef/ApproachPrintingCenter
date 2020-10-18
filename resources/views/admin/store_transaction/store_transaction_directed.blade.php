<!DOCTYPE html>
<html>
<head>
    @include('includes.admin.header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('includes.admin.main-header')
    @include('includes.admin.main-sidebar')
    <div class="content-wrapper">
        @include('includes.admin.error')
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-11">
                        <h1 align="center">Store Transaction</h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($store_transaction) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">Kind</th>
                                    <th class="center">Size</th>
                                    <th class="center">Material</th>
                                    <th class="center">Quantity Before</th>
                                    <th class="center">Quantity After</th>
                                    <th class="center">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($store_transaction as $store_transactions)
                                    <tr>
                                        @if( $store_transactions->kind == 1)
                                        <td class="center">enter</td>
                                            @elseif( $store_transactions->kind == 2)
                                                <td class="center">directed</td>
                                        @endif
                                        <td class="center">{{ $store_transactions->store->size->name }}</td>
                                        <td class="center">{{ $store_transactions->store->type->name }}</td>
                                        <td class="center">{{ $store_transactions->quantity_before }}</td>
                                        <td class="center">{{ $store_transactions->quantity_after }}</td>
                                        <td class="center">{{ $store_transactions->price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $store_transaction->links() }}
                        </div>
                    @else
                        <div class="empty" align="center">There is no Store Transaction to show</div>
                    @endif
                </div>
                </div>
                </div>
            </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')
</div>
</body>
</html>