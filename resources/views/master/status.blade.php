<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support | Master Status</title>
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
                                <h1><i class="nav-icon fas fa-layer-group"></i>&nbsp;Data Status
                            </div>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Master Status</li>
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
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->

            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Status List</h3>
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
                                                Nama Status
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
                                        @foreach($status as $p)
                                        <tr>
                                            <td>
                                                #
                                            </td>
                                            <td>
                                                {{ $p->nama_status }}

                                            </td>
                                            <td>
                                                {{ $p->created_at }}
                                            </td>
                                            <td>
                                                {{-- <!--a href="edit_progress"{{$p->id_status}} class="btn btn-xs
                                                btn-primary"--> --}}
                                                {{-- <a href="{{route('status.edit',[ 'id_status'=>$p->id_status])}}"
                                                class="btn btn-info btn-sm"> --}}
                                                {{-- <a class="btn btn-info btn-sm" href="{{url('edit_progress')}}">
                                                --}}
                                                {{-- Edit --}}
                                                {{-- </a> --}}
                                                <button class="edit-modal btn-sm btn-info"
                                                    data-id_status="{{$p->id_status}}"
                                                    data-nama_status="{{$p->nama_status}}">
                                                    <i class="nav-icon fas fa-edit">&nbsp;Ubah</i>
                                                </button>
                                            </td>
                                            <td class="project-actions text-left">
                                                <form action="{{route('status.destroy',['id_status'=>$p->id_status])}}"
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
    <!-- Modal -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <form action="{{ route('status.store')}}" method="post" enctype="multipart/form-data" id="form-data">
                    {{ csrf_field() }}
                    <!-- heading modal -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputIDClient" hidden>ID Status</label>
                            <input type="text" id="id_status" name="id_status" class="form-control" hidden>
                        </div>
                        <div class="form-group">
                            <label for="inputNameClient">Nama Status</label>
                            <input type="text" id="nama_status" name="nama_status" class="form-control"
                                onkeypress="return event.charCode < 48 || event.charCode  >57"
                                placeholder="Masukan Nama Status" required="required">
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success float-right">Simpan Data</button>
                    </div>
                </form>
            </div>
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
           
        });
    </script>
    <script>
        $(function () {
            $('#formstatus').addClass('active');
            //Date range picker
            $('#reservation').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'MM/DD/YYYY'
                }
            })
        })
    </script>
    <script type="text/javascript">
        // Edit Data (Modal and function edit data)
        $(document).on('click', '.edit-modal', function () {

            $('.modal-title').text('Input Data Status');
            $('.form-horizontal').show();
            $('#id_status').val($(this).data('id_status'));
            $('#nama_status').val($(this).data('nama_status'));
            $('#addModal').modal('show');
        });
        $(document).on('click', '.btn-addModal', function () {

            $('.modal-title').text('Input Data Status');
            $('.form-horizontal').show();
            $('#id_status').val('');
            $('#nama_status').val('');
            $('#addModal').modal('show');
        });
    </script>
</body>

</html>