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
                        <h1 align="center">Chasier Transaction</h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($chasier_transaction) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">total chasier before</th>
                                    <th class="center">total bank</th>
                                    <th class="center">total chasier after</th>
                                    <th class="center">user end</th>
                                    <th class="center">time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chasier_transaction as $chasier_transactions)
                                    <tr>
                                        <td class="center">{{ $chasier_transactions->total_chasier_before }}</td>
                                        <td class="center">{{ $chasier_transactions->total_bank }}</td>
                                        <td class="center">{{ $chasier_transactions->total_chasier_after }}</td>
                                        <td class="center">{{ $chasier_transactions->user->name }}</td>
                                        <td class="center">{{ $chasier_transactions->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $chasier_transaction->links() }}
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