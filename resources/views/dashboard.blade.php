<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{url('/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/lte/dist/css/adminlte.css')}}">
    <!-- overlayScrollbars -->_+
    <link rel="stylesheet" href="{{url('/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('/lte/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layout/header')
        <!-- Navbar -->
        @include('layout/sidebar')
        <!-- /.sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">
                                <div class="icon">
                                    <i class="nav-icon fas fa-home"></i>&nbsp;Dashboard</div>
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $hardware->count()}}</h3>

                                    <p>Total Data Hardware</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-microchip"></i>
                                </div>
                                <a href="{{url('hardware')}}" class="small-box-footer">Info lainnya <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3>{{ $network->count()}}</h3>

                                    <p>Total Data Network</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-network-wired"></i>
                                </div>
                                <a href="{{url('network')}}" class="small-box-footer">Info lainnya <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $softclient->count()}}</h3>

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
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $newsoft->count()}}</h3>

                                    <p>Total Data Software Baru</p>
                                </div>
                                <div class="icon">
                                    <i class="nav-icon fas fa-laptop-code"></i>
                                </div>
                                <a href="{{url('newsoft')}}" class="small-box-footer">Info lainnya <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-12 col-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Chart Pengelolaan Data</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                </div>
                                <div class="col-md-12">
                                    <div id="chartNilai"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form action="{{route('dashboard.index')}}" method="get">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <select class="form-control" id="tahun" name="tahun">
                                                {{ $last= date('Y')+10}}
                                                {{ $start= date('Y')-10}}
                                                @for ($thn = $start; $thn <= $last; $thn++) <option value="{{$thn}}"
                                                    {{( $thn == $tahun ) ? 'selected':''}}> {{$thn }} </option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn-md btn-success" float-right>View Chart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- ./col -->
                    <!-- /.row -->
                </div>
            </section>
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
    <script src="{{url('/lte/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{url('/lte/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    {{-- <script src="{{url('/lte/plugins/jqvmap/jquery.vmap.min.js')}}"></script> --}}
    {{-- <script src="{{url('/lte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{url('/lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{url('/lte/plugins/moment/moment.min.js')}}"></script>
    <script src="{{url('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{url('/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{url('/lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{url('/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/lte/dist/js/adminlte.js')}}"></script>

    <script src="{{url('/lte/build/js/highchart.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('/lte/dist/js/demo.js')}}"></script>
    

    <script>
        var dataChart = JSON.parse('@php echo json_encode($dataChart); @endphp');

        Highcharts.chart('chartNilai', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total Pengelolaan Data IT Support'
            },
            subtitle: {
                text: 'Source: Mitra IT Bali'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Total Data'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} data</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: dataChart
        });
        console.log(dataChart);
    //form home aktif
    $('#formdashboard').addClass('active');
    </script>
</body>

</html>