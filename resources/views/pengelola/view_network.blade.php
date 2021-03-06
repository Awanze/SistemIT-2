<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support | View Data Network</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('/lte/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('/lte/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout/header')

        @include('layout/sidebar')
        <!-- /.sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="nav-icon fas fa-edit"></i>&nbsp;View Data Network</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">View Data Network</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{route('network.print',[ 'id_net'=>$networks->id_net])}}"><button type="button"
                                    class="btn btn-warning float-right" title="Print Data">
                                    <i  class="nav-icon fas fa-file">&nbsp;Print Data</i></button></a>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Informasi Pemasangan Jaringan</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Input_Network" hidden>ID Data Network</label>
                                                    <input type="text" id="id_net" name="id_net" class="form-control"
                                                        value="{{ $networks->id_net}}" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Input_Network">Permintaan Pemasangan</label>
                                                    <input type="text" id="r_net" name="r_net" class="form-control"
                                                        value="{{ $networks->r_net}}" placeholder="Masukan Permintaan"
                                                        required="required" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-5">
                                             <div class="form-group">
                                                 <label for="Input_Company">Perusahaan Client</label>
                                                 <select class="form-control" id="i_company" name="i_company"
                                                     required="required" value="{{ $networks->i_company}}" disabled>
                                                     <option selected disabled></option>
                                                     @foreach ($client as $clien)
                                                     <option value="{{ $clien->id_client }}"
                                                         {{($clien->id_client == $networks->i_company) ? 'selected' : ''}}>
                                                         {{$clien->nama_client}}</option>
                                                     @endforeach
                                                 </select>
                                                 </select>
                                             </div>
                                         </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Input_Lead">Nama Staff Client</label>
                                                    <input type="text" id="i_Leader" name="i_Leader"
                                                        class="form-control" required="required"
                                                        onkeypress="return event.charCode < 48 || event.charCode  >57"
                                                        placeholder="Masukan Nama Staff"
                                                        value="{{ $networks->i_Leader}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="Input_Lead">IT Support</label>
                                                 <select class="form-control" value="{{ old('n_its') }}" id="n_its" name="n_its"
                                                 required="required" disabled>
                                                 <option selected disabled> --Pilih IT Support-- </option>
                                                 @foreach ($its as $it)
                                                     <option value="{{ $it->id_its }}"
                                                         {{($it->id_its == $networks->n_its) ? 'selected' : ''}}>
                                                         {{$it->nama_its}}</option>
                                                     @endforeach
                                             </select>
                                             </div>
                                         </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="inputEstimatedDuration">Tgl Mulai Pemasangan</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control float-right"
                                                            id="reservation" name="tgl_mpemasangan" required="required"
                                                            value="{{ $networks->tgl_mpemasangan}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="inputEstimatedDuration">Tgl Selesai Pemasangan</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control float-right"
                                                            id="reservation1" name="tgl_apemasangan" required="required"
                                                            value="{{ $networks->tgl_apemasangan}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">List Detail Pemasangan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered" id="dynamicAddRemove">
                                            <thead>
                                                <th>Detail Pemasangan</th>
                                                <th>Jumlah Pemasangan</th>
                                                <td>Letak Pemasangan</td>
                                                <th>Status</th>
                                                <th>Progress</th>
                                            </thead>
                                            <tbody>
                                                @forelse ($dnetworks as $item)
                                            <tr>
                                                <td><input type="text" name="d_net[]" id="d_net"
                                                        placeholder="Masukan Detail Masalah/Request"
                                                        class="form-control" value="{{$item->d_net}}" required disabled/>
                                                </td>
                                                <td><input type="number" onkeypress="return isNumberKey(evt)"
                                                        id="j_pemasangan" name="j_pemasangan[]" class="form-control"
                                                        value="{{$item->j_pemasangan}}" required="required" disabled>
                                                </td>
                                                <td><input type="text" name="l_pemasangan[]" id="l_pemasangan"
                                                        placeholder="Masukan Letak Pemasangan" class="form-control"
                                                        value="{{$item->l_pemasangan}}" required="required" disabled/>
                                                </td>
                                                <td><select class="form-control" id="i_nstatus" name="i_nstatus[]"
                                                        required="required" disabled>
                                                        <option selected disabled> --Pilih Status-- </option>
                                                        @foreach ($status as $stat)
                                                        <option value="{{ $stat->id_status }}" @if($stat->id_status == $item->i_nstatus) selected @endif >{{ $stat->nama_status }}</option>
                                                        @endforeach
                                                    </select></td>
                                                <td><select class="form-control" id="i_nprog" name="i_nprog[]"
                                                        required="required" disabled>
                                                        <option selected disabled> --Pilih Progress-- </option>
                                                        @foreach ($progress as $prog)
                                                        <option value="{{ $prog->id_progress }}" @if($prog->id_progress == $item->i_nprog) selected @endif>{{ $prog->nama_progress }}</option>
                                                        @endforeach
                                                    </select></td>
                                            </tr>
                                            @empty
                                                    
                                            @endforelse
                                            </tbody>
                                        </table>
                                        {{-- Tabel--}}
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        {{-- footer --}}
        @include('layout/footer')
        {{-- /.footer --}}

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{url('/lte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{url('/lte/plugins/moment/moment.min.js')}}"></script>
    <script src="{{url('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/lte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('/lte/dist/js/demo.js')}}"></script>
    <script>
        $(function () {
            $('#formnetwork').addClass('active');
            //Date range picker
            $('#reservation').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'YYYY/MM/DD'
                }
            })
            $('#reservation1').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'YYYY/MM/DD'
                }
            })
        })
    </script>
    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function () {
            ++i;
            $("#dynamicAddRemove").append(`
            <tbody>
      <tr>
        <td><input type="text" name="d_net[]" id="d_net"
            placeholder="Masukan Detail Masalah/Request" class="form-control" value="{{$item->d_net}}" required disabled/>
        </td>
        <td><input type="number" onkeypress="return isNumberKey(evt)" id="j_pemasangan" name="j_pemasangan[]" class="form-control"
            placeholder="Masukan Jumlah Pemasangan" value="{{$item->j_pemasangan}}" required="required" disabled>
        </td>
        <td><input type="text" name="l_pemasangan[]" id="l_pemasangan" 
            placeholder="Masukan Letak Pemasangan" class="form-control" value="{{$item->l_pemasangan}}" required="required" disabled/>
        </td>
        <td><select class="form-control" id="i_nstatus" name="i_nstatus[]" required="required" disabled>
            <option selected disabled> --Pilih Status-- </option>
            @foreach ($status as $stat)
            <option value="{{ $stat->id_status }}" @if($stat->id_status == $item->i_nstatus) selected @endif >{{ $stat->nama_status }}</option>
            @endforeach
        </select></td>
        <td><select class="form-control" id="i_nprog" name="i_nprog[]" required="required" disabled>
            <option selected disabled> --Pilih Progress-- </option>
            @foreach ($progress as $prog)
            <option value="{{ $prog->id_progress }}" @if($prog->id_progress == $item->i_nprog) selected @endif>{{ $prog->nama_progress }}</option>
            @endforeach
        </select></td>
    </tr>
    </tbody>`);
        });
        $(document).on('click', '.remove-tr', function () {
            $(this).parents('tr').remove();
        });
    </script>
</body>

</html>