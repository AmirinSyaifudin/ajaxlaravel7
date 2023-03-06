@extends('admin.templates.default')
@section('content')
<h1> DATA JARAK WAKTU</h1>
<?php 
    date_default_timezone_set('Asia/Jakarta');
?>
<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
            <center>
                <h3 class="box-title" style="text-transform: uppercase;">Silahkan input data </h3><br><br> 
            </center>
        </div>
            <center>
                <div class="box-body">
                    <form action="{{ route('admin.jarakwaktu.store') }}"  method="POST" enctype="multipart/form-data" class="form-horizontal" style="max-width:500px">
                        @csrf
                        <div class="form-group" @error('created_at') has-error @enderror">
                            <label for="inputPassword3" class="col-sm-2 control-label">JAM & TANGGAL </label>
                                <div class="col-sm-10">
                                    <input type="created_at" name="created_at" class="form-control" id="inputPassword3" 
                                    value="{{ date('H:i:s | D-d-M-Y') }} "
                                    placeholder="H:i:s |D-d-M-Y" readonly>
                                    @error('created_at')
                                        <span class="help-block">{{ $message}}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group" @error('kecepatan') has-error @enderror">
                            <label for="inputEmail3" class="col-sm-2 control-label">KECEPATAN</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kecepatan" class="form-control" id="inputEmail3" 
                                    value="{{ old('kecepatan') }}" placeholder="Isi data kecepatan">
                                    @error('kecepatan')
                                        <span class="help-block">{{ $message}}</span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group" @error('jarak') has-error @enderror">
                            <label for="inputPassword3" class="col-sm-2 control-label">JARAK</label>
                                <div class="col-sm-10">
                                    <input type="text" name="jarak" class="form-control" id="inputPassword3" 
                                    value="{{ old('jarak') }}" placeholder="Isi data jarak yang di tempuh">
                                    @error('jarak')
                                        <span class="help-block">{{ $message}}</span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <tr>
                                    <td><input type="submit" class="btn btn-primary" value="Tambah"></td>
                                    <td><input type="reset" name="batal" class="btn btn-warning" value="Reset"></td>
                                </tr>
                            </div>
                        </div> 
                    </form>
                </div>
                <hr>

                <div class="box-body">
                    <h4 style="text-transform: uppercase;"> Menampilkan Data Berdasarkan Tahun & Tanggal</h4>                   
                </div>
            </center>

            <div class="box-body table-responsive">
                <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>NO</th>
                            <th width='30'>JAM & TANGGAL MULAI BERANGKAT</th>
                            <th width='5'>KECEPATAN</th>
                            <th width='5'>JARAK</th>
                            <th width='5'>WAKTU YANG DI TEMPUT</th>
                            <th width='5'>CETAK HASIL</th>
                            <th width='5'> </th>
                            <th width='5'> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jarakwaktu as $wedus)
                            <tr>
                                <td width='5'> {{ $loop-> index +1 }} </td>
                                {{-- <td scope="row"> {{ tanggal_indonesia($wedus->created_at)  }} </td> --}}
                                <td width='30'>  {{ date('H:i:s | l-d-M-Y',strtotime($wedus->created_at)) }}</td>
                                <td width='20'> {{ $wedus->kecepatan }}</td>
                                <td width='5'>  {{ $wedus->jarak }}  </td>
                                <td width='5'>  {{ $wedus->waktu }} </td>
                                <td width='5'>  <a href="" class="btn btn-info">CETAK HASIL</a></td>
                                <td width='5'>  <a href="{{ route('admin.jarakwaktu.detail', $wedus->jarakwaktu_id) }}" class="btn btn-primary">DETAIL</a></td>
                                <td width='5'>
                                    <form action="{{ route('admin.jarakwaktu.destroy', $wedus->jarakwaktu_id) }}" method="post" style="display:inline;">
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

    <script>
        $( function() {
        $( "#date" ).datepicker({
            dateFormat: "yy-mm-dd"
        });
        } );
    </script>
    
    {{-- code jam beserta detik  --}}
    <script type=text/javascript>
        function functionTimer() {
            setInterval(function() {
                myTimer()
            }, 1000);
        }
    
        function myTimer() {
            var d = new Date();
            var t = d.toLocaleTimeString();
            document.getElementById("demo").innerHTML = t;
        }
    </script>
@endsection


@push('scripts')
    <script>
        $(function () {
            $('#dataTable').DataTable({


            });
        });
    </script>
@endpush
