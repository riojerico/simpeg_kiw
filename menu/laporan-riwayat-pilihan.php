<?php
include ('../layout/layout-header.php');
include ('../layout/layout-sidebartop.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>

        <small></small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Layout</a></li>
        <li class="active">Fixed</li>
      </ol>
    </section> -->

    <!-- Main content -->
    
    <section class="content">
      <div class="">
        <h3>Laporan Riwayat Pilihan <i class="fa fa-angle-double-down "></i></h3>
        <!-- <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p> -->
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <div class="col-lg-12">
            <h3 class="box-title"> <i class="fa fa-search"> Pencarian / Filter</i> </h3>
          </div><br><br>
          <div class="col-lg-5">
            <form action="cetak-riwayat-pilihan.php" method="post" target="_blank" autocomplete="off">
              <div class="clearfix">
                <label class="col-sm-4 control-label">Nip</label> 
                <div class="col-sm-8">
                  <input type="text" class="form-control mb10" name="nip" id="nip" readonly>
                </div>
              </div> 
              <div class="clearfix">
                <label class="col-sm-4 control-label">Nama</label> 
                <div class="col-sm-8">
                  <input type="text" class="form-control mb10" name="nama" id="nama" onKeyUp="autoComplete();">
                  <ul id="hasil" class="">
                  </ul>
                </div>
              </div>    
              <div class="clearfix">
                <label class="col-sm-4 control-label">No Transaksi</label> 
                <div class="col-sm-8">
                  <select name="riwayat" id="riwayat" class="form-control mb10">
                    <option value="0">Pilih Riwayat</option>
                    <option value="1">Pendidikan</option>
                    <option value="2">Jabatan</option>
                    <option value="3">Gaji Pokok</option>
                    <option value="4">Hukuman</option>
                    <option value="5">Organisasi</option>
                    <option value="6">Pelatihan</option>
                    <option value="7">Penghargaan</option>
                    <option value="8">Seminar</option>
                    <option value="9">DP3 / Penilaian Kerja</option>         
                  </select>
                </div>
              </div>
              <input type="hidden" class="form-control mb10" name="id_peg" id="id_peg">
              <button type="submit" value="submitJabatan" name="submitJabatan" class="btn btn-success" ><i class="fa fa-save"></i> Export Ke PDF</button>
              <button type="submit" value="excel" name="excel" class="btn btn-info" ><i class="fa fa-save"></i> Export Ke Excel</button>              
            </form>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php

include ('../layout/layout-footer.php');
include ('../layout/layout-sidebar.php');
include ('../layout/layout-js.php');
?>
