@extends('admin.templates.default')
@section('content')
<h1> DATA DETAIL JARAK & WAKTU</h1>

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
                                        <th width='5'>TANGGAL BERANGKAT</th>
                                        <th width='5'>JAM BERANGKAT</th>
                                        <th width='5'>KECEPATAN</th>
                                        <th width='5'>JARAK</th>
                                        <th width='5'>WAKTU</th>
                                        <th width='5'>TERBILANG WAKTU</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                        </table>
                        <hr>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width='5'>ID</th>
                                    <th width='5'>TANGGAL BERANGKAT</th>
                                    <th width='5'>JAM BERANGKAT</th>
                                    <th width='5'>KECEPATAN</th>
                                    <th width='5'>JARAK</th>
                                    <th width='5'>WAKTU</th>
                                    <th width='5'>TERBILANG WAKTU</th>
                                </tr>
                            </thead>
                            <tbody>
                             
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

