


        {{-- <div class="form-group @error('tanggal_berangkat') has-error @enderror">
            <label for="inputPassword3" class="col-sm-2 control-label">TANGGAL BERANGKAT</label>
                <div class="col-sm-10">
                    <input type="text" name="tanggal_berangkat" class="form-control" id="inputPassword3" 
                    value="
                        <?php 
                            if(isset($_POST['tanggal'])) { 
                                echo old('tanggal');
                            } else { 
                                echo date('D-d-M-Y'); } 
                        ?>
                    "
                    placeholder="D-d-M-Y" readonly>
                    @error('tanggal_berangkat')
                        <span class="help-block">{{ $message}}</span>
                    @enderror
                </div>
        </div> 
        
            <td width='5'>  {{ date('H:i:s | l-d-M-Y',strtotime($jaran->created_at)) }}</td>
        
        --}}





{{-- 
        <?php 
        if (isset($_POST['tambah'])) {
           $jumlah = $_POST['jumlah'];
           if ($jumlah <= 12) {
               $jenis_bis = 'MINI BUS MAX 12 ORANG';
           } elseif ($jumlah <= 24) {
               $jenis_bis = 'MEDIUM BUS MAX 24 ORANG';
           } elseif ($jumlah <= 25 && $jumlah <= 50) {
               $jenis_bis = 'BIG BUS MAX 50 ORANG';
           }

           // jika jumlah lebih dari 50 sistem menolak
           if ($jumlah > 51) {
               echo '<div class="alert alert-warning">Gagal melakukan proses tambah, data terlalu banyak.</div>';
           } else {
           }
       }
       ?> --}}
