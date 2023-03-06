@extends('admin.templates.default')
@section('content')
<h1> DATA GANJIL GENAP</h1>
<!-- /.box-header -->        
        <div class="box">
            <div class="box-header table-responsive">
                <div class="row">
                    <center> 
                        <h3 class="box-title" style="text-transform: uppercase;">Silahkan input data </h3><br><br> 
                    </center>
                    <center>
                        <form action="{{ route('admin.ganjilgenap.store') }}"  method="POST" enctype="multipart/form-data" class="form-horizontal" style="max-width:500px">
                            @csrf
                            <div class="form-group @error('napol') has-error @enderror">
                                <label for="inputEmail3" class="col-sm-2 control-label">NAPOL = </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="napol" class="form-control" id="inputEmail3" 
                                        value="{{ old('napol') }}" placeholder="Silahkan masukkan Napol tanpa menggunakan spasi !!!">
                                        @error('napol')
                                            <span class="help-block">{{ $message}}</span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <tr>
                                        <td><input type="submit" class="btn btn-primary" value="SIMPAN"></td>
                                        <td><input type="reset" name="batal" class="btn btn-warning" value="RESET"></td>
                                    </tr>
                                </div>
                            </div> 
                        </form>
                    </center>
                </div>
        
                {{-- <div class="box-body"> --}}
                <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width='5' class="text-center">ID</th>
                                    {{-- <th width='5'>TANGGAL</th> --}}
                                    <th width='5' class="text-center">TANGGAL MULAI</th>
                                    <th width='5' class="text-center">NAPOL</th>
                                    <th width='5' class="text-center">STATUS</th>
                                    <th width='5' class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ganjilgenap as $jangkrik)
                                    <tr>
                                        <td width='5' class="text-center">  {{ $loop-> index +1 }} </td>
                                        {{-- <td width='5'>  {{ date('H:i:s | l-d-M-Y',strtotime($jangkrik->tanggal_mulai)) }}</td> --}}
                                        <td scope="row" class="text-center"> {{ tanggal_indonesia($jangkrik->created_at)}} </td>
                                        {{-- <td width='5'>  {{ date('H:i:s | l-d-M-Y',strtotime($jangkrik->created_at)) }}</td> --}}
                                        <td width='20' class="text-center"> {{ $jangkrik->napol }}</td>
                                        <td width='20' class="text-center"> <a class="btn btn-info">{{ $jangkrik->status }}</a></td>
                                        <td width='5' class="text-center">
                                            <form action="{{ route('admin.ganjilgenap.destroy', $jangkrik->ganjilgenap_id) }}" method="post" style="display:inline;">
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

