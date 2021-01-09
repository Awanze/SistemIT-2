<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support | Tambah Network</title>
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
                            <h1><i class="nav-icon fas fa-file"></i>&nbsp;Tambah Network</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Network</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <form action="{{ route('network.store')}}" method="post" enctype="multipart/form-data"
                        id="form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Informasi Pemasangan Network</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Input_Network" hidden>ID Data Network</label>
                                                    <input type="text" id="id_net" name="id_net" class="form-control"
                                                        hidden>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Input_Network">Permintaan Client</label>
                                                    <input type="text" id="r_net" name="r_net" class="form-control"
                                                        value="{{ old('r_net') }}" placeholder="Masukan Permintaan"
                                                        required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="Input_Company">Perusahaan Client</label>
                                                    <select class="form-control" value="{{ old('i_company') }}" id="i_company" name="i_company"
                                                        required="required">
                                                        <option selected disabled> --Pilih Client-- </option>
                                                        @foreach ($client as $clien)
                                                        <option value="{{ $clien->id_client }}">{{ $clien->nama_client }}</option>
                                                        @endforeach
                                                    </select>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Input_Lead">Nama Staff Client</label>
                                                    <input type="text" id="i_Leader" name="i_Leader"
                                                        class="form-control" value="{{ old('i_Leader') }}"
                                                        onkeypress="return event.charCode < 48 || event.charCode  >57"
                                                        placeholder="Masukan Nama Staff" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Input_Lead">IT Support</label>
                                                    <select class="form-control" value="{{ old('n_its') }}" id="n_its" name="n_its"
                                                    required="required">
                                                    <option selected disabled> --Pilih IT Support-- </option>
                                                    @foreach ($its as $it)
                                                    <option value="{{ $it->id_its }}">{{ $it->nama_its }}</option>
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
                                                            id="reservation" name="tgl_mpemasangan" required="required">
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
                                                            id="reservation1" name="tgl_apemasangan"
                                                            required="required">
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
                                        {{-- <form action="{{ url('softclient.store') }}" method="POST"> --}}
                                        {{-- @csrf --}}
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        @if (Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                            <p>{{ Session::get('success') }}</p>
                                        </div>
                                        @endif
                                        <table class="table table-bordered" id="dynamicAddRemove">
                                            <tr>
                                                <th>Detail Pemasangan</th>
                                                <th>Jumlah Pemasangan</th>
                                                <th>Letak Pemasangan</th>
                                                <th>Status</th>
                                                <th>Progress</th>
                                            </tr>
                                            <tr>
                                                <td><input type="text" name="d_net[]" id="d_net"
                                                        placeholder="Masukan Detail Pemasangan" class="form-control"
                                                        required />
                                                </td>
                                                <td><input type="number" onkeypress="return isNumberKey(evt)"
                                                        id="j_pemasangan" name="j_pemasangan[]" class="form-control"
                                                        placeholder="Masukan Jumlah Pemasangan" required="required">
                                                </td>
                                                <td><input type="text" name="l_pemasangan[]" id="l_pemasangan"
                                                        placeholder="Masukan Letak Pemasangan" class="form-control"
                                                        required />
                                                </td>
                                                <td><select class="form-control" id="i_nstatus" name="i_nstatus[]"
                                                        required="required">
                                                        <option selected disabled> --Pilih Status-- </option>
                                                        @foreach ($status as $stat)
                                                        <option value="{{ $stat->id_status }}">{{ $stat->nama_status }}</option>
                                                        @endforeach
                                                    </select></td>
                                                <td><select class="form-control" id="i_nprog" name="i_nprog[]"
                                                        required="required">
                                                        <option selected disabled> --Pilih Progress-- </option>
                                                        @foreach ($progress as $prog)
                                                        <option value="{{ $prog->id_progress }}">{{ $prog->nama_progress }}</option>
                                                        @endforeach
                                                    </select></td>
                                            </tr>
                                        </table>
                                        {{-- Tabel--}}
                                        <br>
                                        <button type="button" name="add" id="add-btn" class="btn btn-success float-right">Tambah</button>                                           
                                    </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('network')}}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-success float-right">Simpan Data </button>
                            </div>
                        </div>
                    </form>
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
    <script>
        $(function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        })
    </script>
    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function () {
            ++i;
            $("#dynamicAddRemove").append(`
        <tr>
                <td><input type="text" name="d_net[]" id="d_net" placeholder="Masukan Detail Pemasangan" class="form-control" required/>
                </td>  
                <td><input type="number" onkeypress="return isNumberKey(evt)" id="j_pemasangan"name="j_pemasangan[]"  class="form-control" placeholder="Masukan Jumlah Pemasangan" required="required">
                </td>  
                <td><input type="text" name="l_pemasangan[]" id="l_pemasangan" placeholder="Masukan Letak Pemasangan" class="form-control" required />
                </td>
                <td><select class="form-control" id="i_nstatus" name="i_nstatus[]" required="required">
                  <option selected disabled> --Pilih Status-- </option>
                  @foreach ($status as $stat)
                  <option value="{{ $stat->id_status }}">{{ $stat->nama_status }}</option>
                  @endforeach
                  </select></td>  
                <td><select class="form-control" id="i_nprog" name="i_nprog[]" required="required">
                  <option selected disabled> --Pilih Progress-- </option>
                  @foreach ($progress as $prog)
                 <option value="{{ $prog->id_progress }}">{{ $prog->nama_progress }}</option>
                 @endforeach
                </select></td>  
          <td><button type="button" class="btn btn-danger remove-tr">X</button></td>
      </tr>`);
        });
        $(document).on('click', '.remove-tr', function () {
            $(this).parents('tr').remove();
        });
    </script>
</body>

</html>