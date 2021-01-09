<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printout Data Hardware</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{url('/css/print.css')}}">
</head>

<body>
    <div class="container">
        <table>
            @foreach($hardware as $p)
            <caption>
               Pengelolaan Data Hardware Pada Client {{ $p->nama_client}}
            </caption>        
            <thead>
                <tr>
                    <td colspan="5">
                           <p > Masalah Hardware : {{ $p->m_hard}}</p>
                           <p  > Nama Staff : {{ $p->i_staff}}</p>
                       
                    <p >IT Support Yang Mengerjakan : {{$p->nama_its}}</p>
                                
                        <p id="tgl_perbaikan" name="tgl_perbaikan" > Tgl Selesai Perbaikan : {{ $p->tgl_perbaikan}}</p>

                    </td>
                </tr>
                @endforeach
            </thead>
            <tbody>
                <tr>
                    <th>Detail Perbaikan</th>
                    <th>Jenis Komputer</th>
                    <th>Komponen Rusak</th>
                    <th>Status</th>
                    <th>Progress</th>
                </tr>
            </tbody>
            <tfoot>
                @foreach($hardware2 as $p)
                <tr>
                    <td>{{ $p->dm_hard }}</td>
                    <td>{{ $p->j_komputer}}</td>
                    <td>{{ $p->k_rusak }}</td>
                    <td>{{ $p->nama_status}}</td>
                    <td>{{ $p->nama_progress}}</td>
                </tr>
                @endforeach
            </tfoot>
        </table>
    </div>
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
</body>

</html>