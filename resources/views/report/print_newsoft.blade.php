<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printout Data Software Baru</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{url('/css/print.css')}}">
</head>

<body>
    <div class="container">
        <table>
            <caption>
                Pengelolaan Data Software Baru
            </caption>               
            @foreach ($newsofts as $p)
            <thead>
                <tr>
                    <td colspan="4">
                        <p>Permintaan/Masalah : {{ $p->r_nsoft }}</p>
                        <p> Jenis Software : {{ $p->j_soft }}</p>
                        <p> Programmer : {{ $p->nama_pro}}</p>
                        <p> IT Support : {{ $p->nama_its}}</p>
                        <p> Tanggal Selesai : {{ $p->tgl_ssoft}}</p>
                    </td>
                </tr>
            </thead>               
            @endforeach
            <tbody>
                <tr>
                  <th>Detail Masalah/Request</th>
                  <th>Jenis Fitur</th>
                  <th>Status</th>
                  <th>Progress</th>
                </tr>
            </tbody>
            @foreach($newsofts2 as $p)
            <tfoot>
                <tr>
                    <td>{{ $p->d_nsoft }}</td>
                    <td>{{ $p->n_fitur }}</td>
                    <td>{{ $p->nama_status}}</td>
                    <td>{{ $p->nama_progress}}</td>
                </tr>
            </tfoot>
            @endforeach
        </table>
    </div>
</body>

</html>