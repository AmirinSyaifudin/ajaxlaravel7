@extends('admin.templates.default')
@section('content')
<h1> DATA HITUNG OARKIT</h1>

<!-- /.box-header -->
    <div class="box">
        <div class="box-header">
            <center> <h3 class="box-title" style="text-transform: uppercase;">Silahkan input data </h3><br><br> </center>
                <form action="{{ route('admin.hitungparkir.store') }}" class="form-horizontal" method="POST" enctype="multipart/form-data" style="max-width:500px">
                    @csrf

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
                        <div class="col-sm-offset-2 col-sm-10">
                            <center>
                            <tr>
                                <td><input type="submit" value="Tambah" class="btn btn-primary"></td>
                                <td><input type="reset" name="batal" class="btn btn-warning" value="RESET"></td>
                            </tr>
                        </center>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-body">

            <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width='5'>ID</th>
                            <th width='5'>JENIS KENDARAAN </th>
                            <th width='5'>BIAYA PERJAM </th>
                            <th width='5'>ANDA PARKIR </th>
                            <th width='5'> KETERANGAN </th>
                            <th width='5'> </th>
                            <th width='5'> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hitungparkir as $jangkrik)
                        <tr>
                            <td width='5'>  {{ $loop-> index +1 }} </td>
                            <td width='20'> {{ $jangkrik->jenis_kendaraan }} </td>
                            <td width='20'> {{ $jangkrik->biaya_perjam }}</td>
                            <td width='20'> {{ $jangkrik->anda_parkir }}</td>
                            <td width='20'> {{ $jangkrik->keterangan }}</td> 
                            {{-- <td width='5'>  <a href="{{ route('admin.bis.edit', $bs->bis_id) }}" class="btn btn-warning">EDIT</a></td> --}}
                            <td width='5'>  <a href="" class="btn btn-warning">EDIT</a></td>
                            <td width='5'>
                                <form action="{{ route('admin.hitungparkir.destroy', $jangkrik->hitungparkir_id) }}" method="post" style="display:inline;">
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


@endsection

@push('scripts')
    <script>
        $(function () {
            $('#dataTable').DataTable({


            });
        });
    </script>
@endpush


