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
                        <h1 align="center">Print Price</h1>
                    </div>
                    @permission('print-price-create')
                    <div class="col-md-1" align="center">
                        <a href="{{  url('/admin/print_price/create') }}" class="btn btn-sm btn-primary">Add</a>
                    </div>
                    <br>
                    @endpermission
                </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($print_price) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">size</th>
                                    <th class="center">material</th>
                                    <th class="center">machine</th>
                                    <th class="center">color</th>
                                    <th class="center">price</th>
                                    <th class="center">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($print_price as $print_prices)
                                    <tr>
                                        <td class="center">{{ $print_prices->size->name }}</td>
                                        <td class="center">{{ $print_prices->type->name }}</td>
                                        <td class="center">{{ $print_prices->machine->name }}</td>
                                        <td class="center">{{ $print_prices->color->name }}</td>
                                        <td class="center">{{ $print_prices->price }}</td>
                                        <td class="center">
                                            @permission('print-price-edit')
                                            <a href="{{ url('/admin/print_price/edit/'.$print_prices->id)}}"><i class="ace-icon fa fa-edit bigger-120  edit" data-id="">edit</i></a>
                                            @endpermission
                                            @permission('print-price-delete')
                                            <a href="{{ url('/admin/print_price/delete/'.$print_prices->id)}}"><i class="ace-icon fa fa-edit bigger-120  delete" style="color: red" data-id="">delete</i></a>
                                            @endpermission
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $print_price->links() }}
                        </div>
                    @else
                        <div class="empty" align="center">There is no Print Price to show</div>
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