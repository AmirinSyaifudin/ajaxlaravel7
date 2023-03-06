@extends('admin.templates.default')
@section('content')
<h1>DATA AJAX KARYAWAN</h1>
<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">DATA KARYAWAN APLIKASI</h3><br><br>
            <a class="btn btn-success" href="javascript:void(0)" id="createNewKaryawan">ADD DATA KARYAWAN</a>
            <a href="{{ route('admin.karyawan.exportExcel') }}" class="btn btn-primary">EXPORT EXCEL</a>
            <a href="{{ route('admin.karyawan.exportPdf') }}" class="btn btn-primary">EXPORT PDF</a>
        </div>
        <div class="box-body table-responsive">
            <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        {{-- <th width='5'>ID</th> --}}
                        <th width='20'>NO INDUK</th>
                        <th >NAMA</th>
                        <th style="text-align: center">NAMA CUTI</th>
                        <th style="text-align: center">EMAIL</th>
                        <th style="text-align: center">JENIS KELAMIN</th>
                        <th style="text-align: center" width='20'>FOTO</th>
                        <th style="text-align: center">ALAMAT</th>
                        <th >TGL LAHIR</th>
                        <th >TGL BERGABUNG</th>
                        <th style="text-align: center" width='300px'>ACTION</th>
                    </tr>
                </thead>
                {{-- <tbody>
                </tbody> --}}
            </table>
        </div>
    </div>

{{-- create ajax --}}
<div class="modal fade" id="ajaxModel" aria-hidden="true">
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
                    {{-- <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">JENIS KELAMIN</label>
                            <div class="col-sm-5">
                                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1" maxlength="50" required>
                                    <option value="Laki-laki"{{(old('jenis_kelamin') == 'Laki-laki') ? ' selected' : ''}} maxlength="50">Laki-Laki</option>
                                    <option value="Perempuan"{{(old('jenis_kelamin') == 'Perempuan') ? ' selected' : ''}} maxlength="50">Perempuan</option>
                                </select>
                            </div>
                    </div> --}}
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
</div>

{{-- editajax  --}}
<div class="modal fade" id="ajaxModelEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="updatekaryawanForm" name="karyawanForm" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="karyawan_id" id="karyawan_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">NO INDUK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_induk_id" name="no_induk" 
                                placeholder="Enter No Induk" value="" maxlength="50" required="">
                            </div>
                    </div>       
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">KARYAWAN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="karyawan" name="nama" 
                                placeholder="Enter Nama Provinsi" value="" maxlength="50" required="">
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
                        <label for="name" class="col-sm-2 control-label">EMAIL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email_id" name="email" 
                                placeholder="Enter Alamat Email" value="" maxlength="50" required>
                            </div>
                    </div> 
                    {{-- <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">JENIS KELAMIN</label>
                        <div class="col-sm-10">
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1" maxlength="50" required>
                                <option value="Laki-laki"{{(old('jenis_kelamin') == 'Laki-laki') ? ' selected' : ''}} maxlength="50">Laki-Laki</option>
                                <option value="Perempuan"{{(old('jenis_kelamin') == 'Perempuan') ? ' selected' : ''}} maxlength="50">Perempuan</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">JENIS KELAMIN</label>
                            <div class="col-sm-10">
                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki" required="true"> Laki-laki
                                <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan"> Perempuan
                            </div>
                    </div> 
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">UPDATE FOTO</label>
                            <div class="col-sm-5">
                                <input type="file" name="image" class="form-control" 
                                placeholder="" value="" required>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">TANGGAL LAHIR</label>
                            <div class="col-sm-5">
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" 
                                placeholder="" value=""  required="">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">TANGGAL BERGABUNG</label>
                            <div class="col-sm-5">
                                <input type="date" name="tanggal_bergabung" id="tanggal_bergabung" class="form-control" 
                                placeholder="" value=""  required="">
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ALAMAT</label>
                            <div class="col-sm-10">
                                <textarea id="alamat-edit" name="alamat" required="" 
                                placeholder="Enter Keterangan" class="form-control"></textarea>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id" value="" id="karyawan_id_edit">
                            <button type="submit" class="btn btn-primary"value="create">UPDATE KARYAWAN</button>
                            <button type="button" class="btn btn-info" data-dismiss="modal">
								<i class="fa fa-times"></i> Closee
							</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- detailajax  --}}
