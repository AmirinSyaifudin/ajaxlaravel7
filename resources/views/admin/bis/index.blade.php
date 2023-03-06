@extends('admin.templates.default')
@section('content')
<h1> DATA BUS</h1>
<!-- /.box-header -->
    <div class="box">
            <div class="box-header">
                    <center> 
                        <h3 class="box-title" style="text-transform: uppercase;">Silahkan input data </h3><br><br> 
                    </center>
                    <form action="{{ route('admin.bis.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data" style="max-width:500px">
                        @csrf
                        <div class="form-group @error('jumlah') has-error @enderror">
                            <label for="inputPassword3" class="col-sm-2 control-label">JUMLAH PESERTA</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jumlah" class="form-control" id="inputPassword3" 
                                    value="{{ old('jumlah') }}" placeholder="Input jumlah penumpang">
                                        @error('jumlah')
                                            <span class="help-block">{{ $message}}</span>
                                        @enderror
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <center>
                                    <tr>
                                        <td><input type="submit" value="Tambah" class="btn btn-primary"></td>
                                        <td><input type="reset" name="batal" class="btn btn-warning" value="RESET"></td>
                                    </tr>
                                </center>
                            </div>
                        </div>
                    </form>
            </div>

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width='5'>ID</th>
                                <th width='5'>JUMLAH PESERTA</th>
                                <th width='5'>JENIS BIS</th>
                                <th width='5'>NAPOL</th>
                                <th width='5'>WARNA BIS</th>
                                <th width='5'>NAMA SOPIR</th>
                                <th width='5'>NAMA KONDEKTUR</th>
                                <th width='5'> </th>
                                <th width='5'> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bis as $bs)
                                <tr>
                                    <td width='5'>  {{ $loop-> index +1 }} </td>
                                    <td width='20'> {{ $bs->jumlah }} </td>
                                    <td width='20'> {{ $bs->jenis_bis }}</td>
                                    <td width='20'> {{ $bs->napol }}</td> 
                                    <td width='20'> {{ $bs->warna }}</td> 
                                    <td width='20'> {{ $bs->nama_sopir }}</td> 
                                    <td width='20'> {{ $bs->nama_kondektur }}</td> 
                                    {{-- <td width='5'>  <a href="{{ route('admin.bis.edit', $bs->bis_id) }}" class="btn btn-warning">EDIT</a></td> --}}
                                    <td width='5'>  <a href="{{ route('admin.bis.edit', $bs->bis_id) }}" class="btn btn-warning">EDIT</a></td>
                                    <td width='5'>
                                        <form action="{{ route('admin.bis.destroy', $bs->bis_id) }}" method="post" style="display:inline;">
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

@push('scripts')
    <script>
        $(function () {
            $('#dataTable').DataTable({


            });
        });
    </script>
@endpush


