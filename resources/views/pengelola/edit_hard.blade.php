<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support | Edit Data Hardware</title>
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
                            <h1><i class="nav-icon fas fa-edit"></i>&nbsp;Ubah Data Hardware</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Data Hardware</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <form action="{{route('hardware.update')}}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12">

                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Informasi Masalah Hardware</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Input_Hardware" hidden>ID Data Hardware</label>
                                                    <input type="text" id="id_hard" name="id_hard" class="form-control"
                                                        value="{{ $hardware->id_hard}}" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Input_Hardware">Masalah Hardware</label>
                                                    <input type="text" id="m_hard" name="m_hard" required="required"
                                                        class="form-control" placeholder="Masukan Masalah"
                                                        value="{{ $hardware->m_hard}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="Input_Client">Perusahaan Client</label>
                                                    {{-- <input type="text" id="i_client" name="i_client" class="form-control"> --}}
                                                    <select class="form-control" id="i_client" name="i_client"
                                                        required="required">
                                                        <option selected disabled></option>
                                                        {{-- <option value="{{ $client ?? ''->nama_client}}">{{ $client ?? ''->nama_client}}
                                                        </option> --}}
                                                        @foreach ($client as $clien)
                                                        <option value="{{ $clien->id_client }}"
                                                            {{($clien->id_client == $hardware->i_client) ? 'selected' : ''}}>
                                                            {{$clien->nama_client}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="Input_Staff">Nama Staff</label>
                                                    <input type="text" id="i_staff" name="i_staff" class="form-control"
                                                        onkeypress="return event.charCode < 48 || event.charCode  >57"
                                                        required="required" placeholder="Masukan Nama Staff"
                                                        value="{{ $hardware->i_staff}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="inputStatus">IT Support Yang Mengerjakan</label>
                                                    <select class="form-control" id="h_its" name="h_its"
                                                        required="required">
                                                        <option selected disabled></option>
                                                        @foreach ($its as $it)
                                                        <option value="{{ $it->id_its }}"
                                                            {{($it->id_its == $hardware->h_its) ? 'selected' : ''}}>
                                                            {{$it->nama_its}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tgl_perbaikan">Tgl Selesai Perbaikan</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                        <input name="tgl_perbaikan" type="text"
                                                            class="form-control float-right" id="reservation"
                                                            required="required" value="{{ $hardware->tgl_perbaikan}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- </div>  --}}
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card card-secondary">
                                                <div class="card-header">
                                                    <h3 class="card-title">List Detail Perbaikan</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">


                                                    {{-- <form action="{{ url('softclient.store') }}" method="POST">
                                                    --}}
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
                                                        <a href="#" class="close" data-dismiss="alert"
                                                            aria-label="close">×</a>
                                                        <p>{{ Session::get('success') }}</p>
                                                    </div>
                                                    @endif
                                                    <table class="table table-bordered" id="dynamicAddRemove">
                                                        <thead>
                                                            <th>Detail Perbaikan</th>
                                                            <th>Jenis Komputer</th>
                                                            <th>Komponen Rusak</th>
                                                            <th>Status</th>
                                                            <th>Progress</th>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($dhard as $item)
                                                            <tr>
                                                                <td><input type="text" name="dm_hard[]" id="dm_hard"
                                                                        placeholder="Masukan Detail Perbaikan"
                                                                        class="form-control" required
                                                                        value="{{ $item->dm_hard }}" />
                                                                </td>
                                                                <td><input type="text" name="j_komputer[]"
                                                                        id="j_komputer"
                                                                        placeholder="Masukan Jenis Komputer"
                                                                        class="form-control" required
                                                                        value="{{ $item->j_komputer }}" />
                                                                </td>
                                                                <td><input type="text" name="k_rusak[]" id="k_rusak"
                                                                        placeholder="Masukan Komponen Rusak"
                                                                        class="form-control" required
                                                                        value="{{ $item->k_rusak }}" />
                                                                </td>
                                                                <td> <select class="form-control" id="i_status"
                                                                        name="i_status[]" required="required">
                                                                        <option selected disabled> --Pilih Status--
                                                                        </option>
                                                                        @foreach ($status as $stat)
                                                                        <option value="{{ $stat->id_status }}"
                                                                            @if($stat->id_status == $item->i_status)
                                                                            selected @endif>{{ $stat->nama_status }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select></td>
                                                                <td> <select class="form-control" id="i_prog"
                                                                        name="i_prog[]" required="required">
                                                                        <option selected disabled> --Pilih Progress--
                                                                        </option>
                                                                        @foreach ($progress as $prog)
                                                                        <option value="{{ $prog->id_progress }}"
                                                                            @if($prog->id_progress == $item->i_prog)
                                                                            selected @endif>{{ $prog->nama_progress }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select></td>
                                                                <td><button type="button"
                                                                        class="btn btn-danger remove-tr">X</button></td>
                                                            </tr>
                                                            @empty

                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                    {{-- table --}}
                                                    <br>
                                        <button type="button" name="add" id="add-btn" class="btn btn-success float-right">Tambah</button>                                           
                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                            {{-- Tabel--}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{url('hardware')}}" class="btn btn-secondary">Batal</a>
                                            <button type="submit" class="btn btn-success float-right">Update Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </section>
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
        })
    </script>
    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function () {
            ++i;
            $("#dynamicAddRemove").append(`
            <tbody>
      <tr>
        <td><input type="text" name="dm_hard[]" id="dm_hard"
            placeholder="Masukan Detail Perbaikan" class="form-control" required  />
        </td>
        <td><input type="text" name="j_komputer[]" id="j_komputer"
            placeholder="Masukan Jenis Komputer" class="form-control" required  />
        </td>
        <td><input type="text" name="k_rusak[]" id="k_rusak"
            placeholder="Masukan Komponen Rusak" class="form-control"  required />
        </td>
        <td><select class="form-control" id="i_status" name="i_status[]" required="required">
            <option selected disabled> --Pilih Status-- </option>
            @foreach ($status as $stat)
            <option value="{{ $stat->id_status }}">{{ $stat->nama_status }}</option>
            @endforeach
        </select></td>
        <td><select class="form-control" id="i_prog" name="i_prog[]" required="required">
            <option selected disabled> --Pilih Progress-- </option>
            @foreach ($progress as $prog)
        <option value="{{ $prog->id_progress }}" >{{ $prog->nama_progress }}</option>
            @endforeach
        </select></td>
        <td><button type="button" class="btn btn-danger remove-tr">X</button></td>
    </tr>
    </body>`);
        });

        $(document).on('click', '.remove-tr', function () {
            $(this).parents('tr').remove();
        });
    </script>
</body>

</html>