@extends('admin.templates.default')
@section('content')
<h1> DATA EDIT FUNGSI TERBILANG</h1>
<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
            <center> <h3 class="box-title" style="text-transform: uppercase;">Silahkan input data EDIT </h3><br><br> </center>
            </div>
            <div class="box-body" onload="functionTimer()">
                        <center>
                        <form action="{{ route('admin.terbilang.update', $terbilang->terbilang_id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="max-width:500px">
                            @csrf
                            @method("PUT")
                            <div class="form-group @error('code_barang') has-error @enderror">
                                <label for="inputEmail3" class="col-sm-2 control-label">KODE BARANG OTOMATIS</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="code_barang" class="form-control" id="inputEmail3"
                                        value="{{ $terbilang->code_barang ?? old('code_barang') }}" readonly>
                                            @error('code_barang')
                                                <span class="help-block">{{ $message}}</span>
                                            @enderror
                                    </div>
                            </div>
        
                            <div class="form-group @error('nama_barang') has-error @enderror">
                                <label for="inputPassword3" class="col-sm-2 control-label">NAMA BARANG</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_barang" class="form-control" id="inputPassword3" 
                                        value="{{ $terbilang->nama_barang ?? old('nama_barang') }}" placeholder="Isian Nama Barang">
                                            @error('nama_barang')
                                                <span class="help-block">{{ $message}}</span>
                                            @enderror
                                    </div>
                            </div>

                            <div class="form-group @error('qty') has-error @enderror">
                                <label for="inputPassword3" class="col-sm-2 control-label">QUANTITY</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="qty" class="form-control" id="inputPassword3" 
                                        value="{{ $terbilang->qty ?? old('qty') }}" placeholder="">
                                            @error('qty')
                                                <span class="help-block">{{ $message}}</span>
                                            @enderror
                                    </div>
                            </div>
        
                            <div class="form-group @error('harga') has-error @enderror">
                                <label for="inputPassword3" class="col-sm-2 control-label">HARGA</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="harga" class="form-control" id="inputPassword3" 
                                        value="{{ $terbilang->harga ?? old('harga') }}" placeholder="Isikan Harga Barang">
                                            @error('harga')
                                                <span class="help-block">{{ $message}}</span>
                                            @enderror
                                    </div>
                            </div>
{{-- 
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <input type="hidden" name="terbilang_id" value="{{$terbilang->terbilang_id}}">
                                <input type="submit" value="Update" class ="btn btn-primary">
                                <button type="reset" class="btn btn-warning">Ulang</button>
                                <a href="{{ route('admin.terbilang.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                        </center>
        </div>
    </div>
@endsection







