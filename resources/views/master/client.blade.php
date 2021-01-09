<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support | Master Client</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{url('/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{url('/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
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
        @include('sweetalert::alert')
        <!-- Navbar -->
        @include('layout/header')
        <!-- /.navbar -->

        @include('layout/sidebar')
        <!-- /.sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div class="icon">
                                <h1><i class="nav-icon fas fa-layer-group"></i>&nbsp;Data Client
                            </div>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Master Client</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <button type="button" class="btn-addModal btn btn-success float-right" data-toggle="modal"
                                data-target="#addModal" title="Tambah Baru">
                                <i class="nav-icon fas fa-file">&nbsp;Tambah Baru</i></button>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Master Client</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-noborder table-stripedw">
                                    <thead>
                                        <tr>
                                            <th style="width: 0.5%">
                                                #
                                            </th>
                                            <th style="width: 15%">
                                                Nama Client
                                            </th>
                                            <th style="width: 7%">
                                                No Handphone
                                            </th>
                                            <th style="width: 18%">
                                                Alamat Client
                                            </th>
                                            <th style="width: 15%">
                                                Tgl Pembuatan
                                            </th>
                                            <th style="width: 5%">

                                            </th>
                                            <th style="width: 5%">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($client as $p)
                                        <tr>
                                            <td>
                                                #
                                            </td>
                                            <td>
                                                {{ $p->nama_client }}
                                            </td>
                                            <td>
                                                {{ $p->nohp_client }}
                                            </td>

                                            <td>
                                                {{ $p->alamat_client }}
                                            </td>
                                            <td>
                                                {{ $p->created_at }}
                                            </td>
                                            <td>
                                                <button class="edit-modal btn-sm btn-info"
                                                    data-id_client="{{$p->id_client}}"
                                                    data-nama_client="{{$p->nama_client}}"
                                                    data-nohp_client="{{$p->nohp_client}}"
                                                    data-email_client="{{$p->email_client}}"
                                                    data-alamat_client="{{$p->alamat_client}}"
                                                    data-maintenance="{{$p->maintenance}}"
                                                    data-jumlah_lisensi="{{$p->jumlah_lisensi}}"
                                                    data-jumlah_server="{{$p->jumlah_server}}"
                                                    data-jumlah_komputer="{{$p->jumlah_komputer}}">
                                                    <i class="nav-icon fas fa-edit">&nbsp;Ubah</i>
                                                </button>
                                            </td>
                                            <td class="project-actions text-left">
                                                <form action="{{route('client.destroy',['id_client'=>$p->id_client])}}"
                                                    method="POST">
                                                    {{-- <form action="{{ route('progress.destroy') }}" method="post">
                                                    --}}
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">

                                                    <button class="btn btn-sm btn-danger" type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus data?')">
                                                        <i class="nav-icon fas fa-minus-circle">&nbsp;Hapus</i></button>
                                                </form>
                                            </td>
                                        </tr>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- /Table -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        {{-- Tabel--}}
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
    <!-- Modal -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <form action="{{ route('client.store')}}" method="post" enctype="multipart/form-data" id="form-data">
                    {{ csrf_field() }}
                    <!-- heading modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Input Data Client</h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputIDClient" hidden>ID Client</label>
                            <input type="text" id="id_client" name="id_client" class="form-control" hidden>
                        </div>
                        <div class="form-group">
                            <label for="inputNameClient">Nama Client</label>
                            <input type="text" id="nama_client" name="nama_client" class="form-control"
                                placeholder="Masukan Nama Client" required="required">
                        </div>
                        <div class="form-group">
                            <label for="inputHandphone">No Handphone</label>
                            <input type="number" id="nohp_client" name="nohp_client" class="form-control"
                                placeholder="Masukan No Handphone" required="required">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Alamat Email</label>
                            <input type="text" id="email_client" name="email_client" class="form-control"
                                placeholder="Masukan Alamat Email" required="required">
                        </div>
                        <div class="form-group">
                            <label for="inputAlamatClient">Alamat Client</label>
                            <textarea id="alamat_client" name="alamat_client" class="form-control" rows="4"
                                placeholder="Masukan Alamat Client" required="required"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputNameClient">Maintenance</label>
                            <td><select class="form-control" id="maintenance" name="maintenance" required="required">
                                    <option selected disabled value=""> --Pilih Maintenance-- </option>
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </td>
                        </div>
                        <div class="form-group">
                            <label for="inputHandphone">Jumlah Lisensi</label>
                            <input type="number" id="jumlah_lisensi" name="jumlah_lisensi" class="form-control"
                                placeholder="Masukan Jumlah Lisensi" required="required">
                        </div>
                        <div class="form-group">
                            <label for="inputNameClient">Jumlah Server</label>
                            <input type="number" id="jumlah_server" name="jumlah_server" class="form-control"
                                placeholder="Masukan Jumlah Server" required="required">
                        </div>
                        <div class="form-group">
                            <label for="inputHandphone">Jumlah Komputer</label>
                            <input type="number" id="jumlah_komputer" name="jumlah_komputer" class="form-control"
                                placeholder="Masukan Jumlah Komputer" required="required">
                        </div>

                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success float-right">Simpan Data </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{url('/lte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Data Table -->
    <script src="{{url('/lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{url('/lte/plugins/moment/moment.min.js')}}"></script>

    <script src="{{url('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/lte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('/lte/dist/js/demo.js')}}"></script>
    <!-- Data Table -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    <!-- Date -->
    <script>
        $(function () {
            $('#formclient').addClass('active');
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
        // Edit Data (Modal and function edit data)
        $(document).on('click', '.edit-modal', function () {

            $('.modal-title').text('Input Data Client');
            $('.form-horizontal').show();
            $('#id_client').val($(this).data('id_client'));
            $('#nama_client').val($(this).data('nama_client'));
            $('#nohp_client').val($(this).data('nohp_client'));
            $('#email_client').val($(this).data('email_client'));
            $('#alamat_client').val($(this).data('alamat_client'));
            $('#maintenance').val($(this).data('maintenance'));
            $('#jumlah_lisensi').val($(this).data('jumlah_lisensi'));
            $('#jumlah_server').val($(this).data('jumlah_server'));
            $('#jumlah_komputer').val($(this).data('jumlah_komputer'));

            $('#addModal').modal('show');
        });
        // Add Data (Modal and function add data)
        $(document).on('click', '.btn-addModal', function () {

            $('.modal-title').text('Input Data Client');
            $('.form-horizontal').show();
            $('#id_client').val('');
            $('#nama_client').val('');
            $('#nohp_client').val('');
            $('#email_client').val('');
            $('#alamat_client').val('');
            $('#maintenance').val('');
            $('#jumlah_lisensi').val('');
            $('#jumlah_server').val('');
            $('#jumlah_komputer').val('');

            $('#addModal').modal('show');
        });
    </script>
</body>

</html>