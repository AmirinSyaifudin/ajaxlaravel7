<!doctype html>
<html lang="en">
    @include('frontend.templates.partials.head')
<body>
    @include('frontend.templates.partials.navigation')

<div class="main" style="background-image: url('{{ asset('frontend/images/default.jpg') }}')">

    <!--    Change the image source '/images/default.jpg' with your favourite image.     -->

    <div class="cover black" data-color="black"></div>

    <!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

    <div class="container">
        <h1 class="logo cursive">
            COFFEE JAVA
        </h1>
    <!--  H1 can have 2 designs: "logo" and "logo cursive"           -->

        <div class="content">
            {{--  <h4 class="motto">SELAMAT DATANG DI FOFFEE JAVA LATTE</h4>  --}}
            <div class="subscribe">
                <h5 class="info-text">
                    SELAMAT MINIKMATI SAJIAN MENU COFFEE JAVA
                </h5>

                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm6-6 col-sm-offset-3 ">
                        <form class="form-inline" role="form">
                          <div class="form-group">

                            <div class="modal-footer">
                                <a href="{{ route('login') }}" class="btn btn-danger btn-fill" role="button" aria-pressed="true">ADMIN</a>
                                {{-- <a href="{{ route('register') }}" class="btn btn-danger btn-fill" role="button" aria-pressed="true">VISITOR</a> --}}
                                <button type="button" class="btn btn-danger btn-fill" data-toggle="modal" data-target="#exampleModal">VISITOR</button>
                            </div>

                            <div class="input-group-btn">
                                <label class="sr-only" for="exampleInputEmail2">Kritik & Saran</label>
                                <input type="text" class="form-control transparent" placeholder="Kritik & Saran...">
                                    <button type="button" class="btn btn-danger btn-flat">KIRIM</button>
                            </div>

                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.templates.partials.footer')
 </div>
 </body>
    @include('frontend.templates.partials.scripts')
</html>


{{--  <label class="sr-only" for="exampleInputEmail2">Nama </label>
<input type="email" class="form-control transparent" placeholder="Nama...">

<label class="sr-only" for="exampleInputEmail2">No Meja</label>
<input type="email" class="form-control transparent" placeholder="No Meja...">

<label class="sr-only" for="exampleInputEmail2">Lantai </label>
<input type="email" class="form-control transparent" placeholder="Lantai...">  --}}



<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-danger btn-fill" data-toggle="modal" data-target="#exampleModal">
   PENGUNJUNG
</button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PENGUNJUNG</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                {{--  Admin LTE  --}}
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">SILAHKAN INPUT DATA</h3>
                    </div>
                    <div class="box-body">

                    <!-- /input-group -->
                    <p class="margin"></p>

                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Nama :
                            <span class="fa fa-caret-down"></span></button>
                        </div>
                        <!-- /btn-group -->
                        <input type="text" class="form-control">
                    </div>

                    <!-- /input-group -->
                    <p class="margin"></p>

                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Lantai :
                            <span class="fa fa-caret-down"></span></button>
                        </div>
                        <!-- /btn-group -->
                        <input type="text" class="form-control">
                    </div>

                    <!-- /input-group -->
                    <p class="margin"></p>

                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">No Meja:
                            <span class="fa fa-caret-down"></span></button>
                        </div>
                        <!-- /btn-group -->
                        <input type="text" class="form-control">
                    </div>

                    <!-- /input-group -->
                    </div>
                    <!-- /.box-body -->
                </div>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-fill" data-dismiss="modal">Kembali</button>
        <button type="button" class="btn btn-danger btn-fill">Lanjutkan</button>
      </div>
    </div>
  </div>
</div>


{{--  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">


      </div>
    </div>
  </div>  --}}


         {{--  <button type="submit" class="btn btn-danger btn-fill">ADMIN</button>  --}}
                            {{-- <a href="#" class="btn btn-danger btn-fill" role="button" aria-pressed="true">ADMIN</a> --}}
                            {{--  <button type="submit" class="btn btn-danger btn-fill">PENGUNJUNG</button>  --}}


                            {{--  <!-- Small modal -->
                            <button type="button" class="btn btn-danger btn-fill" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>  --}}
