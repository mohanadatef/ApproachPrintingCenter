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
                        <h1 align="center">system Wallet</h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    @if($wallet_to_customer > 0)
                        <h1 class="empty" align="center" style="color: green">There is  Customer have wallet = {{$wallet_to_customer}}</h1>
                    @else
                        <div class="empty" align="center">There is  Customer have wallet = 0</div>
                    @endif
              <br>
                    @if($wallet_to_system < 0)
                        <h1 class="empty" align="center" style="color: red">There is not have wallet = {{$wallet_to_system}}</h1>
                    @else
                        <div class="empty" align="center">There is not have wallet = 0</div>
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