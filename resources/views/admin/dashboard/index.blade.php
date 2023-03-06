{{--  // tambahkan code di composer.json  --}}
 {{--  files [
"app/Helpers/Global.php"
]

kemudia jalankan terminal dan ketik "composer dumpautoload" artinya biar file terbaca di composer.json  --}}


@extends('admin.templates.default')

@section('content')
<h1>LARAVEL 7</h1>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">SELAMAT DATANG DI HALAMAN ADMIN</h3>
            {{-- <a href="{{ route('admin.pasien.create') }}" class="btn btn-primary">Tambah Penulis</a> --}}
        </div>

        <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3> </h3>

                  <p> </p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3> <sup style="font-size: 20px"></sup></h3>

                  <p>TOTAL TRANSAKSI</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3> </h3>

                  <p>TOTAL CUSTOMER</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3> 5465 </h3>

                  <p>PRODUK PALING LARIS</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    {{--  <h3> {{ totalProvinsi() }}</h3>  --}}

                    <p>TOTAL PROVINSI</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3> </h3>

                    <p>TOTAL KABUPATEN</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3> </h3>

                    <p>TOTAL KOTA</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3>01545120</h3>


                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

          </div>


          {{--  //Batas  --}}
            <div class="box-body">
                    <table id="dataTable" class="table table-bordered table-hover">

                </table>
            </div>
    </div>

@endsection





























