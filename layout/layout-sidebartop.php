<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Administrator</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="../dashboard/admin.php">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

<!--New -->
<li class="treeview">
  <a href="#">
    <i class="fa fa-database"></i> <span>Master Data</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="#"><i class="fa fa-database"></i> Data Umum <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li class=""><a href="../menu/dataumum-agama.php"><i class="fa fa-star"></i> Agama</a></li>
        <li class=""><a href="../menu/dataumum-bentuk-wajah.php"><i class="fa fa-smile-o"></i> Bentuk Wajah</a></li>
        <li class=""><a href="../menu/dataumum-jenis-rambut.php"><i class="fa fa-user"></i> Jenis Rambut</a></li>
        <li class=""><a href="../menu/dataumum-jenjang-pendidikan.php"><i class="fa fa-graduation-cap"></i> Jenjang Pendidikan</a></li>
        <!-- <li class=""><a href="../menu/dataumum-jenis-diklat.php"><i class="fa fa-circle-o"></i> Jenis Diklat</a></li> -->
        <li class=""><a href="../menu/dataumum-status-pernikahan.php"><i class="fa fa-file"></i> Status Pernikahan</a></li>
      </ul>
    </li>
    <li>
      <a href="#"><i class="fa fa-building-o"></i> Data Instansi <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><a href="../menu/refjab-jenis-jabatan.php"><i class="fa fa-briefcase"></i> Referensi Jabatan </a></li>
        <li class=""><a href="../menu/datainstansi-unit-kerja.php"><i class="fa fa-share-alt-square"></i> Unit Kerja</a></li>
        <li class=""><a href="../menu/refjab-gol-ruang.php"><i class="fa fa-signal"></i> Golongan</a></li>
        <li class=""><a href="../menu/datainstansi-status-pegawai.php"><i class="fa fa-folder-open-o"></i> Status Pegawai</a></li>
        <li class=""><a href="../menu/datainstansi-penghargaan.php"><i class="fa fa-trophy"></i> Penghargaan</a></li>
        <li class=""><a href="../menu/datainstansi-hukuman.php"><i class="fa fa-legal"></i> Hukuman</a></li>
        <li class=""><a href="../menu/datainstansi-teguran.php"><i class="fa fa-warning"></i> Teguran</a></li>
      </ul>
    </li>

    <li>
      <a href="../menu/usia-pensiun.php"><i class="fa fa-wheelchair"></i> Usia Pensiun </a>
    </li>

   <!--  <li>
      
      <ul class="treeview-menu">
        <li class=""><a href=""><i class="fa fa-briefcase"></i> Jabatan Fungsional</a></li>
        <li class=""><a href="../menu/refjab-jabatan.php"><i class="fa fa-circle-o"></i> Jabatan</a></li>
        <li class=""><a href="../menu/refjab-jenis-kenaikan-pangkat.php"><i class="fa fa-circle-o"></i> Jns. Kenaikan Pangkat</a></li>
        
      </ul>
    </li> -->
  </li>
  </ul>

<li class="treeview">
  <a href="#">
    <i class="fa fa-users"></i> <span>Data Pegawai</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  <li class="active"><a href="../menu/data-pegawai.php"><i class="fa fa-user"></i> Data Pegawai</a></li>
  <li>
    <a href="../menu/data-keluarga.php"><i class="fa fa-users"></i> Data Keluarga </a></li>
  <!-- <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Penilaian Pegawai</a></li> -->
</ul>
</li>

<!-- <li class="treeview">
  <a href="#">
    <i class="fa fa-envelope-o"></i> <span>Transaksi Pegawai</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Transaksi Pensiun</a></li>
</ul>
</li> -->

<li class="treeview">
  <a href="../menu/riwayat.php">
    <i class="fa fa-history"></i> <span>Riwayat Pegawai</span>
  </a>
  <!-- <ul class="treeview-menu">
  <li class="active"><a href="../menu/riwayat-pendidikan.php"><i class="fa fa-circle-o"></i> Riwayat Pendidikan</a></li>
  <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Riwayat Jabatan</a></li> -->
  <!-- <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Riwayat Kepangkatan</a></li> -->
  <!-- <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Riwayat Hukdis</a></li>
  <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Riwayat Diklat</a></li>
  <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Riwayat Organisasi</a></li>
  <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Riwayat Penghargaan</a></li>
  <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Riwayat Seminar</a></li>
  <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Riwayat Penugasan LN</a></li>
  <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Riwayat Bahasa</a></li> -->
  <!-- <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Riwayat Cuti</a></li> -->
<!-- </ul> -->
</li>

<!-- <li class="treeview">
  <a href="#">
    <i class="fa fa-stack-overflow"></i> <span>Rekapitulasi</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Agama & Jenis Kelamin</a></li>
    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Golongan </a></li>
  </ul>
</li> -->

<li class="treeview">
  <a href="#">
    <i class="fa fa-book"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
  <li class="active"><a href="../menu/laporan-pegawai.php"><i class="fa fa-file-pdf-o"></i> Laporan Pegawai </a></li>
    <li class="active"><a href="../menu/laporan-riwayat-hidup.php"><i class="fa fa-file-pdf-o"></i> Daftar Riwayat Hidup</a></li>
    <li class="active"><a href="../menu/laporan-jabatan.php"><i class="fa fa-file-pdf-o"></i> Daftar Urut Kepangkatan</a></li>
    <li class="active"><a href="../menu/laporan-status-pegawai.php"><i class="fa fa-file-pdf-o"></i> Berdasarkan Status</a></li>
    <li class="active"><a href="../menu/laporan-riwayat-pilihan.php"><i class="fa fa-file-pdf-o"></i> Laporan Riwayat Pilihan</a></li>
    <li class="active"><a href="../menu/laporan-teguran.php"><i class="fa fa-file-pdf-o"></i> Laporan Teguran </a></li>
    <li class="active"><a href="../menu/laporan-komposisi-jabatan.php"><i class="fa fa-file-pdf-o"></i> Laporan Komposisi Jabatan</a></li>
    <li class="active"><a href="../menu/laporan-pensiun.php"><i class="fa fa-file-pdf-o"></i> Laporan Pensiun</a></li>

  </ul>
</li>

<!-- <li class="treeview">
  <a href="#">
    <i class="fa fa-gears"></i> <span>Pengaturan Sistem</span> <i class="fa fa-angle-left pull-right"></i>
  </a>
  <ul class="treeview-menu">
    <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Group Pengguna</a></li>
    <li class="active"><a href="#"><i class="fa fa-circle-o"></i> User & Admin </a></li>
  </ul>
</li> -->
<li class="header">ACCOUNTS</li>
<li class="treeview">
  <a href="../menu/user-management.php">
    <i class="fa fa-gears"></i> <span>User Management</span> 
  </a>
</li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
