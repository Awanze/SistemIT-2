<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support | Edit Data Software dan Games Baru</title>
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
                            <h1><i class="nav-icon fas fa-edit"></i>&nbsp;Ubah Data Software Baru</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Data Software Baru</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <form action="{{route('newsoft.update')}}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Informasi Masalah Software Baru</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputName" hidden>ID Data Software Baru</label>
                                                    <input type="text" id="id_nsoft" name="id_nsoft"
                                                        class="form-control" value="{{ $newsofts->id_nsoft}}" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputName">Permintaan/Masalah</label>
                                                    <input type="text" id="r_nsoft" name="r_nsoft" class="form-control"
                                                        value="{{ $newsofts->r_nsoft}}"
                                                        placeholder="Masukan Permintaan/Masalah" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="inputClientCompany">Nama Software</label>
                                                    <input type="text" id="inputClientCompany" name="n_soft"
                                                        class="form-control" required="required"
                                                        onkeypress="return event.charCode < 48 || event.charCode  >57"
                                                        placeholder="Masukan Nama Software"
                                                        value="{{ $newsofts->n_soft}}">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="inputProjectLeader">Jenis Software</label>
                                                    <input type="text" id="inputProjectLeader" name="j_soft"
                                                        class="form-control" required="required"
                                                        onkeypress="return event.charCode < 48 || event.charCode  >57"
                                                        placeholder="Masukan Jenis Software"
                                                        value="{{ $newsofts->j_soft}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputProgram">Programmer</label>
                                                    {{-- <input type="text" id="inputSpentBudget" name="nsoft_progremmer" class="form-control"> --}}
                                                    <select class="form-control" id="nsoft_programmer"
                                                        name="nsoft_programmer" required="required">
                                                        <option selected disabled></option>
                                                        @foreach ($pro as $progr)
                                                        <option value="{{ $progr->id_pro }}"
                                                            {{($progr->id_pro == $newsofts->nsoft_programmer) ? 'selected' : ''}}>
                                                            {{ $progr->nama_pro }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputITSupport">IT Support</label>
                                                    {{-- <input type="text" id="inputSpentBudget"name="nsoft_itsupport"  class="form-control"> --}}
                                                    <select class="form-control" id="nsoft_itsupport"
                                                        name="nsoft_itsupport" required="required">
                                                        <option selected disabled></option>
                                                        @foreach ($its as $it)
                                                        <option value="{{ $it->id_its }}"
                                                            {{($it->id_its == $newsofts->nsoft_itsupport) ? 'selected' : ''}}>
                                                            {{$it->nama_its}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="inputTglPerbaikan">Tgl Selesai</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control float-right"
                                                            id="reservation" name="tgl_ssoft" required="required"
                                                            value="{{ $newsofts->tgl_ssoft}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">List Detail Pengelolaan</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
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
                                            <thead>
                                                <th>Detail Masalah/Request</th>
                                                <th>Jenis Fitur</th>
                                                <th>Status</th>
                                                <th>Progress</th>
                                            </thead>
                                            <tbody>
                                                @forelse ($dnewsofts as $item)
                                            <tr>
                                                <td><input type="text" name="d_nsoft[]" id="d_nsoft"
                                                        placeholder="Masukan Detail Masalah/Request" value="{{$item->d_nsoft}}" class="form-control" required />
                                                </td>
                                                <td><input type="text" name="n_fitur[]" id="n_fitur"
                                                        placeholder="Masukan Fitur" class="form-control" value="{{$item->n_fitur}}" required />
                                                </td>
                                                <td><select class="form-control" id="i_nsstatus" name="i_nsstatus[]"
                                                        required="required">
                                                        <option selected disabled> --Pilih Status-- </option>
                                                        @foreach ($status as $stat)
                                                        <option value="{{ $stat->id_status }}" @if($stat->id_status == $item->i_nsstatus) selected @endif>{{ $stat->nama_status }}</option>
                                                        @endforeach
                                                    </select></td>
                                                <td><select class="form-control" id="i_nsprog" name="i_nsprog[]"
                                                        required="required">
                                                        <option selected disabled> --Pilih Progress-- </option>
                                                        @foreach ($progress as $prog)
                                                        <option value="{{ $prog->id_progress }}" @if($prog->id_progress == $item->i_nsprog) selected @endif>{{ $prog->nama_progress }}</option>
                                                        @endforeach
                                                    </select></td>
                                                    <td><button type="button" class="btn btn-danger remove-tr">X</button></td>
                                            </tr>
                                            @empty
                                                    
                                            @endforelse
                                            <tbody>
                                        </table>
                                        {{-- </form> --}}
                                        <br>
                                        <button type="button" name="add" id="add-btn" class="btn btn-success float-right">Tambah</button>                                           
                                    </div>
                                    <!-- /.card-body -->
                                <!-- /.card -->
                                {{-- Tabel--}}
                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('newsoft')}}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-success float-right">Update Data</button>
                    
                 </div>
                </div>
                
            </form>
        </div>
        <!-- /.content -->
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
        <td><input type="text" name="d_nsoft[]" id="d_nsoft"
            placeholder="Masukan Detail Masalah/Request" class="form-control" required />
        </td>
        <td><input type="text" name="n_fitur[]" id="n_fitur"
            placeholder="Masukan Fitur" class="form-control"  required />
        </td>
        <td><select class="form-control" id="i_nsstatus" name="i_nsstatus[]" required="required">
            <option selected disabled> --Pilih Status-- </option>
            @foreach ($status as $stat)
            <option value="{{ $stat->id_status }}" >{{ $stat->nama_status }}</option>
            @endforeach
        </select></td>
        <td><select class="form-control" id="i_nsprog" name="i_nsprog[]" required="required">
            <option selected disabled> --Pilih Progress-- </option>
            @foreach ($progress as $prog)
        <option value="{{ $prog->id_progress }}">{{ $prog->nama_progress }}</option>
            @endforeach
        </select></td>
        <td><button type="button" class="btn btn-danger remove-tr">X</button></td>
    </tr>
    </tbody>`);
        });

        $(document).on('click', '.remove-tr', function () {
            $(this).parents('tr').remove();
        });
    </script>
</body>

</html>