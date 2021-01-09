<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printout Data Jaringan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{url('/css/print.css')}}">
</head>

<body>
    <div class="container">
        <table>
            @foreach ($networks as $p)
            <caption>
                Pengelolaan Data Jaringan Pada Client {{ $p->nama_client}}
            </caption>
            <thead>
                <tr>
                    <td colspan="5">
                        <p>Permintaan Pemasangan : {{ $p->r_net }}</p>
                           <p> Staff Client : {{ $p->i_Leader }}</p>
                           <p> IT Support yang mengerjakan : {{ $p->nama_its}}</p>
                           <p> Tanggal Mulai Pemasangan : {{ $p->tgl_mpemasangan }}</p>
                           <p> Tanggal Selesai Pemasangan : {{ $p->tgl_apemasangan }}</p>
                        </p>
                    </td>
                </tr>
            </thead>
            @endforeach
            <tbody>
                <tr>
                  <th>Detail Pemasangan</th>
                  <th>Jumlah Pemasangan</th>
                  <th>Letak Pemasangan</th>
                  <th>Status</th>
                  <th>Progress</th>
                </tr>
            </tbody>
            @foreach ($networks2 as $p)
            <tfoot>
                <tr>
                    <td>{{ $p->d_net }}</td>
                    <td>{{ $p->j_pemasangan}}</td>
                    <td>{{ $p->l_pemasangan }}</td>
                    <td>{{ $p->nama_status}}</td>
                    <td>{{ $p->nama_progress}}</td>
                </tr>
            </tfoot>
            @endforeach
        </table>
    </div>
</body>

</html>