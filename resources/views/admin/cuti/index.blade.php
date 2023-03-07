@extends('admin.templates.default')
@section('content')

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">DATA CUTI</h3><br><br>
            {{-- <a href="{{ route('admin.cuti.create') }}" class="btn btn-primary">TAMBAH DATA CUTI</a> --}}
            <a class="btn btn-success" href="javascript:void(0)" id="createNewCuti">ADD DATA CUTI</a>
           
        </div>
        <div class="box-body table-responsive">
            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='1'>ID</th>
                            <th width='10'>NAMA CUTI</th>
                            <th width='20' class="text-uppercase text-secondary text-dark text-xxs font-weight-bolder opacity-7 ps-2">COVER</th>
                            <th width='20' class="text-uppercase text-secondary text-dark text-xxs font-weight-bolder opacity-7 ps-2">TANGGAL CUTI</th>
                            <th width='20' class="text-uppercase text-secondary text-dark text-xxs font-weight-bolder opacity-7 ps-2">TANGGAL SELESAI CUTI</th>
                            <th width='20' class="text-uppercase text-secondary text-dark text-xxs font-weight-bolder opacity-7 ps-2">LAMA</th>
                            <th width='20' class="text-uppercase text-secondary text-dark text-xxs font-weight-bolder opacity-7 ps-2">SISA CUTI</th>
                            <th width='5'>KETERANGAN</th>
                            <th style="text-align: center" width='80px'>ACTION</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                    </tbody> --}}
            </table>
        </div>
    </div>

    {{-- create ajax --}}
{{-- <div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="karyawanForm" class="form-horizontal" enctype="multipart/form-data">
                   <input type="hidden" name="karyawan_id" id="karyawan_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">NO INDUK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_induk" name="no_induk" 
                                placeholder="Enter No Induk" value="" maxlength="50" required>
                            </div>
                    </div>  
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">NAMA CUTI</label>
                            <div class="col-sm-8">
                                <select name="cuti_id" id="cuti_id" class="form-control select2">
                                    @foreach ($cuti as $c)
                                        <option value="{{ $c->cuti_id}}">{{ $c->nama_cuti}}</option>
                                    @endforeach
                                    @error('cuti_id')
                                        <span class="help-block">{{ $message}}</span>
                                    @enderror
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">NAMA KARYAWAN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" 
                                placeholder="Enter Nama Karyawan" value="" maxlength="50" required>
                            </div>
                    </div> 
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">EMAIL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" 
                                placeholder="Enter Alamat Email" value="" maxlength="50" required>
                            </div>
                    </div> 
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">JENIS KELAMIN</label>
                            <div class="col-sm-5">
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki"{{(old('jenis_kelamin') == 'Laki-laki') ? ' selected' : ''}} maxlength="50">Laki-Laki</input>
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan"{{(old('jenis_kelamin') == 'Perempuan') ? ' selected' : ''}} maxlength="50">Perempuan</input>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">FOTO</label>
                            <div class="col-sm-5">
                                <input type="file" name="image" class="form-control" required>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">TANGGAL LAHIR</label>
                            <div class="col-sm-5">
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">TANGGAL BERGABUNG</label>
                            <div class="col-sm-5">
                                <input type="date" id="tanggal_bergabung" name="tanggal_bergabung" class="form-control" required>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ALAMAT</label>
                            <div class="col-sm-10">
                                <textarea id="alamat" name="alamat" required
                                placeholder="Enter Keterangan" class="form-control"></textarea>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary" id="saveBtn" >SIMPAN</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal">
								<i class="fa fa-times"></i> Closee
							</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}


@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')

<script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>      
<script src="{{ asset('/assets/plugins/bs.notify.min.js')}}"></script>

@include('admin.templates.partials.alerts')

<script type="text/javascript">
    $(function (){

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                });
                    // Index
                    var table = $('#dataTable').DataTable({
                        "pageLength": 10,
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route('admin.cuti.index') }}',
                        columns: [
                            { data: 'DT_RowIndex', orderable: false, searchable : false},
                            // {data: 'no_induk', name: 'no_induk'},
                            {data: 'nama_cuti', name: 'nama_cuti'},
                            {data: 'image', name: 'image', orderable: false},
                            {data: 'tanggal_cuti', name: 'tanggal_cuti'},
                            {data: 'tanggal_selesai_cuti', name: 'tanggal_selesai_cuti'},
                            {data: 'lama_cuti', name: 'lama_cuti'},
                            {data: 'sisa_cuti', name: 'sisa_cuti'},
                            {data: 'keterangan', name: 'keterangan'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    }); 
            
                
        }); 

</script>
@endpush

