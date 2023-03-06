@extends('admin.templates.default')
@section('content')
<h1> Data User </h1>

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">DATA PROVINSI</h3><br><br>

            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>ID</th>
                            <th width='20'>NAMA USER</th>
                            <th width='5'>EMAIL USER</th>
                            <th width='5'>JUMLAH TRANSAKSI</th>
                            <th width='5'>BERGABUNG</th>
                        </tr>
                    </thead>
                    <tbody>
{{--
                        @php
                            $page = 1;
                                if (request()->has('page')) {
                                    $page = request('page');
                                }
                            $no = (env('PAGINATION_ADMIN') * $page) - (env('PAGINATION_ADMIN') -1);
                         @endphp  --}}

                         @foreach ($transaksi as $use)
                            <tr>
                                <td>{{ $loop -> index +1 }}</td>
                                <td>{{ $use->name }}</td>
                                <td>{{ $use->email }}</td>
                                <td> </td>
                                <td> {{ $use->created_at }}</td>
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

