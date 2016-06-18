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
        <h3>Laporan Riwayat Hidup <i class="fa fa-angle-double-down "></i></h3>


        <!-- <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p> -->
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <!-- <div class="col-lg-12">
            <h3 class="box-title"> <i class="fa fa-search"> Pencarian / Filter</i> </h3>
          </div><br><br>
          <div class="col-lg-5">
            <input type="text" id="riwayat-hidup" class="form-control" placeholder="Silahkan isikan Nama Pegawai">
          </div> -->
          <table id="data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th >No</th>
                <th ><center>Foto</center></th>
                <th ><center>Data Diri</center></th>
                <th ><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
            <?php
        $no = 1;
        $no2=10;
        $data_pegawai = mysql_query('select * from data_pegawai order by id desc');
        while($data = mysql_fetch_array($data_pegawai)){
          
      ?>
              <tr>
                <td width="30"><center><?php echo $no; ?></center></td>
                <td width="150">
                  <?php
                  //DEFAULT FOTO JIKA KOSONG//
                    if($data['foto']=="../assets/images/" || $data['foto']=="")
                      $foto = "../assets/images/an.jpg";
                    else
                      $foto = $data['foto'];
                  ?>
                  <a class="thumbnail">                  
                  <img src="<?php echo $foto ?>" width="150" height="200" class="img-responsive"></a>
                </td>
                <td width="250">  
                  <div class="clearfix ulku2">
                    <div class="col-sm-2 control-label">Nama</div>
                    <div class="col-sm-10"form-co>
                      : &nbsp;&nbsp;<?php echo $data['gelar_depan']; ?> <?php  echo $data['nama']; ?> <?php echo $data['gelar_belakang']; ?>
                    </div>
                  </div>
                  <div class="clearfix ulku2">
                    <div class="col-sm-2 control-label">Nip</div>
                    <div class="col-sm-10"form-co>
                      : &nbsp;&nbsp;<?php echo $data['nip']; ?>
                    </div>
                  </div>
                  <div class="clearfix ulku2">
                    <div class="col-sm-2 control-label">Agama</div>
                    <div class="col-sm-10"form-co>
                      : &nbsp;&nbsp;<?php
                                      $qagama=$data['agama'];
                                      $qagama2=mysql_query("select agama from agama where id='$qagama' ");
                                      $qagama3=mysql_fetch_array($qagama2);
                                      echo $qagama3[0];
                                    ?>
                    </div>
                  </div>
                  <div class="clearfix ulku2">
                    <div class="col-sm-2 control-label">Umur</div>
                    <div class="col-sm-10"form-co>
                      : &nbsp;&nbsp;<?php
                                      $viewdate1 = date("Y", strtotime($data['tanggal_lahir']));
                                      $viewdate2 = date("Y");
                                      echo $viewdate3 = $viewdate2 - $viewdate1;
                                    ?> Thn
                    </div>
                  </div>
                  <div class="clearfix ulku2">
                    <div class="col-sm-2 control-label">JKel</div>
                    <div class="col-sm-10"form-co>
                      : &nbsp;&nbsp;<?php
                                      $qjkel=$data['jenis_kelamin'];
                                      $qjkel2=mysql_query("select jenis_kelamin from jenis_kelamin where id='$qjkel' ");
                                      $qjkel3=mysql_fetch_array($qjkel2);
                                      echo $qjkel3[0];
                                    ?>
                    </div>
                  </div>
                </td>
                <td width="150">
                 <a href="cetak-riwayat-hidup.php?id=<?php echo $data['id'] ?>" target="_blank"><button class="btn btn-success btn-md"> <i class="fa fa-save"></i>
                     Export ke PDF
                  </button></a><br>
                  <a href="laporan-riwayat-hidup-excel.php?id=<?php echo $data['id'] ?>" target="_blank"><button class="btn btn-info btn-md"> <i class="fa fa-save"></i>
                     Export ke Excel
                  </button></a>
                </td>
               </tr>
      <?php
        $no++;
        $no2++;
        }
      ?>
            </tbody>
          </table>

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