<div class="modal fade" id="ajaxModelDetail" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="updatekaryawanForm" name="karyawanForm" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="karyawan_id" id="karyawan_id">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">NO INDUK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_induk_id" name="no_induk" 
                            placeholder="Enter No Induk" value="" maxlength="50" required="">
                        </div>
                </div>       
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">KARYAWAN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="karyawan" name="nama" 
                            placeholder="Enter Nama Provinsi" value="" maxlength="50" required="">
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
                    <label for="name" class="col-sm-2 control-label">EMAIL</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email_id" name="email" 
                            placeholder="Enter Alamat Email" value="" maxlength="50" required>
                        </div>
                </div>   
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">JENIS KELAMIN</label>
                        <div class="col-sm-10">
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki" required="true"> Laki-laki
                            <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan"> Perempuan
                        </div>
                </div> 
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">UPDATE FOTO</label>
                        <div class="col-sm-5">
                            <input type="file" name="image" class="form-control" 
                            placeholder="" value="" required>
                        </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">TANGGAL LAHIR</label>
                        <div class="col-sm-5">
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" 
                            placeholder="" value=""  required="">
                        </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">TANGGAL BERGABUNG</label>
                        <div class="col-sm-5">
                            <input type="date" name="tanggal_bergabung" id="tanggal_bergabung" class="form-control" 
                            placeholder="" value=""  required="">
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ALAMAT</label>
                        <div class="col-sm-10">
                            <textarea id="alamat-edit" name="alamat" required="" 
                            placeholder="Enter Keterangan" class="form-control"></textarea>
                        </div>
                </div>
               <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id" value="" id="detail_id_edit">
                        {{-- <button type="submit" class="btn btn-primary"value="create">UPDATE KARYAWAN</button>
                            --}}
                            <button type="button" class="btn btn-info" data-dismiss="modal">
								<i class="fa fa-times"></i> Closee
							</button>
                        {{-- <button  class="btn btn-info" id="">Kembali</button> --}}
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
                            ajax: '{{ route('admin.karyawan.index') }}',
                            columns: [
                                // { data: 'DT_RowIndex', orderable: false, searchable : false},
                                {data: 'no_induk', name: 'no_induk'},
                                {data: 'nama', name: 'nama'},
                                {data: 'nama_cuti', name: 'nama_cuti'},
                                {data: 'email', name: 'email'},
                                {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                                {data: 'image', name: 'image', orderable: false},
                                {data: 'alamat', name: 'alamat'},
                                {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                                {data: 'tanggal_bergabung', name: 'tanggal_bergabung'},
                                {data: 'action', name: 'action', orderable: false, searchable: false},
                            ]
                        }); 
                
                        // create karyawan
                        $('#createNewKaryawan').click(function () {
                            $('#saveBtn').val("create-karyawan");
                            $('#karyawan_id').val('');
                            $('#karyawanForm').trigger("reset");
                            $('#modelHeading').html("Create New Karyawan");
                            $('#ajaxModel').modal('show');
                        });
                    
                        //add proses karyawan
                        $('#karyawanForm').submit(function( e ) {
                            e.preventDefault();
                            //$(this).html('Save');
                                $.ajax({
                                    data: new FormData(this),
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    url: "{{ route('admin.karyawan.store') }}",
                                    type: "POST",
                                    dataType: 'json',
                                    success: function (data) {
                                        $('#karyawanForm').trigger("reset");
                                        $('#ajaxModel').modal('hide');
                                        table.draw();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                        $('#saveBtn').html('Save Changes');
                                    }
                                });

                                return false;
                        });

                        //DetailupdateprovinsiForm
                        $('#updatekaryawanForm').submit(function (e) {
                            e.preventDefault();
                            //$(this).html('Save');
                                $.ajax({
                                    data: new FormData(this),
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    url: "{{ route('admin.karyawan.update') }}",
                                    type: "POST",
                                    dataType: 'json',
                                    success: function (data) {
                                        $('#ajaxModelDetail').modal('hide');
                                        // $('#dataTable').DataTable().fnDestroy();
                                        //table.ajax.reload();
                                        table.draw();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                        $('#updatekaryawanForm').html('Save Changes');
                                    }
                                });
                        });
                        
                        //detail karyawan 
                        $('body').on('click', '.detail', function () {
                            $('#no_induk_id').val($(this).data('no_ind'));
                            $('#karyawan').val($(this).data('title'));
                            $('#email_id').val($(this).data('email_oke'));
                            $('#jenis_kelamin').val($(this).data('jenis_kelamin_id'));
                            $('#tanggal_lahir').val($(this).data('date'));
                            $('#tanggal_bergabung').val($(this).data('date'));
                            $('#alamat-edit').val($(this).data('alamat'));
                            $('#karyawan_id_detail').val($(this).data('id'));
                            $('#ajaxModelDetail').modal('show');
                            return false;
                        });

                        // edit karyawan
                        $('body').on('click', '.edit', function () {
                            $('#no_induk_id').val($(this).data('no_ind'));
                            $('#karyawan').val($(this).data('title'));
                            $('#email_id').val($(this).data('email_oke'));
                            $('#jenis_kelamin').val($(this).data('jenis_kelamin_id'));
                            $('#tanggal_lahir').val($(this).data('date'));
                            $('#tanggal_bergabung').val($(this).data('date'));
                            $('#alamat-edit').val($(this).data('alamat'));
                            $('#karyawan_id_edit').val($(this).data('id'));
                            $('#ajaxModelEdit').modal('show');
                            return false;
                        });

                        //updateprovinsiForm
                        $('#updatekaryawanForm').submit(function (e) {
                            e.preventDefault();
                            //$(this).html('Save');
                                $.ajax({
                                    data: new FormData(this),
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    url: "{{ route('admin.karyawan.update') }}",
                                    type: "POST",
                                    dataType: 'json',
                                    success: function (data) {
                                        $('#ajaxModelEdit').modal('hide');
                                        // $('#dataTable').DataTable().fnDestroy();
                                        //table.ajax.reload();
                                        table.draw();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                        $('#updatekaryawanForm').html('Save Changes');
                                    }
                                });
                        });

                        //delete
                        $('body').on('click', '.deleteKaryawan', function () {
                            var karyawan_id = $(this).data("karyawan_id");
                            $confirm =  confirm("Yakin data ingin di hapus !!!");
                            if($confirm == true ){
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin.karyawan.destroy') }}",
                                    data: {id:karyawan_id,_method:'delete'},
                                    function (data) {
                                        // table.draw();
                                        //console.log('kene');
                                        $('#dataTable').DataTable().fnDestroy();
                                        datatable();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                    }
                                });
                                table.draw();
                            }
                        });
                    
            }); 

    </script>
@endpush