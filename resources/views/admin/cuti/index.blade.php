@extends('admin.templates.default')
@section('content')

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">DATA CUTI</h3><br><br>
            <a href="{{ route('admin.cuti.create') }}" class="btn btn-primary">TAMBAH DATA CUTI</a>
        </div>
        <div class="box-body table-responsive">
            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='1'>ID</th>
                            <th width='20' class="text-uppercase text-secondary text-dark text-xxs font-weight-bolder opacity-7 ps-2">COVER</th>
                            <th width='10'>NAMA CUTI</th>
                            <th width='5'>KETERANGAN</th>
                            <th width='20' class="text-uppercase text-secondary text-dark text-xxs font-weight-bolder opacity-7 ps-2">TANGGAL CUTI</th>
                            <th width='20' class="text-uppercase text-secondary text-dark text-xxs font-weight-bolder opacity-7 ps-2">TANGGAL SELESAI CUTI</th>
                            <th width='20' class="text-uppercase text-secondary text-dark text-xxs font-weight-bolder opacity-7 ps-2">LAMA</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuti as $c )
                            <tr>
                                <td width='1'>  {{ $loop-> index +1 }} </td>
                                <td ><img class="img-responsive" src="{{url('/assets/covers/'. $c->cover)}}"> </td>
                                <td width='20'> {{ $c->nama_cuti  }}  </td>
                                <td width='20'> {{ $c->keterangan  }}  </td>
                                <td width='20'> {{ $c->tanggal_cuti  }}  </td>
                                <td width='20'> {{ $c->tanggal_selesai_cuti  }}  </td>
                                <td width='20'> {{ $c->lama_cuti  }}  </td>
                                <td class="text-center" width='160'>
                                    <a href="{{ route('admin.cuti.detail', $c->cuti_id) }}" class="btn btn-info">DETAIL</a>
                                    <a href="{{ route('admin.cuti.edit', $c->cuti_id) }}" class="btn btn-warning">EDIT</a>
                                    <form action="{{ route('admin.cuti.destroy', $c->cuti_id) }}" method="post" style="display:inline;">
                                        {{ csrf_field() }}
                                        {{ method_field ('delete')}}
                                        <button type="submit"  class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">DELETE</button>
                                    </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')
    <script>
        $(function () {
            $('#dataTable').DataTable({



            });
        });
    </script>
@endpush



{{-- @push('scripts')
<script>
    $(function () {
        $('#dataTable').DataTable({

    });
</script>
@endpush --}}





 {{-- <script>
//     $(function () {
//         $('#dataTable').DataTable({
//             processing: true,
//             serverSide: true,
//             ajax: '{{ route('admin.cuti.data') }}',
//             columns: [
//                 //{ data: 'id'},
//                 { data: 'DT_RowIndex', orderable: false, searchable : false}, 
//                 { data: 'nama'},
//                 { data: 'keterangan'},
//                 { data: 'tanggal_cuti'},
//                 { data: 'tanggal_selesai_cuti'},
//                 { data: 'lama_cuti'},
//                 { data: 'sisa_cuti'},
//                 { data: 'action'},
//             ]
//         });
//     });
// </script> --}}