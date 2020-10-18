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
                        <h1 align="center">Order Print {{$machine->name}}  Finish</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form autocomplete="off" action="{{url('/admin/order/print/finish/day/machine/'.$machine->id)}}" method="get">
                          <div align="center">
                            start: <input type="date" name="start">
                            end: <input type="date" name="end">
                              <button  type="submit" name="action" value="time" >search</button>
                              <button   type="submit" name="action" value="export">export</button>
                          </div>
                        </form>
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