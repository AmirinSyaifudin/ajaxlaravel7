@extends('admin.templates.default')
@section('content')
<h1> DATA FUNGSI TERBILANG</h1>
<!-- /.box-header -->
    <div class="box" onload="functionTimer()">
            <div class="box-header">
                <center> 
                    <h3 class="box-title" style="text-transform: uppercase;">Silahkan input data </h3><br><br> 
                </center>
            </div>
            <div class="box-body" onload="functionTimer()">
                <center>
                    <form action="{{ route('admin.terbilang.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="max-width:500px">
                        @csrf
                        <div class="form-group @error('code_barang') has-error @enderror">
                            <label for="inputEmail3" class="col-sm-2 control-label">KODE BARANG OTOMATIS</label>
                                <div class="col-sm-10">
                                    <input type="" name="code_barang" class="form-control" id="inputEmail3"
                                    value="{{ $nomer }}" readonly>
                                        @error('nama')
                                            <span class="help-block">{{ $message}}</span>
                                        @enderror
                                </div>
                        </div>
                        <div class="form-group @error('nama_barang') has-error @enderror">
                            <label for="inputPassword3" class="col-sm-2 control-label">NAMA BARANG</label>
                                <div class="col-sm-10">
                                    <input type="" name="nama_barang" class="form-control" id="inputPassword3" 
                                    value="{{ old('nama_barang') }}" placeholder="">
                                        @error('nama_barang')
                                            <span class="help-block">{{ $message}}</span>
                                        @enderror
                                </div>
                        </div>
                        <div class="form-group @error('qty') has-error @enderror">
                            <label for="inputPassword3" class="col-sm-2 control-label">QUANTITY</label>
                                <div class="col-sm-10">
                                    <input type="number" name="qty" class="form-control" id="inputPassword3" 
                                    value="{{ old('qty') }}" placeholder="">
                                        @error('qty')
                                            <span class="help-block">{{ $message}}</span>
                                        @enderror
                                </div>
                        </div>
                        <div class="form-group @error('harga') has-error @enderror">
                            <label for="inputPassword3" class="col-sm-2 control-label">HARGA</label>
                                <div class="col-sm-10">
                                    <input type="" name="harga" class="form-control" id="inputPassword3" 
                                    value="{{ old('harga') }}" placeholder="">
                                        @error('harga')
                                            <span class="help-block">{{ $message}}</span>
                                        @enderror
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <tr>
                                    <td><input type="submit" value="Tambah" class="btn btn-primary"></td>
                                    <td><input type="reset" name="batal" class="btn btn-warning" value="RESET"></td>
                                </tr>
                            </div>
                        </div>
                    </form>
                </center>
                <hr>
                     
                <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width='5'>ID</th>
                                    <th width='5'>KODE BARANG</th>
                                    <th width='5'>NAMA BARANG</th>
                                    <th width='5'>QTY</th>
                                    <th width='5'>HARGA</th>
                                    <th width='5'>TOTAL</th>
                                    <th width='5'>TANGGAL TRANSAKSI</th>
                                    <th width='5' class="text-center">TERBILANG</th>
                                    <th width='5'></th>
                                    <th width='5'></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($terbilang as $tb)
                                    <tr>
                                        {{-- <button type="button" class="btn btn-block btn-primary btn-sm">Primary</button> --}}
                                        <td width='5'>  {{ $loop-> index +1 }} </td>
                                        <td width='20'> {{ $tb->code_barang }}</td>
                                        <td width='20'> {{ $tb->nama_barang }}</td>
                                        <td width='5'>  {{" ".format_uang($tb->qty)}} </td>
                                        <td scope="row"> {{"Rp. ".format_uang($tb->harga)}} </td>
                                        {{-- <td width='5'>  {{ $tb->total }} </td> --}}
                                        {{-- <td scope="row"> {{ ''. number_format ($tb->total) . "  " }} </td> --}}
                                        <td scope="row"> {{"Rp. ".format_uang($tb->total)}} </td>
                                        {{-- <td scope="center" class="btn btn-info">{{ terbilang($tb->total)}} </td> --}}
                                        <td scope="row"> {{ tanggal_indonesia($tb->created_at)}} </td>
                                        <td scope="row">  <a class="btn btn-block btn-primary btn-sm"> {{ terbilang($tb->total)}} </a></td>
                                        {{-- <td width='5'>  {{ $tb->created_at }} </td> --}}
                                        {{-- <td width='5'>  {{ date('H:i:s | l-d-M-Y',strtotime($tb->created_at)) }}</td> --}}
                                        {{-- <td width='5'>  <a href="{{ route('admin.terbilang.detail', $tb->terbilang_id) }}" class="btn btn-info">DETAIL</a></td> --}}
                                        <td width='5'>  <a href="{{ route('admin.terbilang.edit', $tb->terbilang_id) }}" class="btn btn-warning">EDIT</a></td>
                                        <td width='5'>
                                            <form action="{{ route('admin.terbilang.destroy', $tb->terbilang_id) }}" method="post" style="display:inline;">
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



                  {{-- <div class="form-group @error('tanggal') has-error @enderror">
                                <label for="inputPassword3" class="col-sm-2 control-label">TANGGAL TRANSAKSI</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tanggal" class="form-control" id="inputPassword3" 
                                        value="
                                        <?php 
                                            if(isset($_POST['tanggal'])) { 
                                                echo old('tanggal');
                                            } else { 
                                                echo date('D-d-M-Y'); } 
                                        ?>
                                        "
                                        placeholder="D-d-M-Y" readonly>
                                    </div>
                            </div> --}}

                            {{-- <tr>
                                <td>Waktu Masuk Parkir :</td>
                                <td> : </td>
                                <td> <span id="demo"> </span>
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $date =  new DateTime();
                                    echo $date->format('H:i:s');
                                    ?>
                                    <input type="hidden" name="jam" value="<?= $date->format('H:i:s') ?>">
                                </td>
                            </tr>
                            <tr onload="functionTimer()">
                                <td>Jam Masuk Parkir :</td>
                                <td> : </td>
                                <td> <span id="demo"> </span>
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $jam = date("H:i:s");
                                    ?>
        
                                </td>
                            </tr> --}}
                            <div class="form-group">
                            {{-- <label for="inputPassword3" class="col-sm-2 control-label" >JAM TRANSAKSI</label>
                                <div class="col-sm-10" onload="functionTimer()">
                                    <input type="" class="form-control" id="demo" 
                                    value="
                                        <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $date =  new DateTime();
                                            echo $date->format('H:i:s');
                                        ?>" 
                                    placeholder="" readonly>
                                </div>
                            </div>                          --}}




                            {{-- <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">QUANTITY</label>
                                <div class="col-sm-10">
                                    <select name="qty" class="form-control" >
                                        <option value=""> </option>
                                        <?php
                                        for ($xx = 1; $xx <= 100; $xx++) { ?>
                                        <option name="qty" value="<?php echo $xx; ?>">
                                            <?php echo $xx; ?>
                                        </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div> --}}
