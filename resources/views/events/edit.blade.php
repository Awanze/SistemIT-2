<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIM IT Support | Calender Event</title>
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
     <!-- SweetAlert -->
     <script src="{{url('/css/sweetalert.min.js')}}"></script>
    <!-- FullCalendar -->
    <link rel='stylesheet' href="{{url('/css/fullcalendar.min.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        <!-- Navbar -->
        @include('layout/header')
        <!-- /.navbar -->
        @include('layout/sidebar')
        <!-- /.sidebar -->
        
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><i class="nav-icon fas fa-edit"></i>&nbsp;Edit Event Kalender</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Event Kalender</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- navigation goes here -->

            <section class="content">
                <div class="container-fluid">
                    <form action="{{ route('event.update', $event->id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title"></h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="form-group col-md-8 ">
                                            <label for="name">Ubah Event</label>
                                            <input type="text" class="form-control" id="name" name="title"
                                                value="{{ $event->title }}">
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="form-group col-md-8">
                                            <label for="description">Ubah Deskripsi</label>
                                            <textarea class="form-control" id="description" name="description"
                                                value="{{ $event->description }}">{{ $event->description }}</textarea>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="form-group col-md-2 ">
                                            <label for="backgroundColor">Ubah Color</label>
                                            <input type="color" class="form-control" name="backgroundColor"
                                                value="{{ $event->backgroundColor }}">
                                        </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success float-right">Ubah Event</button>
                                        </div>
                                    </form>
                                    <div class="form-group">
                                        <form action="{{ url('event', $event->id) }}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                                            <button type="submit" class="btn btn-danger float-left">Hapus</button>
                                        </form>
                                    </div>
                                    </div>        
            </section> 
        </div>
    </div>

        <!-- javacript here -->
        <!-- Scripts -->
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
        <!-- Sparkline -->
        <script src="{{url('/lte/plugins/sparklines/sparkline.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{url('/lte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{url('/lte/plugins/moment/moment.min.js')}}"></script>

        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{url('/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Summernote -->
        <script src="{{url('/lte/plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{url('/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{url('/lte/dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{url('/lte/dist/js/demo.js')}}"></script>
        {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
        <script src="{{url('/lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
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
        <script>
            $(function () {
                //Date range picker
                $('#reservation1').daterangepicker({
                    singleDatePicker: true,
                    locale: {
                        format: 'YYYY/MM/DD'
                    }
                })
            })
        </script>
</body>

</html>