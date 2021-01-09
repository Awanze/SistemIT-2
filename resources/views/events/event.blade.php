<!DOCTYPE html>
<html>

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
    <link rel="stylesheet" href="{{url('/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
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


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><i class="nav-icon fas fa-calendar-day"></i>&nbsp;Kalender Event</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Kalender Events</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div id='calendar'></div>
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
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->

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
    <script src="{{url('/css/fullcalendar.min.js')}}"></script>
    <script>
    $(document).ready(function() {
        
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            
            //Put your options and callbacks here
            //Make the event dragable, resizabe, change opacity
            editable: true,
            dragOpacity: .60,
            eventTextColor: '#000000',
            events : [
                
                @foreach($events as $event)
                {
                    id : '{{ $event->id }}',
                    title : "{!! $event->title !!}",
                    description : "{!! $event->description !!}",
                    start : "{!! $event->start !!}",
                    end : '{{ $event->end }}',
                    backgroundColor : '{{  $event->backgroundColor }}',
                    url : '{{ route('event.edit', $event->id) }}',
                    ajax : true,
                },
                @endforeach

            ],
            //Show the event entry form when a day is clicked
            dayClick: function(date, jsEvent, view) {
                //Change background color of day when it is clicked
                $(this).css('background-color', '#70d2ff');
                //Get the date that was clicked
                var date_clicked =  date.format();
                //Redirect to the new event entry form
                window.location.href = "{{URL::to('event')}}" + "/" + date_clicked;
            },
            eventClick: function(events, jsEvent, view) {
                $(this).css('background-color', '#ff0000');
            },
            eventDragStart: function(events, jsEvent, view) {
                $(this).css('background-color', '#00ff00');
            },
            // drop on a new date and submit to database
            eventDrop: function(events, delta, revertFunc, jsEvent, view) {
                
                swal({
                    title: "You moved the event. Save it?",
                    text: "You can move it as mush as you want.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then(function(willDelete){
                    if (willDelete) {
                        swal("Moved. Your event has been rescheduled.", {
                        icon: "success",
                        });
                
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            type:'POST',
                            url: '{{ route('update', 0) }}',
                            data:{
                                    id:events.id,
                                    description:events.description,
                                    start:events.start.format(),
                                    end:events.end.format(),
                                },
                            success: function(data){
                            }, 
                        });

                    } else {
                        swal("Your event has not been rescheduled.");
                        revertFunc();
                    }
                });   
            },
            eventResize: function(events, delta, revertFunc){
                swal({
                    title: "Changed Timeline. Save it?",
                    text: "You can expand it as far as you need to.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then(function(willDelete){
                    if (willDelete) {
                        swal("Moved! Your event has been rescheduled!", {
                        icon: "success",
                        });
                
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            type:'POST',
                            url: '{{ route('update', 0) }}',
                            data:{
                                    id:events.id, 
                                    description:events.description,
                                    start:events.start.format(),
                                    end:events.end.format()
                                },
                            success: function(data){
                            }, 
                        });
                        
                    } else {
                        swal("Your event has not been rescheduled.");
                        revertFunc();
                    }
                });   
            },
        })
    });
     //form event aktif
     $('#formevent').addClass('active');
</script>
    </body>
</html>