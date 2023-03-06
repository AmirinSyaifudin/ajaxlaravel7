





// menampilkan data berdasarkan tanggal 


<h4 style="text-transform: uppercase;"> Menampilkan Data Berdasarkan Tahun & Tanggal</h4>
                        
<div class="box-body">
<h5 class="box-title">MENAMPILKAN DATA BERDASARKAN TANGGAL</h5><br><br>
 <div class="form-group">
    <div class="col-md-4 mb-3">
      <label for="validationCustom03">TAHUN TANGGAL MULAI</label>
      <input type="date" name="tanggal_mulai" class="form-control" 
      value="" id="validationCustom03" placeholder="{{ ('d/m/Y')}}" required>
        @error('')
            <span class="help-block">{{ $message}}</span>
        @enderror
      <div class="invalid-feedback">
        <h6 style="text-transform: capitalize;" style="color: red;"> Silahkan input tanggal </h6>
      </div>
    </div>

    <div class="col-md-4 mb-3">
        <label for="validationCustom03">TAHUN TANGGAL AKHIR</label>
        <input type="date" name="tanggal_selesai_cuti" class="form-control" 
        value="" id="validationCustom03" required>
            @error('')
                <span class="help-block">{{ $message}}</span>
            @enderror
        <div class="invalid-feedback">
            <h6 style="text-transform: capitalize;" style="color: red;"> Silahkan input tanggal </h6>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <label for="validationCustom03">DATE</label>
        <input type="text"  class="form-control" 
         id="date" placeholder="" >
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <tr>
                <td><input type="submit" name="hitung" class="btn btn-primary" value="SIMPAN"></td>
                <td><input type="reset" name="batal" class="btn btn-warning" value="RESET"></td>
            </tr>
        </div>
    </div>
  </div>
</div>
 



<div class="form-group @error('tanggal') has-error @enderror">
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
</div>

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
</div>  









 




