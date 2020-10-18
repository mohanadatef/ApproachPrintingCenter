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
                        <h1 align="center">Customer Wallet</h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($wallet) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">User Name</th>
                                    <th class="center">Customer Name</th>
                                    <th class="center">phone</th>
                                    <th class="center">wallet before</th>
                                    <th class="center">wallet after</th>
                                    <th class="center">total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wallet as $wallets)
                                    <tr>
                                        <td class="center">{{ $wallets->user->name }}</td>
                                        <td class="center">{{ $wallets->customer->name }}</td>
                                        <td class="center">{{ $wallets->customer->phone }}</td>
                                        <td class="center">{{ $wallets->wallet_before }}</td>
                                        <td class="center">{{ $wallets->wallet_after }}</td>
                                        <td class="center">{{ $wallets->total }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $wallet->links() }}
                        </div>
                    @else
                        <div class="empty" align="center">There is no Customer to show</div>
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