<table class="table" style="border:3px solid #ddd">
    <thead>
        <tr>
            <th>NO INDUK</th>
            <th>NAMA LENGKAP</th>
            <th>ALAMAT</th>
            <th>TANGGAL LAHIR</th>
            <th>TANGGAL BERGABUNG</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $karyawan as $p )
        <tr>
            <th>{{ $p->no_induk }}</th>
            <th>{{ $p->nama }}</th>
            <th>{{ $p->alamat }}</th>
            <th>{{ $p->tanggal_lahir }}</th>
            <th>{{ $p->tanggal_bergabung }}</th>
        </tr>
        @endforeach
    </tbody>
</table>