<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support | Pengelolaan Client Software</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{url('/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{url('/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{url('/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- JQVMap -->
    {{-- <link rel="stylesheet" href="{{url('/lte/plugins/jqvmap/jqvmap.min.css')}}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/lte/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('/lte/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('/lte/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-tasks"></i>&nbsp;Pengelolaan Software Client
                                </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Pengelolaan Software Client </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $softclients->count()}}</h3>
                                    <p>Total Data Software Client</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-user"></i>
                                </div>
                                <a href="{{url('softclient')}}" class="small-box-footer">Info lainnya <i
                                    class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            @can('update_softclient')
                            <a href="{{route('softclient.create')}}"><button type="button" class="btn btn-success float-right" title="Tambah Baru">
                                    <i class="nav-icon fas fa-file">&nbsp;Tambah Baru</i></button></a>
                                    @else

                            @endcan
                        </div>
                    </div>
            </section>

            <!-- Default box -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List Data Software Client</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-noborder table-stripedw">
                                    <thead>
                                        <tr>
                                            <th style="width: 0.5%">
                                                #
                                            </th>
                                            <th style="width: 20%">
                                                Request/Kendala
                                            </th>
                                            <th style="width: 10%">
                                                Perusahaan Client
                                            </th>
                                            <th style="width: 10%">
                                                Staff Client
                                            </th>
                                            <th style="width: 10%">
                                                Programmer
                                            </th>
                                            <th style="width: 10%">
                                                IT Support
                                            </th>
                                            <th style="width: 10%">
                                                Due Date
                                            </th>
                                            <th style="width: 5%">
                                            </th>
                                            <th style="width: 5%">
                                            </th>
                                            <th style="width: 5%">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($softclients as $p)
                                        <tr>
                                            <td>
                                                #
                                            </td>
                                            <td>
                                                {{ $p->r_sclient}}
                                            </td>
                                            <td>
                                                {{ $p->nama_client}}
                                            </td>
                                            <td>
                                                {{ $p->n_sclient}}
                                            </td>
                                            <td>
                                                {{ $p->nama_pro}}
                                            </td>
                                            <td>
                                                {{ $p->nama_its}}
                                            </td>
                                            <td>
                                                {{ $p->tgl_ssoftclient}}
                                            </td>
                                            <td class="project-actions text-right">
                                            <a href="{{route('softclient.view',[ 'id_sclient'=>$p->id_sclient])}}" class="btn btn-sm btn-info">
                                            <i class="nav-icon fas fa-eye">&nbsp;Lihat</i>
                                            </a>
                                            </td>
                                            @can('update_softclient')
                                            <td class="project-actions text-right">
                                            <a href="{{route('softclient.edit',[ 'id_sclient'=>$p->id_sclient])}}"  class="btn btn-sm btn-warning">
                                            <i class="nav-icon fas fa-edit">&nbsp;Ubah</i>
                                            </a>
                                            </td>
                                            <td class="project-actions text-right">
                                            <form action="{{route('softclient.destroy',['id_sclient'=>$p->id_sclient])}}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-sm btn-danger" type="submit"  onclick="return confirm('Yakin ingin menghapus data?')">
                                            <i class="nav-icon fas fa-minus-circle">&nbsp;Hapus</i></button>
                                                </form>
                                            </td>
                                            @else

                                            @endcan
                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->
    </div>

    {{-- footer --}}
    @include('layout/footer')
    {{-- /.footer --}}

    <!-- jQuery -->
    <script src="{{url('/lte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{url('/lte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{url('/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    {{-- <script src="{{url('/lte/plugins/chart.js/Chart.min.js')}}"></script> --}}
    <!-- Sparkline -->
    <script src="{{url('/lte/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    {{-- <script src="{{url('/lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script> --}}
    {{-- <script src="{{url('/lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{url('/lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{url('/lte/plugins/moment/moment.min.js')}}"></script>

    <script src="{{url('/lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{url('/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{url('/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>

    <script src="{{url('/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <script src="{{url('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{url('/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{url('/lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{url('/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/lte/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE demo (This is only for demo purposes) -->
    {{-- <script src="{{url('/lte/dist/js/pages/Dashboard.js')}}"></script> --}}
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
            $('#formsoftclient').addClass('active');
            //Date range picker
            $('#reservation').daterangepicker({
                singleDatePicker: true,
                locale: {
                    format: 'MM/DD/YYYY'
                }
            })
        })
    </script>
</body>

</html>