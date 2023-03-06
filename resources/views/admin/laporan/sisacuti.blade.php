@extends('admin.templates.default')
@section('content')
<h1> DATA SISA CUTI KARYAWAN</h1>

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
                <h3 class="box-title">LAPORAN DATA  SISA CUTI KARYAWAN</h3><br><br>

            </div>
            <div class="box-body">

            <form  class="form-inline" action="{{ url('admin/laporan/sisacuti') }}" method="get" >
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select name="tahun" class="form-control" id="exampleFormControlSelect1">
                    <?php
                        $thn_skr = date('Y');
                        for ($x = $thn_skr; $x >= 2008; $x--) {
                    ?>
                        <option value="<?php echo $x ?>"><?php echo $x ?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-sm"  type="submit">Filter</button>
                </div>
            </form>
            
            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>ID</th>
                            {{-- <th width='20'>NO INDUK</th> --}}
                            <th width='5'>NAMA</th>
                            {{-- <th width='5'>tanggal cuti</th> --}}
                            <th width='5'>AMBIL CUTI</th>
                            <th width='5'>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($cuti as $ct)
                        <tr>
                            <td width='5'>  {{ $loop-> index +1 }} </td>
                            <td width='20'> {{ $ct->nama }}</td>
                            {{-- <td width='20'> {{ $ct->tanggal_cuti }}</td> --}}
                            <td width='20'> {{ $ct->ambilcuti }}</td>
                            <td width='5'>   </td>
                        </tr>
                        </tr>
                        @endforeach
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

{{-- @foreach ($cuti as $ct)
<tr>
    <td>{{ $loop-> index +1 }}</td>
    <td>{{ $ct->no_induk }} </td>
    <td>{{ $ct->nama }} </td>
    <td>{{ $ct->lama_cuti }} </td>
</tr>
@endforeach --}}