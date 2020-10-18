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
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-11">
                        <h1 align="center">Information Customer wallet</h1>
                    </div>
                    <br>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if(count($transfer) > 0)
                            <div align="center" class="col-md-12 table-responsive">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">customer name</th>
                                        <th class="center">wallet_before</th>
                                        <th class="center">wallet_after</th>
                                        <th class="center">total</th>
                                        <th class="center">user</th>
                                        <th class="center">time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transfer as $chasier_transactions)
                                        <tr>
                                            <td class="center">{{ $chasier_transactions->customer->name }}</td>
                                            <td class="center">{{ $chasier_transactions->wallet_before }}</td>
                                            <td class="center">{{ $chasier_transactions->wallet_after }}</td>
                                            <td class="center">{{ $chasier_transactions->total }}</td>
                                            <td class="center">{{ $chasier_transactions->user->name }}</td>
                                            <td class="center">{{ $chasier_transactions->created_at }}</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $transfer->links() }}
                            </div>
                        @else
                            <div class="empty" align="center">There is no Chasier Transaction to show</div>
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