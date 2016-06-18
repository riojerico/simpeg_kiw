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
        <h3>Laporan Berdasarkan Status Pegawai <i class="fa fa-angle-double-down "></i></h3>

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
            <form action="laporan-status-pegawai.php" method="post">
            <select name="jenis_jabatan" id="jenis_jabatan" class="form-control mb10">
              <option value="1">Pegawai Aktif</option>
              <option value="0">Pegawai Pensiun</option>
            </select>
              <button type="submit" value="submitJabatan" name="submitJabatan" class="btn btn-primary">Lihat Data</button>
            </form>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      <?php
        $submitJabatan=$_REQUEST['submitJabatan'];
        if($submitJabatan) 
        {
          $getjenis_jabatan=$_POST['jenis_jabatan'];
        ?>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
          <a href="cetak-status-pegawai.php?id=<?php echo $getjenis_jabatan ?>" target="_blank"><button class="btn btn-success btn-md"> <i class="fa fa-save"></i>
             Export ke PDF
            </button>
          </a>
          <a href="laporan-status-pegawai-excel.php?id=<?php echo $getjenis_jabatan ?>" target="_blank"><button class="btn btn-info btn-md"> <i class="fa fa-save"></i>
             Export ke Excel
            </button>
          </a>

          </h3>
        </div>

        <!-- /.box-header -->
          <table id="" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th >No</th>
                <th ><center>Nip</center></th>
                <th ><center>Nama</center></th>
                <th ><center>Jabatan</center></th>
                <th ><center>Status</center></th>
                <th ><center>Umur</center></th>
              </tr>
            </thead>
            <tbody>
          <?php
            $getpensiun=mysql_fetch_array(mysql_query("select usia from usia_pensiun"));
            $getpensiun2=$getpensiun[0]-1;
            $q=mysql_query("select * from view_datapegawai_update where umur >='$getpensiun2' ");
        
    				$no	=	1;
            if($getjenis_jabatan==1)
              $data_jabatan = mysql_query("select * from view_datapegawai_update where umur < '$getpensiun2'");
            else if($getjenis_jabatan==0)
    				  $data_jabatan	=	mysql_query("select * from view_datapegawai_update where umur >='$getpensiun2'");
    				while($data_jabatan2	=	mysql_fetch_array($data_jabatan)){

    			  $getJabatan=$data_jabatan2['jabatan'];
            $getJabatan2=mysql_query("select jenis_jabatan from jenis_jabatan where id='$getJabatan'");
            $getJabatan3=mysql_fetch_array($getJabatan2);

            $status=$data_jabatan2['status_peg'];
            $status2=mysql_fetch_array(mysql_query("select status_pegawai from master_statuspegawai where id='$status' "));

          ?>     
              <tr>
                <td width="30"><center><?php echo $no; ?></center></td>
                <td width="200"><center><?php echo $data_jabatan2['nip']; ?></center></td>
                <td width="300"><center><?php echo $data_jabatan2['nama']; ?></center></td>
                <td width="200"><center><?php echo $getJabatan3[0] ?></center></td>
                <td align="center"><?php echo $status2[0] ?></td>
                <td width="200"><center><?php echo $data_jabatan2['umur']; ?></center></td>
              </tr>
    			<?php
    				$no++;
    				}
    			?>
            </tbody>
          </table>
          <?php 
          
        }
          else
          {
            echo '<p align="center"><strong>Data Kosong</strong></p><br>';
          } ?>
        </div>
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
