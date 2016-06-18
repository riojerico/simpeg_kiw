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
        <h3>Laporan Pegawai Tahun <?php echo date(Y) ?><i class="fa fa-angle-double-down "></i></h3>

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
          <a href="cetak-pegawai.php" target="_blank"><button type="submit" value="submitJabatan" name="submitJabatan" class="btn btn-success" ><i class="fa fa-save"></i> Export Ke PDF</button></a>
          <a href="laporan-pegawai-excel.php" target="_blank"><button type="submit" value="submitJabatan" name="submitJabatan" class="btn btn-info" ><i class="fa fa-save"></i> Export Ke Excel</button></a>
          <br><br>            
          <table border="1" align="center" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th width="15" align="center"><strong><center>No</center></strong></th>
                <th width="100" align="center"><strong><center>Nip</center></strong></th>
                <th width="200" align="center"><strong><center>Nama</center></strong></th>
                <th width="100" align="center"><strong><center>Jabatan</center></strong></th>
                <th width="100" align="center"><strong><center>Pendidikan</center></strong></th>
                <th width="100" align="center"><strong><center>Status</center></strong></th>
                <th width="70" align="center"><strong><center>Umur</center></strong></th>        
              </tr>
            </thead>

              <?php
              $q=mysql_query("select * from view_datapegawai_pendidikan order by jabatan ");
              while($data=mysql_fetch_array($q)){
              $no++;

              $getjabatan=$data['jabatan'];
              $getjabatan2=mysql_fetch_array(mysql_query("select jenis_jabatan from jenis_jabatan where id='$getjabatan' "));

              $getpdd=$data['tingkat'];
              $getpdd2=mysql_fetch_array(mysql_query("select pendidikan from jenjang_pendidikan where id='$getpdd' "));

              $status=$data['status_peg'];
              $status2=mysql_fetch_array(mysql_query("select status_pegawai from master_statuspegawai where id='$status' "));

              ?>
              <tr>
                <td align="center"><?php echo $no ?></td>
                <td align="center"><?php echo $data['nip'] ?></td>
                <td align="center"><?php echo $data['gelar_depan'];echo'  ';echo $data['nama'];echo'  ';echo $data['gelar_belakang'] ?></td>
                <td align="center"><?php echo $getjabatan2[0] ?></td>
                <td align="center"><?php echo $getpdd2[0] ?></td>
                <td align="center"><?php echo $status2[0] ?></td>
                <td align="center"><?php echo $data['umur'] ?> Tahun</td>
              </tr> 

            <?php
            }
            ?>  
          </table>
          
                    
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
