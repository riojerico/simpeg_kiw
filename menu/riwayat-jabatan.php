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
        <h3>Riwayat Jabatan <i class="fa fa-angle-double-down "></i></h3>

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
                  <th ><center>Foto</center></th>
                  <th ><center>Data Diri</center></th>
                  <th ><center>Data Kepegawaian</center></th>
                  <th ><center>Action</center></th>
                </tr>
              </thead>
              <tbody>
              <?php
  				$no	=	1;
  				$data_pegawai	=	mysql_query('select * from data_pegawai order by id desc');
  				while($data	=	mysql_fetch_array($data_pegawai)){
  			?>
                <tr>

                  <td width="200">
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
                  <td width="300">
                    <ul><b><?php echo $data['gelar_depan']; ?> <?php  echo $data['nama']; ?>, <?php echo $data['gelar_belakang']; ?></b></ul>
                    <ul>Nip           :<?php echo $data['nip']; ?></ul>
                    <ul>Tempat Lahir  :<?php echo $data['agama']; ?></ul>
                    <ul>
                      <?php $viewdate1 = date("Y", strtotime($data['tanggal_lahir']));
                      $viewdate2 = date("Y");
                      echo $viewdate3 = $viewdate2 - $viewdate1; ?> Thn
                    </ul>
                    <ul>Jenis Kelamin :<?php echo $data['jenis_kelamin']; ?></ul>
                  </td>
                  <td
                    width="250"><?php echo $data['nama']; ?><br>

                    <a class="btn btn-primary btn-xs col-md-12" data-toggle="modal" data-target="#myModalView<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>Lihat Selengkapnya</a>

                  </td>
                  <td width="200"><center>
                   <a class="btn btn-info btn-md" href="riwayat-jabatan-view.php?id=<?php echo $data['id']; ?>"><span class="fa fa-arrow-circle-right " aria-hidden="true"></span> Riwayat Jabatan</a>
                  </center>
                  </td>

                  <?php
                  // include "data-pegawai/modal-view.php";
                  // include "data-pegawai/modal-edit.php";
                  // include "data-pegawai/modal-hapus.php";
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
