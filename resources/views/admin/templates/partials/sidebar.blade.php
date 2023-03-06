<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                    <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-user"></i> <span>DASHBOARD</span></a></li>
                    <li><a href="{{ route('admin.provinsi.index') }}"><i class="fa fa-user"></i> <span>PROVINSI</span></a></li>
                    <li><a href="{{ route('admin.karyawan.index') }}"><i class="fa fa-user"></i> <span>KARYAWAN</span></a></li>
                    <li><a href="{{ route('admin.cuti.index') }}"><i class="fa fa-user"></i> <span>CUTI</span></a></li>
                     <li class="treeview">
                        <a href="#">
                          <i class="fa fa-pie-chart"></i>
                          <span>LAPORAN</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="{{ route('admin.laporan.tigakrw') }}"><i class="fa fa-circle-o"></i>3 KARYAWAN BERGABUNG</a></li>
                          <li><a href="{{ route('admin.laporan.cutikrw') }}"><i class="fa fa-circle-o"></i>CUTI KARYAWAN</a></li>
                          <li><a href="{{ route('admin.laporan.cutilebihkrw') }}"><i class="fa fa-circle-o"></i>CUTI LEBIH 1 KALI</a></li>
                          <li><a href="{{ route('admin.laporan.sisacuti') }}"><i class="fa fa-circle-o"></i>SISA CUTI KARYAWAN</a></li>
                          <li><a href="{{ route('admin.laporan.pengajuancuti') }}"><i class="fa fa-circle-o"></i>PENGAJUAN CUTI</a></li>
                          <li><a href="/"><i class="fa fa-circle-o"></i>HITUNG GAJI</a></li>
                          <li><a href="/"><i class="fa fa-circle-o"></i>JABATAN / POSISI</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                          <i class="fa fa-pie-chart"></i>
                          <span>PELANGI INDO DATA</span>
                          <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="{{ route('admin.ganjilgenap.index') }}"><i class="fa fa-circle-o"></i>GANJIL GENAP</a></li>
                          <li><a href="{{ route('admin.parkir.index') }}"><i class="fa fa-circle-o"></i>PARKIR</a></li>
                          <li><a href="{{ route('admin.bis.index') }}"><i class="fa fa-circle-o"></i>BIS</a></li>
                          <li><a href="{{ route('admin.terbilang.index') }}"><i class="fa fa-circle-o"></i>FUNGSI TERBILANG</a></li>
                          <li><a href="{{ route('admin.jarakwaktu.index') }}"><i class="fa fa-circle-o"></i>JARAK & WAKTU</a></li>
                        </ul>
                    </li>
                <li class="header">LABELS</li>
            </ul>
    </section>
    <!-- /.sidebar -->
  </aside>























