@extends('admin.templates.default')
@section('content')
<h1> DATA DETAIL TERBILANG</h1>

<!-- /.box-header -->
    <div class="box" onload="functionTimer()">
        <div class="box-header">
            <center> <h3 class="box-title" style="text-transform: uppercase;">data detail produk </h3><br><br> </center>

            </div>
            <div class="box-body">
                        <div class="box-body">
                        {{-- <h5 class="box-title">MENAMPILKAN DATA BERDASARKAN TANGGAL</h5><br><br> --}}                       
                        </div>
                        
                        <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width='5'>ID</th>
                                        <th width='5'>KODE BARANG</th>
                                        <th width='5'>NAMA BARANG</th>
                                        <th width='5'>QUANTITY</th>
                                        <th width='5'>HARGA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($terbilang as $tb)
                                    <tr>
                                        <td width='5'>  </td>
                                        <td width='20'> </td>
                                        <td width='20'> </td>
                                        <td width='5'>  </td>
                                        <td scope="row"> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                        <hr>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width='5'>JUMLAH</th>
                                    <th width='5'>TANGGAL TRANSAKSI</th>
                                    <th width='5'>TERBILANG</th>
                                    <th width='5'>CETAK</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($terbilang as $tb)
                                <tr>
                                    <td width='20'> </td>
                                    <td width='20'> </td>
                                    <td width='5'> </td>
                                    <td scope="row"> </td>
                                </tr>
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

