<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printout Data Software Client</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{url('/css/print.css')}}">
</head>

<body>
    <div class="container">
        <table>                
            @foreach ($softclients as $p)
            <caption>
                Pengelolaan Data Software Pada Client  {{ $p->nama_client}}
            </caption>
            <thead>
                <tr>
                    <td colspan="4">
                       <p> Masalah/Permintaan Software Client : {{ $p->r_sclient}}</p>
                       <p> Staff Client : {{ $p->n_sclient}}</p>
                       <p> Programmer : {{ $p->nama_pro}}</p>
                       <p> IT Support : {{ $p->nama_its}}</p>
                       <p> Tanggal Selesai : {{ $p->tgl_ssoftclient}}</p>
                        </p>
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
            @foreach($softclients2 as $p)
            <tfoot>
                <tr>
                    <td>{{ $p->d_sclient}}</td>
                    <td>{{ $p->c_fitur}}</td>
                    <td>{{ $p->nama_status}}</td>
                    <td>{{ $p->nama_progress}}</td>
                </tr>
            </tfoot>
            @endforeach
        </table>
    </div>
</body>

</html>