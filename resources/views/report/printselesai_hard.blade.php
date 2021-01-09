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
            <caption>
               Pengelolaan Data Hardware Yang Selesai Pada Client
            </caption>        
            <thead>
               <tr>
                    <th>Detail Perbaikan</th>
                    <th>Jenis Komputer</th>
                    <th>Komponen Rusak</th>
                    <th>Status</th>
                    <th>Progress</th>
                    <th>Tgl Pembuatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hardware2 as $p)
                <tr>
                    <td>{{ $p->dm_hard }}</td>
                    <td>{{ $p->j_komputer}}</td>
                    <td>{{ $p->k_rusak }}</td>
                    <td>{{ $p->nama_status}}</td>
                    <td>{{ $p->nama_progress}}</td>
                    <td>{{ $p->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
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