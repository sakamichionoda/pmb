<html>
    <head>
        <title></title>
    </head>
    <body>
        <center>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Tahun</th>
                        <th>Sesi</th>
                        <th>Pendaftaran</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hasil as $item)
                        <tr>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jurusan}}</td>
                            <td>{{$item->tahun}}</td>
                            <td>{{$item->sesi}}</td>
                            <td>{{$item->status_pendaftaran}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </center>
    </body>
</html>
