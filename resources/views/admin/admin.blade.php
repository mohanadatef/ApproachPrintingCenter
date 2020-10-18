<!DOCTYPE html>
<html>
<head>
    @include('includes.admin.header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('includes.admin.main-header')
    @include('includes.admin.main-sidebar')
    @include('includes.admin.contect')
    @include('includes.admin.footer')
</div>
{{--<!-- ./wrapper -->
<div class="modal modal-danger fade" id="laser1" tabindex="-1" role="dialog" aria-labelledby="laser1Title"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Print</h4>
            </div>
            <form action="{{url('/laser/bills/'.$id)}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <p>Do you print Bill for laser order</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline">Print</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>--}}
@if(strpos(Request::url(), 'laser/bills'))
    <script>
        window.open('{{url('print/laser/bills/'.$id)}}');
    </script>
@elseif(strpos(Request::url(), 'print/bills'))
    <script>
        window.open('{{url('print/print/bills/'.$id)}}');
    </script>
@elseif (strpos(Request::url(), 'material/bills'))
    <script>
        window.open('{{url('print/material/bills/'.$id)}}');
    </script>
@endif



@include('includes.admin.scripts')
</body>
</html>
