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
        <h3>Referensi Data Pegawai <i class="fa fa-angle-double-down "></i></h3>

        <!-- <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p> -->
      </div>
      

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">  <!-- Tombol Untuk menampilkan modal -->
          <button class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i>
             Tambah Data
          </button>

          </h3>
        </div>
        
        <!-- Modal -->
        <?php include "data-pegawai/modal-input.php" ?>
        <!-- /Modal -->

        <!-- /.box-header -->
        <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
            <thead>
              <tr>
                  <!-- <th>No</th> -->
                  <th ><center>Foto</center></th>
                  <th ><center>Data Diri</center></th>
                  <th ><center>Data Kepegawaian</center></th>
                  <th ><center>Action</center></th>
                </tr>
              </thead>
              <tbody>
          
              <?php
             
          $no = 1;
          $data_pegawai = mysql_query('select * from view_datapegawai_update order by id desc');
          while($data = mysql_fetch_array($data_pegawai)){
        ?>
                <tr>
                  <!-- <td width="30"><center><?php echo $no; ?></center></td> -->
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
                    <strong>&nbsp;&nbsp;&nbsp;<?php echo $data['gelar_depan']; ?> <?php  echo $data['nama'];?>, <?php echo $data['gelar_belakang']; ?></strong>
                    </div>
                  </div>
                  <div class="clearfix ulku2">
                    <div class="col-sm-2 control-label">NIK</div>
                    <div class="col-sm-10"form-co>
                      : &nbsp;&nbsp;<?php echo $data['nip']; ?>
                    </div>
                  </div>
                  <div class="clearfix ulku2">
                    <div class="col-sm-2 control-label">Lahir</div>
                    <div class="col-sm-10"form-co>
                      : &nbsp;&nbsp;<?php
                                      echo date("d M Y", strtotime($data['tanggal_lahir']))
                                    ?>
                    </div>
                  </div>
                  <div class="clearfix ulku2">
                    <div class="col-sm-2 control-label">Umur</div>
                    <div class="col-sm-10"form-co>
                      : &nbsp;&nbsp;<?php
                                     
                                      echo $data['umur'];
                                    ?> Thn
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
                  <td width="220"><br>
                    <!-- <div class="clearfix ulku2">
                      <div class="col-sm-5 control-label">Instansi</div>
                      <div class="col-sm-7 ulku3"form-co>
                        : &nbsp;&nbsp;<?php
                                        echo $data['instansi'];
                                      ?>
                      </div>
                    </div> -->
                    <div class="clearfix ulku2">
                      <div class="col-sm-5 control-label">Jabatan</div>
                      <div class="col-sm-7 ulku3"form-co>
                        : &nbsp;&nbsp;<?php
                                        $jabatan=$data['jabatan'];
                                        $jabatan2=mysql_query("select jenis_jabatan from jenis_jabatan where id='$jabatan' ");
                                        $jabatan3=mysql_fetch_array($jabatan2);
                                        echo $jabatan3[0];
                                      ?>
                      </div>
                    </div>
                    <div class="clearfix ulku2">
                      <div class="col-sm-5 control-label">Nomor SK</div>
                      <div class="col-sm-7 ulku3"form-co>
                        : &nbsp;&nbsp;<?php
                                        echo $data['nosk'];
                                      ?>
                      </div>
                    </div>
                    <div class="clearfix ulku2">
                      <div class="col-sm-5 control-label">Tanggal SK</div>
                      <div class="col-sm-7 ulku3"form-co>
                        : &nbsp;&nbsp;<?php
                                        echo $data['tglsk'];
                                      ?>
                      </div>
                    </div>
                    <!-- <div class="clearfix ulku2">
                      <div class="col-sm-5 control-label">No Lantik</div>
                      <div class="col-sm-7 ulku3"form-co>
                        : &nbsp;&nbsp;<?php
                                        echo $data['nolantik'];
                                      ?>
                      </div>
                    </div>
                    <div class="clearfix ulku2">
                      <div class="col-sm-5 control-label">Tanggal Lantik</div>
                      <div class="col-sm-7 ulku3"form-co>
                        : &nbsp;&nbsp;<?php
                                        echo $data['tgllantik'];
                                      ?>
                      </div>
                    </div> -->
                    <br><a class="btn btn-primary btn-xs col-md-12" data-toggle="modal" href="data-pegawai-view.php?id=<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>Lihat Selengkapnya</a>
                  </td>
                <td width="150"><center>
                 <a class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModalEdit<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit</a>
                 <a data-toggle="modal" data-target="#modalHapus<?php echo $data['id']; ?>" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a> </center>
                  </center>
                </td>

                <?php
                include 'data-pegawai/ajax_kota.php';
               
                include "data-pegawai/modal-edit.php";
                include "data-pegawai/modal-hapus.php";
                ?>
               </tr>
			<?php
				$no++;
				}
			?>
            </tbody>
          </table>
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
