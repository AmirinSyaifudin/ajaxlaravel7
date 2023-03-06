@extends('admin.templates.default')
@section('content')
<h1> ISENG SISTEM MANAGEMEN PARKIR</h1>

<!-- /.box-header -->
    <div class="box" >
        <div class="box-header" >
            <center> 
                <h3 class="box-title" style="text-transform: uppercase;">Silahkan input data </h3><br><br> 
            </center>
        </div>
        
        <div class="box-body" onload="functionTimer()">
            <center>
                    <form action="{{ route('admin.parkir.store') }}" method="POST" onload="functionTimer()" class="form-horizontal" style="max-width:500px">
                        @csrf
                        <div class="form-group" @error('tanggal_jam_masuk') has-error @enderror">
                            <label for="inputPassword3" class="col-sm-2 control-label">TANGGAL JAM MASUK </label>
                                <div class="col-sm-10">
                                    <input type="tanggal_jam_masuk" name="tanggal_jam_masuk" id="demo" class="form-control" id="inputPassword3" 
                                    value="{{ date('H:i:s | D-d-M-Y') }} "
                                    placeholder="H:i:s |D-d-M-Y" readonly>
                                    @error('tanggal_jam_masuk')
                                        <span class="help-block">{{ $message}}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group" @error('tanggal_jam_masuk') has-error @enderror">
                            <label for="inputPassword3" class="col-sm-2 control-label">JAM MASUK </label>
                                <div class="col-sm-10">
                                    <input type="tanggal_jam_masuk" name="tanggal_jam_masuk" id="demo" class="form-control" id="inputPassword3" 
                                    value="{{ date('H:i:s ') }} "
                                    placeholder="H:i:s " readonly>
                                    @error('tanggal_jam_masuk')
                                        <span class="help-block">{{ $message}}</span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group @error('no_parkir') has-error @enderror">
                            <label for="inputEmail3" class="col-sm-2 control-label">NO PARKIR</label>
                                <div class="col-sm-10">
                                    <input type="" name="no_parkir" class="form-control" id="inputEmail3"
                                    value="{{ $nomer }}" readonly>
                                        @error('no_parkir')
                                            <span class="help-block">{{ $message}}</span>
                                        @enderror
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">JENIS KENDARAAN</label>
                                <div class="col-sm-10">
                                    <select name="jenis_kendaraan" class="form-control form-control-sm">
                                        <!-- <option value="">TYPE KENDARAAN</option> -->
                                        <option value="SEPEDA">SEPEDA</option>
                                        <option value="MOTOR">MOTOR</option>
                                        <option value="MOBIL">MOBIL</option>
                                        <option value="BIS">BIS</option>
                                        <option value="TRUK">TRUK</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">NAPOL</label>
                            <div class="col-sm-10">
                            <input type="text" name="napol" class="form-control" id="inputPassword3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <tr>
                                    <td><input type="submit" name="hitung" class="btn btn-primary" value="CHECK IN"></td>
                                    <td><input type="reset" name="batal" class="btn btn-warning" value="RESET"></td>
                                </tr>
                            </div>
                        </div>
                    </form>
            </center>

                    <div class="box-body table-responsive">
                        <table id="dataTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width='5'>ID</th>
                                        <th width='5'>NO PARKIR</th>
                                        <th width='5'>NAPOL</th>
                                        <th width='5'>JAM & TANGGAL MASUK</th>
                                        <th width='5'>JENIS KENDARAAN</th>
                                        <th width='5'>TARIF PERJAM</th>
                                    
                                        <th width='5'>STATUS</th>
                                        <th width='5'> </th>
                                        <th width='5'> </th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($parkir as $jangkrik)
                                    <tr>
                                        {{-- <button type="button" class="btn btn-block btn-primary btn-sm">Primary</button> --}}
                                        <td width='5'>  {{ $loop-> index +1 }} </td>
                                        <td width='20'> {{ $jangkrik->no_parkir }}</td>
                                        <td width='20'> {{ $jangkrik->napol }}</td>
                                        {{-- <td width='30'>  {{ date('H:i:s | l-d-M-Y',strtotime($jangkrik->created_at)) }}</td> --}}
                                        {{-- <td width='30'>  {{ date('H:i:s | l-d-M-Y',strtotime($jangkrik->tanggal_jam_masuk)) }}</td>  --}}
                                        <td scope="row"> {{ tanggal_indonesia($jangkrik->created_at)}} </td>
                                        {{-- <td width='30'>{{ $jangkrik->created_at }}</td> --}}
                                        <td width='20'> {{ $jangkrik->jenis_kendaraan }}</td>
                                        <td width='20'>{{ $jangkrik->tarif_perjam }} </td>
                                        <td width='20'><a class="btn btn-warning"> {{ $jangkrik->status }}</a> </td>
                                        <td width='5'><a href="{{ route('admin.parkir.checkout', $jangkrik->parkir_id) }}" class="btn btn-info">CHECK OUT</a></td>
                                        <td width='5'>
                                            <form action="{{ route('admin.parkir.destroy', $jangkrik->parkir_id) }}" method="post" style="display:inline;">
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

    <script>
        $(function () {
            $('#dataTable').DataTable({






            });
        });
    </script>
@endpush


{{-- @foreach ($parkir as $pr)
<tr>
    <td width='20'> {{ $pr->tanggal }} </td>
    <td width='20'> {{ $pr->tanggal_keluar }} </td>
    <td width='20'> {{ $pr->jam_masuk }}</td>
    <td width='20'> {{ $pr->jam_keluar }}</td>
    <td width='5'>  {{ $pr->total_menit }}  </td>
    <td width='5'>  {{ $pr->jenis_kendaraan }} </td>
    <td width='5'>  {{ $pr->napol }} </td>
    <td width='5'>  {{ $pr->tarif_perjam }} </td>
    <td width='5'>  {{ $pr->anda_parkir }} </td>
    <td width='5'>  {{ $pr->total }} </td>
</tr>
@endforeach --}}


{{-- 
<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label" >JAM TRANSAKSI</label>
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
    </div>   --}}



{{-- 
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">TANGGAL HARI INI</label>
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

{{-- 
    <hr>

                    <div class="box-body">
                    <div class="form-group">
                        <div class="col-md-4 mb-3">
                          <label for="validationCustom03">TANGGAL MASUK PARKIR</label>
                          <input type="date" name="tanggal_cuti" class="form-control" 
                          value="" id="validationCustom03" required>
                            @error('')
                                <span class="help-block">{{ $message}}</span>
                            @enderror
                          <div class="invalid-feedback">
                            Tanggal mulai 
                          </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">TANGGAL SELESAI PARKIR</label>
                            <input type="date" name="tanggal_selesai_cuti" class="form-control" 
                            value="" id="validationCustom03" required>
                                @error('')
                                    <span class="help-block">{{ $message}}</span>
                                @enderror
                            <div class="invalid-feedback">
                              Tanggal akhir 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <tr>
                                    <td><input type="submit" name="hitung" class="btn btn-primary" value="Tambah"></td>
                                    <td><input type="reset" name="batal" class="btn btn-warning" value="RESET"></td>
                                </tr>
                            </div>
                        </div>

                      </div>


                    </div> --}}