@extends('admin.templates.default')
@section('content')

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">DATA CUTI</h3><br><br>
                <a href="" class="btn btn-primary">TAMBAH DATA KARYAWAN</a>
          
                {{-- PILIH TAHUN PENGAJUAN CUTI --}}
                <form action="{{ url('admin/laporan/pengajuancuti') }}" class="form-inline" method="get">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">PILIH TAHUN</label>
                            <select name="tahun" class="form-control" id="exampleFormControlSelect1">
                                <?php
                                    $thn_skr = date("Y");
                                        for ($x = $thn_skr; $x >= 2000; $x-- ){
                                            ?>
                                        <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                <?php
                                        }
                                ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm" type="submit">FILTER</button>
                    </div>
                </form>


            </div>
          

            <div class="box-body">


             


            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>NO INDUK</th>
                            <th width='5'>NAMA</th>
                            <th width='10'>KETERANGAN</th>
                            <th width='10'>TANGGAL MASUK KERJA</th>
                            <th width='10'>TANGGAL CUTI</th>
                            <th width='10'>AKHIR CUTI</th>
                            <th width='5'>LAMA CUTI</th>
                            <th width='5'>STATUS</th>
                            <th width='10'>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        {{-- @foreach ($cuti as $ct)
                        <tr>
                            <td width='5'>  </td>
                            <td width='5'> </td>
                            <td width='5'> </td>
                            <td width='10'> </td>
                            <td width='10'>  </td>
                            <td width='10'>  </td>
                            <td width='5'>  </td>
                            <td width='5'>  </td>
                            <td width='10'>  </td>
                        </tr>
                        </tr>
                        @endforeach --}}
                    </tbody>
            </table>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(function () {
            $('#dataTable').DataTable({



            });
        });
    </script>
@endpush



