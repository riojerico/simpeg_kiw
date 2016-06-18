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
        <h3>Riwayat Pegawai <i class="fa fa-angle-double-down "></i></h3>

        <!-- <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p> -->
      </div>

      <div class="box">

        <!-- /.box-header -->
        <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th ><center>Foto</center></th>
                  <th ><center>Data Diri</center></th>
                  <th ><center>Riwayat</center></th>
                </tr>
              </thead>
              <tbody>
              <?php
  				$no	=	1;
  				$data_pegawai	=	mysql_query('select * from data_pegawai order by id desc');
  				while($data	=	mysql_fetch_array($data_pegawai)){
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
                    //DEFAULT FOTO JIKA KOSONG//
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
                 <td width="200"><left>
                 <div class="col-sm-6">
                   
                     <a class="btn bg.bg-purple btn-md" href="riwayat-pendidikan-view.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Pendidikan</a>
                                      
                     <a class="btn bg.bg-purple btn-md" href="riwayat-jabatan-view.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Jabatan</a>
                                      
                     <a class="btn bg.bg-purple btn-md" href="riwayat-pelatihan-view.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Pelatihan</a>
                                      
                     <a class="btn bg.bg-purple btn-md" href="riwayat-penghargaan-view.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Penghargaan</a>
                   
                     <a class="btn bg.bg-purple btn-md" href="riwayat-seminar-view.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Seminar</a>
                   </ul>
                  <!--  <ul>
                     <a class="btn btn-info btn-md" href="riwayat-#-view.php?id=<?php echo $data['id']; ?>" target="_blank"><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Riwayat Cuti / Izin</a>
                   </ul> -->
                </div>
                  
                  <div class="col-sm-6">
                   
                     <a class="btn bg.bg-purple btn-md" href="riwayat-organisasi-view.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Organisasi</a>
                                      
                     <a class="btn bg.bg-purple btn-md" href="riwayat-gajipokok-view.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Gaji Pokok</a>
                                      
                     <a class="btn bg.bg-purple btn-md" href="riwayat-hukuman-view.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Hukuman</a>
                                      
                     <a class="btn bg.bg-purple btn-md" href="riwayat-teguran-view.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Teguran</a>

                     <a class="btn bg.bg-purple btn-md" href="riwayat-dp3-view.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Penilaian Kinerja</a>
                   
                  <!--  <ul>
                     <a class="btn btn-info btn-md" href="riwayat-#-view.php?id=<?php echo $data['id']; ?>" target="_blank"><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Riwayat Cuti / Izin</a>
                   </ul> -->
                   </div>
                 </left>
                  </td>

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
