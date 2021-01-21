<table>
    <tr>
        <td><img src="admin0/logo-dark.png" alt=""></td>
    </tr>
</table>

<table class="table" style="border: 1px solid black">
    <thead>
        <tr>
            <th>NAMA LENGKAP</th>
            <th>JENIS KELAMIN</th>
            <th>AGAMA</th>
            <th>RATA-RATA NILAI</th>
        </tr>      
    </thead>
    <tbody>
        @foreach ($xsiswa as $s)
        <tr>
            <td>{{$s->nama_lengkap()}}</td>
            <td>{{$s->jk}}</td>
            <td>{{$s->agama}}</td>
            <td>{{$s->rataRataNilai()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>