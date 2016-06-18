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
        <h3>Referensi Jabatan Golongan <i class="fa fa-angle-double-down "></i></h3>

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
                <h4 class="modal-title" id="myModalLabel">Input Data Golongan</h4>
              </div>
              <div class="modal-body">

                <form class="form-horizontal" action="../crud/gol_ruang_Simpan.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">

                      <div class="col-lg-12">
                        <label for="gol" class="col-sm-3 control-label"> Kode Gol.</label>
                        <div class="col-sm-9">
                          <input type="text" name="gol_ruang" class="form-control" placeholder="Masukkan Kode" required=""><br>
                        </div>
                        <label for="pangkat" class="col-sm-3 control-label">Golongan</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" name="pangkat" placeholder="Masukkan Golongan" required=""><br>
                      </div>
                      </div>

                    </div>
                    
                  </div>
                

              </div>
              <div class="modal-footer">
                <button type="submit" value="Simpan" name="Simpan" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              </div>
                </form>
            </div>
          </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="10px"><center>No</center></th>
                <th width="90px"><center>Kode Gol.</center></th>
                <th ><center>Golongan</center></th>
                <th width="150px"><center>Action</center></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th width="10px"><center>No</center></th>
                <th width="90px"><center>Kode Gol.</center></th>
                <th ><center>Golongan</center></th>
                <th width="150px"><center>Action</center></th>
              </tr>
            </tfoot>
            <tbody>
            <?php
				include("../koneksi/koneksi.php");

				$no	=	1;
				$data_jd	=	mysql_query('select * from gol_ruang order by id desc');
				while($data	=	mysql_fetch_array($data_jd)){
			?>
              <tr>
                <td> <center><?php echo $no; ?></center></td>
                <td><center><?php echo $data['gol_ruang']; ?><center></td>
                <td><?php echo $data['pangkat']; ?></td>
                <td> <center>
                  <a class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModalEdit<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit</a>
                  <a data-toggle="modal" data-target="#modalHapus<?php echo $data['id']; ?>" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a> </center></td>

                <!-- Dialog Modal Edit -->
                  <div class="modal fade" id="myModalEdit<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $data['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel<?php echo $data['id']; ?>">Edit Data</h4>
                        </div>
                        <div class="modal-body">

                          <form class="form-horizontal" action="../crud/gol_ruang_Simpan.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                              <div class="form-group">

                                <div class="col-lg-12">
                                  <label for="gol" class="col-sm-3 control-label">Kode Gol.</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="gol_ruang" class="form-control" placeholder="Masukkan Kode Gol." value="<?php echo $data['gol_ruang']; ?>" required=""><br>
                                  </div>
                                  <label for="pangkat" class="col-sm-3 control-label">Golongan</label>
                                  <div class="col-sm-9">
                                  <input type="text" class="form-control" name="pangkat" placeholder="Masukkan Golongan" value="<?php echo $data['pangkat']; ?>" required=""><br>
                                </div>
                                </div>
<br><br><br><br><br>
                              </div>
                             
                            </div>
                          

                        </div>
                        <div class="modal-footer">
                          <button type="submit" value="Simpan" name="Edit" class="btn btn-primary">Save</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                          </form>
                      </div>
                    </div>
                  </div>
                  <!-- hapus modal -->
                  <div class="modal fade" id="modalHapus<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $data['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel<?php echo $data['id']; ?>"><center>Apakah Anda Yakin? </center></h4>
                        </div>
                        <div class="modal-body">

                          <center>
                          <span>  <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button></span>
                          <span>  <a href="../crud/gol_ruang_Simpan.php?id=<?php echo $data['id']; ?>"><button type="submit" value="Simpan" name="Delete" class="btn btn-danger">Hapus</button></a></span>
                          </center>

                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- tutup hapus -->
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
