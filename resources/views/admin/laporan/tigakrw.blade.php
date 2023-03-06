@extends('admin.templates.default')
@section('content')
<h1>3 DATA KARYAWAN PERTAMA KALI BERGABUNG </h1>

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">LAPORAN 3 DATA KARYAWAN PERTAMA KALI BERGABUNG</h3><br><br>

            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>ID</th>
                            <th width='20'>NAMA</th>
                            <th width='5'>TANGGAL BERGABUNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawan as $kky)
                            <tr>
                                <td>{{ $loop-> index +1 }}</td>
                                <td>{{ $kky->nama }} </>
                                <td>{{ $kky->tanggal_bergabung }} </td>
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

