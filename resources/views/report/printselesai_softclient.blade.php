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
            <caption>
                Pengelolaan Data Software Yang Selesai Pada Client
            </caption>
            <thead>
                <tr>
                    <th>Detail Masalah/Request</th>
                    <th>Jenis Fitur</th>
                    <th>Status</th>
                    <th>Progress</th>
                    <th>Tanggal Pembuatan</th>
                </tr>
            </thead>                
            <tbody>
            @foreach($softclients2 as $p)
                  <tr>
                    <td>{{ $p->d_sclient}}</td>
                    <td>{{ $p->c_fitur}}</td>
                    <td>{{ $p->nama_status}}</td>
                    <td>{{ $p->nama_progress}}</td>
                    <td>{{ $p->created_at}}</td>
                  </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>