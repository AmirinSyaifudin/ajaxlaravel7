@extends('admin.templates.default')
@section('content')
<h1> DATA KARYAWAN CUTI LEBIH 1 KALI </h1>

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">LAPORAN DATA KARYAWAN CUTI LEBIH 1 KALI</h3><br><br>

            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>ID</th>
                            <th width='20'>NO INDUK</th>
                            <th width='5'>NAMA</th>
                            <th width='5'>TANGGAL CUTI</th>
                            <th width='5'>KETERANGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuti as $ct)
                            <tr>
                                <td>{{ $loop-> index +1 }}</td>
                                <td>{{ $ct->no_induk }} </td>
                                <td>{{ $ct->nama }} </td>
                                <td> {{ $ct->tanggal_cuti }} </td>
                                <td> {{ $ct->keterangan }} </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        $(function () {
            $('#dataTable').DataTable({






            });
        });
    </script>
@endpush

