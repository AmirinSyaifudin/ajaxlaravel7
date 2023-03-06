@extends('admin.templates.default')
@section('content')
<h1> DATA DETAIL CHECK OUT</h1>
<div class="box" onload="functionTimer()">

<div class="row">
    <div class="col-md-5">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
          <h3 class="profile-username text-center"><span class="label label-info">{{ $parkir->napol }}</span></h3>
          {{-- <p class="text-muted text-center">Software Engineer</p> --}}
          <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>TANGGAL MASUK </b> <a class="pull-right"><span class="label label-danger">{{ date('H:i:s | l-d-M-Y',strtotime($parkir->created_at)) }}</span></a>
            </li>
            <li class="list-group-item">
              <b>JAM MASUK</b> <a class="pull-right"><span class="label label-success">{{ date('H:i:s ',strtotime($parkir->created_at)) }}</span></a>
            </li>
            <li class="list-group-item">
              <b>TANGGAL KELUAR</b> <a class="pull-right"><span class="label label-info">{{ date('D-d-M-Y') }}</span></a>
            </li>

            <li class="list-group-item">
              <b>TANGGAL KELUAR INDO</b> <a class="pull-right"><span class="label label-info">{{ date('D-d-M-Y') }}</span></a>
            </li>

            <li class="list-group-item">
                <b>JAM KELUAR</b> <a class="pull-right"><span class="label label-warning">{{ date('H:i:s') }}</span></a>
              </li>
              <li class="list-group-item">
                <b>KODE PARKIR</b> <a class="pull-right"><span class="label label-primary">{{ $parkir->no_parkir }}</span></a>
              </li>
              <li class="list-group-item">
                <b>NOMOR POLISI</b> <a class="pull-right"><span class="label label-info">{{ $parkir->napol }}</span></a>
              </li>
              <li class="list-group-item">
                <b>JENIS KENDARAAN</b> <a class="pull-right"><span class="label label-danger">{{ $parkir->jenis_kendaraan }}</span></a>
              </li>
              <li class="list-group-item">
                <b>TARIF PERJAM</b> <a class="pull-right"><span class="label label-primary">{{"Rp. ".format_uang($parkir->tarif_perjam)}}</span></a>
              </li>
              <li class="list-group-item">
                <b>TOTAL TAHUN</b> <a class="pull-right"><span class="label label-danger">{{ $diff->y }}</span></a>
              </li>
              <li class="list-group-item">
                <b>TOTAL BULAN</b> <a class="pull-right"><span class="label label-primary">{{ $diff->m }}</span></a>
              </li>
              <li class="list-group-item">
                <b>TOTAL HARI</b> <a class="pull-right"><span class="label label-info">{{ $diff->d}}</span></a>
              </li>
              <li class="list-group-item">
                <b>TOTAL JAM</b> <a class="pull-right"><span class="label label-warning">{{ $diff->h }}</span></a>
              </li>
              <li class="list-group-item">
                <b>TOTAL MENIT</b> <a class="pull-right"><span class="label label-danger">{{ $diff->i }}</span></a>
              </li>
              <li class="list-group-item">
                <b>TOTAL DETIK</b> <a class="pull-right"><span class="label label-info">{{ $diff->f }}</span></a>
              </li>
              <li class="list-group-item">
                <b>TOTAL BIAYA</b> <a class="pull-right"><span class="label label-danger">{{"Rp. ".format_uang($total_bayar)}}</span></a>
              </li>
          </ul>
          <td width='5'> <a href="{{ route('admin.parkir.index') }}" class="btn btn-primary">KEMBALI</a></td>
          <td width='5'> <a onclick="window.print()" class="btn btn-info">PRINT PARKIR</a></td>
                             
          <td>
            <form action="{{ route('admin.parkir.destroy', $parkir->parkir_id) }}" method="post" style="display:inline;">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Check Out ???')">CHECK OUT</button>
            </form>
          </td>
  
        </div>
        <!-- /.box-body -->

  
      </div>

    </div>
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
