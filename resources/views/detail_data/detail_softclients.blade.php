<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support |Detail Pengelolaan Software Client</title>
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
                            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-tasks"></i>&nbsp;Detail Pengelolaan Software Client
                                </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Detail Pengelolaan Software Client </li>
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
                                    <h3>{{ $softclients2->count()}}</h3>
                                    <p>Total Detail Data Software Client</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-user"></i>
                                </div>
                                <a href="{{url('softclient2')}}" class="small-box-footer">Info lainnya <i
                                    class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                        <!-- ./col -->
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-bell"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-text">Status Tidak Urgent</span>
                                    <span class="info-box-number">{{$tidakurgent}}</span>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-triangle"></i></span>
                        
                                      <div class="info-box-content">
                                        <span class="info-box-text">Status Urgent</span>
                                        <span class="info-box-number">{{$urgent}}</span>
                                      </div>
                                      <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                  </div>
                                  <!-- /.col -->
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                  <span class="info-box-icon bg-info elevation-1"><i class="fas fa-spinner"></i></span>
                    
                                  <div class="info-box-content">
                                    <span class="info-box-text">Progress Belum Selesai</span>
                                    <span class="info-box-number">{{$belumselesai}}</span>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                  <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
                    
                                  <div class="info-box-content">
                                    <span class="info-box-text">Progress Selesai</span>
                                    <span class="info-box-number">{{$selesai}}</span>
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                              </div>
                              <!-- /.col -->
                             </div>
                    </div>
            </section>
            <!-- Default box -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <a href="{{url('report/printurgent_softclient')}}">
                        <button type="button" class="btn-sm btn-danger" title="Print Data">
                        <i  class="nav-icon fas fa-file">&nbsp;Print Status Urgent</i></button></a>
                        <a href="{{url('report/printselesai_softclient')}}">
                        <button type="button" class="btn-sm btn-success" title="Print Data">
                        <i  class="nav-icon fas fa-file">&nbsp;Print Progress Selesai</i></button></a>
                    </div>
                </div>
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
                                            <th style="width: auto">
                                                Detail Masalah/Request
                                            </th>
                                            <th style="width: 15%">
                                                Jenis Fitur
                                            </th>
                                            <th style="width: 10%">
                                                Status
                                            </th>
                                            <th style="width: 10%">
                                                Progress
                                            </th>
                                            <th style="width: 10%">
                                                Tanggal Pembuatan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($softclients2 as $p)
                                        <tr>
                                            <td>
                                                #
                                            </td>
                                            <td>
                                                {{ $p->d_sclient}}
                                            </td>
                                            <td>
                                                {{ $p->c_fitur}}
                                            </td>
                                            <td>
                                                {{ $p->nama_status}}
                                            </td>
                                            <td>
                                                {{ $p->nama_progress}}
                                            </td>
                                            <td>
                                                {{ $p->created_at}}
                                            </td>
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
        $('#detailsoftclient').addClass('active');
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