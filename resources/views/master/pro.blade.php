<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support | Master Programmer</title>
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
                                <h1><i class="nav-icon fas fa-layer-group"></i>&nbsp;Data Programmer
                            </div>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Master Programmer</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <button type="button" class="btn-addModal btn btn-success float-right" title="Tambah Baru">
                                <i class="nav-icon fas fa-file">&nbsp;Tambah Baru</i></button>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->

            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Programmer List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-noborder table-stripedw">
                                    <thead>
                                        <tr>
                                            <th style="width: 0.5%">
                                                #
                                            </th>
                                            <th>
                                                Nama Programmer
                                            </th>
                                            <th style="width: 15%">
                                                No Handphone
                                            </th>
                                            <th style="width: 15%">
                                                Email
                                            </th>
                                            <th style="width: 20%">
                                                Alamat
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
                                        @foreach($pro as $p)
                                        <tr>
                                            <td>
                                                #
                                            </td>
                                            <td>
                                                {{ $p->nama_pro }}
                                            </td>
                                            <td>
                                                {{ $p->nohp_pro }}
                                            </td>
                                            <td>
                                                {{ $p->email_pro }}
                                            </td>
                                            <td>
                                                {{ $p->alamat_pro }}
                                            </td>
                                            <td>
                                                {{ $p->created_at }}
                                            </td>
                                            <td>

                                                <button class="edit-modal btn-sm btn-info" data-id_pro="{{$p->id_pro}}"
                                                    data-nama_pro="{{$p->nama_pro}}"
                                                    data-tgl_lahir_pro="{{$p->tgl_lahir_pro}}"
                                                    data-nohp_pro="{{$p->nohp_pro}}" data-email_pro="{{$p->email_pro}}"
                                                    data-alamat_pro="{{$p->alamat_pro}}">
                                                    <i class="nav-icon fas fa-edit">&nbsp;Ubah</i>
                                                </button>
                                            </td>
                                            <td class="project-actions text-left">
                                                <form action="{{route('pro.destroy',['id_pro'=>$p->id_pro])}}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">

                                                    <button class="btn btn-sm btn-danger" type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus data?')">
                                                        <i class="nav-icon fas fa-minus-circle">&nbsp;Hapus</i></button>
                                                </form>
                                            </td>
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
                    <div class="col-md-6">
                        <div class="card card-secondary">

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
    <!-- Modal -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <form action="{{ route('pro.store')}}" method="post" enctype="multipart/form-data" id="form-data">
                    {{ csrf_field() }}
                    <!-- heading modal -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputIDProgrammer" hidden>ID Programmer</label>
                            <input type="text" id="id_pro" name="id_pro" class="form-control" hidden>
                        </div>
                        <div class="form-group">
                            <label for="inputNameProgrammer">Nama Programmer</label>
                            <input type="text" id="nama_pro" name="nama_pro" class="form-control"
                                onkeypress="return event.charCode < 48 || event.charCode  >57"
                                placeholder="Masukan Nama Programmer" required="required">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir_pro">Tgl Lahir</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input name="tgl_lahir_pro" type="text" class="form-control float-right"
                                    id="reservation" required="required">
                            </div>
                            <div class="form-group">
                                <label for="inputProHandphone">No Handphone</label>
                                <input type="number" id="nohp_pro" name="nohp_pro" class="form-control"
                                    placeholder="Masukan No Handphone" required="required">
                            </div>
                            <div class="form-group">
                                <label for="inputProEmail">Email</label>
                                <input type="text" id="email_pro" name="email_pro" class="form-control"
                                    placeholder="Masukan Email" required="required">
                            </div>
                            <div class="form-group">
                                <label for="inputProAlamat">Alamat</label>
                                <textarea id="alamat_pro" name="alamat_pro" class="form-control" rows="4"
                                    placeholder="Masukan Alamat Client" required="required"></textarea>
                            </div>
                        </div>
                        <!-- footer modal -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success float-right">Simpan Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- jQuery -->
        <script src="{{url('/lte/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{url('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <script src="{{url('/lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>

        <script src="{{url('/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

        <script src="{{url('/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{url('/lte/plugins/moment/moment.min.js')}}"></script>

        <script src="{{url('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{url('/lte/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{url('/lte/dist/js/demo.js')}}"></script>

        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>

        <script>
            $(function () {
                $('#formprogrammer').addClass('active');
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

                $('.modal-title').text('Input Data Programmer');
                $('.form-horizontal').show();
                $('#id_pro').val($(this).data('id_pro'));
                $('#nama_pro').val($(this).data('nama_pro'));
                $('#tgl_lahir_pro').val($(this).data('tgl_lahir_pro'));
                $('#nohp_pro').val($(this).data('nohp_pro'));
                $('#email_pro').val($(this).data('email_pro'));
                $('#alamat_pro').val($(this).data('alamat_pro'));
                $('#addModal').modal('show');
            });

            $(document).on('click', '.btn-addModal', function () {

                $('.modal-title').text('Input Data Programmer');
                $('.form-horizontal').show();
                $('#id_pro').val('');
                $('#nama_pro').val('');
                $('#tgl_lahir_pro').val('');
                $('#nohp_pro').val('');
                $('#email_pro').val('');
                $('#alamat_pro').val('');
                $('#addModal').modal('show');
            });
        </script>
</body>

</html>