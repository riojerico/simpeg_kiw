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
        <h3>Data Keluarga <i class="fa fa-angle-double-down "></i></h3>

        <!-- <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p> -->
      </div>

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">  <!-- Tombol Untuk menampilkan modal -->

</h3>
        </div>

              <!-- Dialog Modal Input -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Input Data Tingkat Eselon</h4>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" action="../crud/tingkat_eselon_Simpan.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">

                      <div class="col-lg-12">

                      <label for="satuan" class="col-sm-3 control-label">Eselon</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="eselon" placeholder="Masukkan Eselon" required=""><br>
                    </div>
                      </div>

                    </div>
                    <div class="box-footer">
                     <button type="submit" value="Simpan" name="Simpan" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th ><center>Foto</center></th>
                  <th ><center>Data Diri</center></th>
                  <th ><center>Data Keluarga</center></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th ><center>Foto</center></th>
                  <th ><center>Data Diri</center></th>
                  <th ><center>Data Keluarga</center></th>
                </tr>
              </tfoot>
              <tbody>
              <?php
          $no = 1;
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
                    <div class="col-sm-2 control-label">NIK</div>
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
                <td width="100"><left>
                   <a class="btn bg.bg-purple btn-md" href="data-keluarga-anak.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Anak</a>
                   <br>
                   <a class="btn bg.bg-olive btn-md" href="data-keluarga-istrisuami.php?id=<?php echo $data['id']; ?>" ><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Data Istri / Suami</a>
                   <br>
                   <a class="btn bg.bg-navy btn-md" href="data-keluarga-orangtua.php?id=<?php echo $data['id']; ?>"><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Orangtua</a>
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
