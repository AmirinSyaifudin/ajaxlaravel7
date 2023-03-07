@extends('admin.templates.default')

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="box-title">ADD CUTI</h2>
        </div>

            <div class="box-body">
                <form action="{{ route('admin.cuti.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="form-group @error('nama_cuti') has-error @enderror">
                        <label for="">NAMA CUTI</label>
                        <!-- //value="{{ old('nama_cuti')}}"  , Validasi untuk tetap menampilkan nilai di form-->
                        <input type="text" name="nama_cuti" class="form-control" placeholder="Masukkan nama cuti " value="{{ old('nama_cuti') }}" required> 
                        @error('nama_cuti')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    {{-- <div class="form-group>
                        <label for="">NAMA KARYAWAN</label>
                        <select name="karyawan_id" id="validationCustom03" class="form-control select2">
                            @foreach ($karyawan as $ky)
                                    <option value="{{ $ky->karyawan_id }}">{{ $ky->nama }}</option>
                            @endforeach
                            @error('karyawan')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                        </select>
                    </div> --}}


                    <div class="form-group @error('keterangan') has-error @enderror">
                        <label for="">KETERANGAN </label>
                        <textarea type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan"
                            value="{{ old('keterangan') }}">
                            @error('keterangan')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                        </textarea>
                    </div>

                    <div class="form-group @error('cover') has-error @enderror">
                        <label for="">COVER</label>
                        <input type="file" name="cover" class="form-control" required>
                        @error('cover')
                            <span class="help-block">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('sisa_cuti') has-error @enderror">
                        <label for="validationCustom05">SISA CUTI</label>
                            <input type="number" name="sisa_cuti" class="form-control" 
                            value="{{ old('sisa_cuti') }}" id="validationCustom05" required>
                            @error('sisa_cuti')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 mb-3">
                          <label for="validationCustom03">TANGGAL MULAI CUTI</label>
                          <input type="date" name="tanggal_cuti" class="form-control" 
                          value="{{ old('tanggal_cuti') }}" id="validationCustom03" required>
                            @error('tanggal_cuti')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                          <div class="invalid-feedback">
                            Tanggal mulai cuti
                          </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">TANGGAL SELESAI CUTI</label>
                            <input type="date" name="tanggal_selesai_cuti" class="form-control" 
                            value="{{ old('tanggal_selesai_cuti') }}" id="validationCustom03" required>
                                @error('tanggal_selesai_cuti')
                                    <span class="help-block">{{ $message}}</span>
                                @enderror
                            <div class="invalid-feedback">
                              Tanggal akhir cuti
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                          <label for="validationCustom05">LAMA CUTI</label>
                            <input type="number" name="lama_cuti" class="form-control" 
                            value="{{ old('lama_cuti') }}" id="validationCustom05" required>
                                @error('lama_cuti')
                                    <span class="help-block">{{ $message}}</span>
                                @enderror
                                <div class="invalid-feedback">
                                    Silahkan input berapa lama cuti
                                </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Tambah" class ="btn btn-primary">
                        <button type="reset" class="btn btn-warning">Ulang</button>
                        <a href="{{ route('admin.cuti.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- CK Editor --}}
@section('js')
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection

@push('select2css')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css')}}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

    <script>
        $('.select2').select2();
    </script>
@endpush

