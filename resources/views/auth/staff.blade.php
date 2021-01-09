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
                                <h1><i class="nav-icon fas fa-layer-group"></i>&nbsp;Staff Baru
                            </div>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Master Staff</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <button type="button" class="btn-addModal btn btn-success float-right" data-toggle="modal"
                                data-target="#addModal" title="Tambah Baru"><i class="nav-icon fas fa-file">&nbsp;Tambah
                                    Baru</i></button>
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
                                <h3 class="card-title">Master Staff</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                {{-- Tabel--}}
                                <table id="example1" class="table table-noborder table-stripedw">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">
                                                #
                                            </th>
                                            <th style="width: 15%">
                                                Nama Staff
                                            </th>
                                            <th style="width: 15%">
                                                No Handphone
                                            </th>
                                            <th style="width: 15%">
                                                Email
                                            </th>
                                            <th style="width: 15%">
                                                Departemen
                                            </th>
                                            <th style="width: 15%">
                                                Tgl Pembuatan
                                            </th>
                                            <th style="width: 6%">

                                            </th>
                                            <th style="width: 6%">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $p)
                                        <tr>
                                            <td>
                                                #
                                            </td>
                                            <td>
                                                {{ $p->name }}
                                            </td>
                                            <td>
                                                {{ $p->nohp }}
                                            </td>
                                            <td>
                                                {{ $p->email}}
                                            </td>
                                            <td>
                                                {{ $p->departemen}}
                                            </td>
                                            <td>
                                                {{ $p->created_at }}
                                            </td>
                                            <td>
                                                <button class="edit-modal btn-sm btn-info" data-id="{{$p->id}}"
                                                    data-name="{{$p->name}}" data-nohp="{{$p->nohp}}" data-departemen="{{$p->departemen}}"
                                                    data-email="{{$p->email}}" data-role_id="{{$p->role_id}}"> <i
                                                        class="nav-icon fas fa-edit">&nbsp;Ubah</i>
                                                </button>
                                            </td>
                                            <td class="project-actions text-left">
                                                <form action="{{route('user.destroy',['id'=>$p->id])}}" method="POST">
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
                <form action="{{ route('user.store')}}" method="post" enctype="multipart/form-data" id="form-data">
                    {{ csrf_field() }}
                    <!-- heading modal -->
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                    </div>
                    <!-- body modal -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputIDSt" hidden>ID Staff</label>
                            <input type="text" id="id" name="id" class="form-control" hidden>
                        </div>
                        <div class="form-group">
                            <label for="inputNameSt">Nama Staff</label>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}"
                                onkeypress="return event.charCode < 48 || event.charCode  >57" required
                                autocomplete="name" autofocus required="required">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputStHandphone">No Handphone</label>
                            <input type="number" id="nohp" name="nohp" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="inputStEmail">Email</label>
                            <input type="text" id="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                required="required">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputStPassword">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" required="required">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputDep">Departemen</label>
                            <select class="custom-select" id="departemen" name="departemen" required="required">
                                <option value="">Select Departemen</option>
                                <option value="1">Administrator</option>
                                <option value="2">Owner</option>
                                <option value="3">IT Support</option>
                                <option value="4">Programmer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputDep">Access Type</label>
                            <select class="custom-select" id="role_id" name="role_id" required="required">
                                <option value="">Select Departemen</option>
                                @foreach ($role as $roles)
                                <option value="{{$roles->id}}">{{ $roles->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- footer modal -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
    <!-- Format Date -->
    <script>
        $(function () {
            $('#formstaff').addClass('active');
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

            $('.modal-title').text('Input Data Staff');
            $('.form-horizontal').show();
            $('#id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
            $('#nohp').val($(this).data('nohp'));
            $('#departemen').val($(this).data('dep'));
            $('#email').val($(this).data('email'));
            $('#password').val($(this).data('password'));
            $('#role_id').val($(this).data('role_id')).trigger('change');
            $('#addModal').modal('show');
        });
        // Add Data (Modal and function add data)
        $(document).on('click', '.btn-addModal', function () {

            $('.modal-title').text('Input Data Staff');
            $('.form-horizontal').show();
            $('#id').val('');
            $('#name').val('');
            $('#nohp').val('');
            $('#departemen').val('');
            $('#email').val('');
            $('#password').val('');
            $('#role_id').val('').trigger('change');
            $('#addModal').modal('show');
        });
    </script>
</body>

</html>