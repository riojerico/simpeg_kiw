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
        <h3>Laporan Komposisi Jabatan <i class="fa fa-angle-double-down "></i></h3>

        <!-- <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p> -->
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <div class="col-lg-12">
            <h3 class="box-title"> <i class="fa fa-search"> Pencarian / Filter</i> </h3>
          </div><br><br>
          <div class="col-lg-12">
            
  <table border="1" align="center" class="table table-bordered table-striped">
    <thead>
      <tr>

        <th width="15" align="center" rowspan="2"><strong><center>No</center></strong></th>
        <th width="150" align="center" rowspan="2"><strong><center>Jabatan</center></strong></th>
        <th width="70" align="center" rowspan="2"><strong><center>Jumlah</center></strong></th>
        <th width="250" align="center" colspan="8"><strong><center>Pendidikan</center></strong></th>
        <th width="120" align="center" colspan="6"><strong><center>Usia</center></strong></th>
        <th width="120" align="center" colspan="2"><strong><center>JKel</center></strong></th>
        
      </tr>
    </thead>
    
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th align="center"><center>S3</center></td>
        <th align="center"><center>S2</center></td>
        <th align="center"><center>S1</center></td>
        <th align="center"><center>D3</center></td>
        <th align="center"><center>SMA / SMK</center></td>
        <th align="center"><center>SMP</center></td>
        <th align="center"><center>SD</center></td>
        <th align="center"><center>Tidak Sekolah</center></td>
        <th align="center"><center> &lt; 30 </center></td>
        <th align="center"><center> 30-34 </center></td>
        <th align="center"><center> 35-39 </center></td>
        <th align="center"><center> 40-44 </center></td>
        <th align="center"><center>45-50</center></td>
        <th align="center"><center> > 51 </center></td>
        <th align="center"><center> L</center></td>
        <th align="center"><center> P</center></td>
      </tr>

      <?php
      $q=mysql_query("select * from jenis_jabatan");
      while($data=mysql_fetch_array($q)){
      $no++;

      $idj=$data['id'];

      $qs3=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '9' and jabatan = '$idj' "));

      $qs2=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '8' and jabatan = '$idj' "));

      $qs1=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '7' and jabatan = '$idj' "));

      $qd3=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '5' and jabatan = '$idj' "));

      $qslta=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '3' and jabatan = '$idj' "));

      $qsmp=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '2' and jabatan = '$idj' "));

      $qsd=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '1' and jabatan = '$idj' "));

      $qnull=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '0' and jabatan = '$idj' "));

      //jumlah
      $qjumlah=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where jabatan = '$idj' "));

      //< 30
      $umur1=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur <30 and jabatan = '$idj' "));

      //30 - 34
      $umur2=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur between 30 and 34 and jabatan = '$idj' "));

      //30 - 34
      $umur3=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur between 35 and 39 and jabatan = '$idj' "));

      //30 - 34
      $umur4=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur between 40 and 44 and jabatan = '$idj' "));

      //30 - 34
      $umur5=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur between 45 and 50 and jabatan = '$idj' "));

      //< 30
      $umur6=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur >=51 and jabatan = '$idj' "));

      $jkel1=mysql_fetch_array(mysql_query("SELECT count(jenis_kelamin) from view_datapegawai_update where jabatan ='$idj' and jenis_kelamin='1' "));
      $jkel2=mysql_fetch_array(mysql_query("SELECT count(jenis_kelamin) from view_datapegawai_update where jabatan ='$idj' and jenis_kelamin='2' "));

      ?>
      <tr>
        <td align="center"><?php echo $no ?></td>
        <td align="left"><?php echo $data['jenis_jabatan'] ?></td>
        <td align="center"><?php echo $qjumlah[0] ?></td>
        <td align="center"><?php if($qs3[0]==0) echo '-'; else echo $qs3[0]; ?></td>
        <td align="center"><?php if($qs2[0]==0) echo '-'; else echo $qs2[0]; ?></td>
        <td align="center"><?php if($qs1[0]==0) echo '-'; else echo $qs1[0]; ?></td>
        <td align="center"><?php if($qd3[0]==0) echo '-'; else echo $qd3[0]; ?></td>
        <td align="center"><?php if($qslta[0]==0) echo '-'; else echo $qslta[0]; ?></td>
        <td align="center"><?php if($qsmp[0]==0) echo '-'; else echo $qsmp[0]; ?></td>
        <td align="center"><?php if($qsd[0]==0) echo '-'; else echo $qsd[0]; ?></td>
        <td align="center"><?php if($qnull[0]==0) echo '-'; else echo $qnull[0]; ?></td>
        <td align="center"><?php if($umur1[0]==0) echo '-'; else echo $umur1[0]; ?></td>
        <td align="center"><?php if($umur2[0]==0) echo '-'; else echo $umur2[0]; ?></td>
        <td align="center"><?php if($umur3[0]==0) echo '-'; else echo $umur3[0]; ?></td>
        <td align="center"><?php if($umur4[0]==0) echo '-'; else echo $umur4[0]; ?></td>
        <td align="center"><?php if($umur5[0]==0) echo '-'; else echo $umur5[0]; ?></td>
        <td align="center"><?php if($umur6[0]==0) echo '-'; else echo $umur6[0]; ?></td>
        <td align="center"><?php if($jkel1[0]==0) echo '-'; else echo $jkel1[0]; ?></td>
        <td align="center"><?php if($jkel2[0]==0) echo '-'; else echo $jkel2[0]; ?></td>
      </tr> 

    <?php
    }
    ?>  
  </table>  
  <a href="cetak-komposisi-jabatan.php" target="_blank"><button type="submit" value="submitJabatan" name="submitJabatan" class="btn btn-success" ><i class="fa fa-save"></i> Export Ke PDF</button></a>
  <a href="laporan-komposisi-jabatan-excel.php" target="_blank"><button type="submit" value="submitJabatan" name="submitJabatan" class="btn btn-info" ><i class="fa fa-save"></i> Export Ke Excel</button></a>
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
