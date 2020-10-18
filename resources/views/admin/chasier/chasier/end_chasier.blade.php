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
                        <h1 align="center">Chasier Information</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div align="center" class="col-md-12 table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">kind</th>
                                    <th class="center">count all</th>
                                    <th class="center">count done</th>
                                    <th class="center">count visa</th>
                                    <th class="center">count Cash</th>
                                    <th class="center">count discarded</th>
                                    <th class="center">total all</th>
                                    <th class="center">total done</th>
                                    <th class="center">total visa</th>
                                    <th class="center">total Cash</th>
                                    <th class="center">total discarded</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="center">all</td>
                                    <td class="center">{{$total_count_e_d}}</td>
                                    <td class="center">{{$total_count_e}}</td>
                                    <td class="center">{{$total_count_e_v}}</td>
                                    <td class="center">{{ $total_count_e_c}}</td>
                                    <td class="center"> {{$total_count_d  }}</td>
                                    <td class="center"> {{$total_e - $total_d }}</td>
                                    <td class="center"> {{$total_e }}</td>
                                    <td class="center">{{ $total_e_v }}</td>
                                    <td class="center">{{ $total_e_c }}</td>
                                    <td class="center">{{ $total_d }}</td>
                                </tr>
                                <tr>
                                    <td class="center">laser</td>
                                    <td class="center">{{$laser_e + $laser_d}}</td>
                                    <td class="center">{{$laser_e}}</td>
                                    <td class="center">{{$laser_e_v}}</td>
                                    <td class="center">{{ $laser_e_c}}</td>
                                    <td class="center"> {{$laser_d  }}</td>
                                    <td class="center"> {{$total_laser_e - $total_laser_d }}</td>
                                    <td class="center"> {{$total_laser_e }}</td>
                                    <td class="center">{{ $total_laser_e_v }}</td>
                                    <td class="center">{{ $total_laser_e_c }}</td>
                                    <td class="center">{{ $total_laser_d }}</td>
                                </tr>
                                <tr>
                                    <td class="center">print</td>
                                    <td class="center">{{$print_e + $print_d}}</td>
                                    <td class="center">{{$print_e}}</td>
                                    <td class="center">{{$print_e_v}}</td>
                                    <td class="center">{{ $print_e_c}}</td>
                                    <td class="center"> {{$print_d  }}</td>
                                    <td class="center"> {{$total_print_e - $total_print_d }}</td>
                                    <td class="center"> {{$total_print_e }}</td>
                                    <td class="center">{{ $total_print_e_v }}</td>
                                    <td class="center">{{ $total_print_e_c }}</td>
                                    <td class="center">{{ $total_print_d }}</td>
                                </tr>
                                <tr>
                                    <td class="center">material</td>
                                    <td class="center">{{$type_e + $type_d}}</td>
                                    <td class="center">{{$type_e}}</td>
                                    <td class="center">{{$type_e_v}}</td>
                                    <td class="center">{{ $type_e_c}}</td>
                                    <td class="center"> {{$type_d  }}</td>
                                    <td class="center"> {{$total_type_e - $total_type_d }}</td>
                                    <td class="center"> {{$total_type_e }}</td>
                                    <td class="center">{{ $total_type_e_v }}</td>
                                    <td class="center">{{ $total_type_e_c }}</td>
                                    <td class="center">{{ $total_type_d }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <form autocomplete="off" action="{{url('admin/chasier/end/finish')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group">
                                     total in chasier before <input type="text" value="{{$chasier}}"
                                                         class="form-control" disabled name="chasier"
                                                         placeholder="Enter You total cost">
                                </div>
                                    <div class="form-group{{ $errors->has('total_chasier') ? ' has-error' : "" }}">
                                        total chasier done <input type="text" value="{{$total_e - $total_d-$total_e_v}}"
                                                      class="form-control" disabled name="total_chasier"
                                                      placeholder="Enter You total cost">
                                    </div>
                                <div class="form-group{{ $errors->has('chasier_now') ? ' has-error' : "" }}">
                                    now <input type="text" value="{{($total_e - $total_d-$total_e_v)+$chasier+$total_input-$total_out}}"
                                                              class="form-control"  name="chasier_now"
                                                              placeholder="Enter You total cost" disabled>

                                </div>
                                <div class="form-group{{ $errors->has('chasier_now') ? ' has-error' : "" }}" hidden>
                                    now <input type="text" value="{{($total_e - $total_d-$total_e_v)+$chasier+$total_input-$total_out}}"
                                               class="form-control"  name="chasier_now"
                                               placeholder="Enter You total cost" >

                                </div>
                                <div class="form-group{{ $errors->has('input') ? ' has-error' : "" }}">
                                    user transaction input <input type="text" value="{{$total_input}}"
                                               class="form-control" disabled name="input"
                                               placeholder="Enter You total cost">
                                </div>
                                <div class="form-group{{ $errors->has('out') ? ' has-error' : "" }}">
                                    user transaction out <input type="text" value="{{$total_out}}"
                                                                  class="form-control" disabled name="out"
                                                                  placeholder="Enter You total cost">
                                </div>
                            <div class="form-group{{ $errors->has('stay_chasier') ? ' has-error' : "" }}">
                                total stay in chasier <input type="text" value="{{Request::old('stay_chasier')}}"
                                                     class="form-control" name="stay_chasier"
                                                     placeholder="Enter You total cost">
                            </div>
                                <button type="submit"  value="end">end</button>
                            </form>
                        </div>
                        <br>
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