@extends('admin.templates.default')
@section('content')
<h1>PROVINSI</h1>
 <!-- /.box-header -->
 <div class="box">
        <div class="box-header">
              <h3 class="box-title">DATA PROVINSI</h3><br><br>
              <a class="btn btn-success" href="javascript:void(0)" id="createNewProvinsi">Tambah Data Provinsi</a>
         </div>
         <div class="box-body table-responsive">
            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">NAMA PROVINSI</th>
                            <th style="text-align: center">TANGGAL</th>
                            <th style="text-align: center">KETERANGAN PROVINSI</th>
                            <th style="text-align: center" width="180px">ACTION</th>
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
                <form id="provinsiForm" name="provinsiForm" class="form-horizontal">
                   <input type="hidden" name="provinsi_id" id="provinsi_id">
                   <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">PROVINSI</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" 
                            placeholder="Enter Nama Provinsi" value="" maxlength="50" required>
                        </div>
                    </div>               
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">TANGGAL</label>
                        <div class="col-sm-12">
                            <input type="date" name="tanggal_jadi_provinsi" class="form-control" 
                            placeholder="" value=""  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">KETERANGAN</label>
                        <div class="col-sm-12">
                            <textarea id="keterangan" name="keterangan" required
                            placeholder="Enter Keterangan" class="form-control">
                        </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Simpan</button>
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
                <h4 class="modal-title" id="modHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="updateprovinsiForm" name="provinsiForm" class="form-horizontal">
                   <input type="hidden" name="provinsi_id" id="provinsi_id">
                   <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">PROVINSI</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="provinsi" name="nama_provinsi" 
                            placeholder="Enter Nama Provinsi" value="" maxlength="50" required>
                        </div>
                    </div>               
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">TANGGAL</label>
                        <div class="col-sm-12">
                            <input type="date" name="tanggal_jadi_provinsi" id="tanggal_jadi" class="form-control" 
                            placeholder="" value=""  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">KETERANGAN</label>
                        <div class="col-sm-12">
                            <textarea id="keterangan-edit" name="keterangan" required 
                            placeholder="Enter Keterangan" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            {{ method_field('PUT') }}
                            <input type="hidden" name="id" value="" id="provinsi_id_edit">
                            <button type="submit" class="btn btn-primary"value="create">Simpan</button>
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

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bs.notify.min.js')}}"></script>

    @include('admin.templates.partials.alerts')
    <!-- //jquery -->
    
    <script type="text/javascript">
        $(function ()
        {

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
                            ajax: '{{ route('admin.provinsi.index') }}',
                            columns: [
                                { data: 'DT_RowIndex', orderable: false, searchable : false}, 
                                // {data: 'provinsi_id', name: 'provinsi_id'},
                                {data: 'nama_provinsi', name: 'nama_provinsi'},
                                {data: 'tanggal_jadi_provinsi', name: 'tanggal_jadi_provinsi'},
                                {data: 'keterangan', name: 'keterangan'},
                                {data: 'action', name: 'action', orderable: false, searchable: false},
                            ]
                        }); 

                        // create 
                        $('#createNewProvinsi').click(function () {
                            $('#saveBtn').val("create-provinsi");
                            $('#provinsi_id').val('');
                            $('#provinsiForm').trigger("reset");
                            $('#modelHeading').html("Tambah Data Provinsi");
                            $('#ajaxModel').modal('show');
                        });

                        //createupdate
                        $('#saveBtn').click(function (e) {
                            e.preventDefault();
                            $(this).html('Save');
                                $.ajax({
                                    data: $('#provinsiForm').serialize(),
                                    url: "{{ route('admin.provinsi.store') }}",
                                    type: "POST",
                                    dataType: 'json',
                                    success: function (data) {
                                        $('#provinsiForm').trigger("reset");
                                        $('#ajaxModel').modal('hide');
                                        table.draw();
                                    },
                                    error: function (data) {
                                        console.log('Error:', data);
                                        $('#saveBtn').html('Save Changes');
                                    }
                                });
                        });

                        // edit
                        $('body').on('click', '.edit', function () {
                            $('#provinsi').val($(this).data('title'));
                            $('#tanggal_jadi').val($(this).data('date'));
                            $('#keterangan-edit').val($(this).data('keterangan'));
                            $('#provinsi_id_edit').val($(this).data('id'));
                            $('#modHeading').html("Edit Data Provinsi");
                            $('#ajaxModelEdit').modal('show');
                            return false;
                        });
                        
                        //updateprovinsiForm
                        $('#updateprovinsiForm').submit(function (e) {
                            e.preventDefault();
                            //$(this).html('Save');
                                $.ajax({
                                    data: $('#updateprovinsiForm').serialize(),
                                    url: "{{ route('admin.provinsi.update') }}",
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
                                        $('#updateprovinsiForm').html('Save Changes');
                                    }
                                });
                        });

                       //delete
                        $('body').on('click', '.deleteProvinsi', function () {
                            var provinsi_id = $(this).data("provinsi_id");
                            $confirm = confirm("Yakin data anda ingin di hapus !!!");
                            if($confirm == true ){
                                $.ajax({
                                    type: "DELETE",
                                    url: "{{ route('admin.provinsi.destroy') }}",
                                    data: {id:provinsi_id,_method:'delete'},
                                    function (data) {
                                        //table.draw();
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





