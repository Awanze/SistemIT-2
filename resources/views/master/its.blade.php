<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support | Master IT Support</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Data Table -->
    <link rel="stylesheet" href="{{url('/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{url('/lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
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
                                <h1><i class="nav-icon fas fa-layer-group"></i>&nbsp;Data IT Support
                            </div>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Master IT Support</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <button type="button" class="btn btn-success btn-addModal float-right" title="Tambah Baru">
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
                                <h3 class="card-title">IT Support List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tabelits" class="table table-noborder table-stripedw">
                                    <thead>
                                        <tr>
                                            <th style="width: 0.5%">
                                                #
                                            </th>
                                            <th>
                                                Nama IT Support
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
                                        @foreach($its as $p)
                                        <tr>
                                            <td class="project-actions text-center">
                                                #
                                            </td>
                                            <td>
                                                {{ $p->nama_its }}
                                            </td>
                                            <td>
                                                {{ $p->nohp_its }}
                                            </td>
                                            <td>
                                                {{ $p->email_its }}
                                            </td>
                                            <td>
                                                {{ $p->alamat_its }}
                                            </td>
                                            <td>
                                                {{ $p->created_at }}
                                            </td>

                                            <td>
                                                @can('master/its')
                                                <button class="edit-modal btn-sm btn-info" data-id_its="{{$p->id_its}}"
                                                    data-nama_its="{{$p->nama_its}}"
                                                    data-tgl_lahir_its="{{$p->tgl_lahir_its}}"
                                                    data-nohp_its="{{$p->nohp_its}}" data-email_its="{{$p->email_its}}"
                                                    data-alamat_its="{{$p->alamat_its}}">
                                                    <i class="nav-icon fas fa-edit">&nbsp;Ubah</i>
                                                </button>
                                                @else

                                                @endcan
                                                
                                            </td>
                                            <td class="project-actions text-left">
                                                <form action="{{route('its.destroy',['id_its'=>$p->id_its])}}"
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
    <!-- Add Modal -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <form action="{{ route('its.store')}}" method="post" enctype="multipart/form-data" id="form-data">
                    {{ csrf_field() }}
                    <!-- heading modal -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputIDITSupport" hidden>ID IT Support</label>
                            <input type="number" id="id_its" name="id_its" class="form-control" hidden>
                        </div>
                        <div class="form-group">
                            <label for="inputNameITSupport">Nama IT Support</label>
                            <input type="text" id="nama_its" name="nama_its" class="form-control"
                                onkeypress="return event.charCode < 48 || event.charCode  >57"
                                placeholder="Masukan Nama IT Support" required="required">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir_its">Tgl Lahir</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input name="tgl_lahir_its" type="text" class="form-control float-right"
                                    id="reservation" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputITHandphone">No Handphone</label>
                            <input type="number" id="nohp_its" name="nohp_its" class="form-control"
                                placeholder="Masukan No Handphone" required="required">
                        </div>
                        <div class="form-group">
                            <label for="inputITEmail">Email</label>
                            <input type="text" id="email_its" name="email_its" class="form-control"
                                placeholder="Masukan Email" required="required">
                        </div>

                        <div class="form-group">
                            <label for="inputITAlamat">Alamat</label>
                            <textarea id="alamat_its" name="alamat_its" class="form-control" rows="4"
                                placeholder="Masukan Alamat Client" required="required"></textarea>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Batal</button>
                        {{-- <input type="submit" value="Simpan Data" class="btn btn-success float-right"> --}}
                        <button type="submit" class="btn btn-success float-right">Simpan Data </button>
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

    <script src="{{url('/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{url('/lte/plugins/moment/moment.min.js')}}"></script>
    <script src="{{url('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/lte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('/lte/dist/js/demo.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{url('/lte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Data Table -->
    <script>
        $(function () {
            $("#tabelits").DataTable({
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
            $('#formits').addClass('active');
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

            $('.modal-title').text('Input Data IT Support');
            $('.form-horizontal').show();
            $('#id_its').val($(this).data('id_its'));
            $('#nama_its').val($(this).data('nama_its'));
            $('#tgl_lahir_its').val($(this).data('tgl_lahir_its'));
            $('#nohp_its').val($(this).data('nohp_its'));
            $('#email_its').val($(this).data('email_its'));
            $('#alamat_its').val($(this).data('alamat_its'));
            $('#addModal').modal('show');
        });

        $(document).on('click', '.btn-addModal', function () {

            $('.modal-title').text('Input Data IT Support');
            $('.form-horizontal').show();
            $('#id_its').val('');
            $('#nama_its').val('');
            $('#tgl_lahir_its').val('');
            $('#nohp_its').val('');
            $('#email_its').val('');
            $('#alamat_its').val('');
            $('#addModal').modal('show');
        });
    </script>
    
</body>

</html>