@extends('admin.templates.default')
@section('content')

<div class="box">
    <div class="box-header">
        <h2 class="box-title">EDIT DATA BIS </h2>
    </div>

        <div class="box-body">
            <form action="{{ route('admin.bis.update', $bis->bis_id) }}" method="POST" enctype="multipart/form-data">
             @csrf
             @method("PUT")
             {{-- <input type="hidden" name="id_produk" value="{{ $produk->produk_id }}"> --}}
            <div class="form-group @error('jumlah') has-error @enderror">
                <label for="">JUMLAH</label>
                <!-- //value="{{ old('jumlah')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                <input type="text" name="jumlah" class="form-control"
                value="{{ $bis->jumlah ?? old('jumlah') }}">
                @error('jumlah')
                    <span class="help-block">{{ $message}}</span>
                @enderror
            </div>

            <div class="form-group @error('jenis_bis') has-error @enderror">
                <label for="">JENIS BIS</label>
                <!-- //value="{{ old('jenis_bis')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                <input type="text" name="jenis_bis" class="form-control"
                value="{{ $bis->jenis_bis ?? old('jenis_bis') }}">
                @error('jenis_bis')
                    <span class="help-block">{{ $message}}</span>
                @enderror
            </div>

            {{-- <div class="form-group @error('jumlah') has-error @enderror">
                <label for="inputPassword3" class="col-sm-2 control-label">JUMLAH PESERTA</label>
                    <div class="col-sm-10">
                        <input type="text" name="jumlah" class="form-control" id="inputPassword3" 
                        value="{{ $jaran->jumlah ?? old('jumlah') }}" >
                            @error('jumlah')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
            </div>

            <div class="form-group @error('jenis_bis') has-error @enderror">
                <label for="inputPassword3" class="col-sm-2 control-label">JENIS BIS</label>
                    <div class="col-sm-10">
                        <input type="text" name="jenis_bis" class="form-control" id="inputPassword3" 
                        value="{{ $jaran->jenis_bis ?? old('jenis_bis') }}">
                            @error('jenis_bis')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>
            </div> --}}

        
            <div class="form-group">
                <input type="hidden" name="bis_id" value="{{$bis->bis_id}}">
                <input type="submit" value="Update" class ="btn btn-primary">
                <button type="reset" class="btn btn-warning">Ulang</button>
                <a href="{{ route('admin.bis.index') }}" class="btn btn-danger">Kembali</a>
            </div>

            </form>
        </div>
</div>

@endsection



