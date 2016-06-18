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
        <h3>Referensi Data Usia Pensiun <i class="fa fa-angle-double-down "></i></h3>

        <!-- <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p> -->
      </div>

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">  <!-- Tombol Untuk menampilkan modal -->

</h3>
        </div>

      

        <!-- /.box-header -->
        <div class="box-body">
        <DIV class="col-lg-6">
          <table id="" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th ><center>Usia Pensiun</center></th>
                <th width="200"><center>Action</center></th>
              </tr>
            </thead>
           
            <tbody>
            <?php
				include("../koneksi/koneksi.php");

				$no	=	1;
				$data_jd	=	mysql_query('select * from usia_pensiun order by id desc');
				while($data	=	mysql_fetch_array($data_jd)){
			?>
              <tr>
                <td><?php echo $data['usia']; ?> tahun</td>
                <td> <center>
                  <a class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModalEdit<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit</a>
                  </center></td>

                <!-- Dialog Modal Edit -->
                  <div class="modal fade" id="myModalEdit<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $data['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel<?php echo $data['id']; ?>">Edit Data</h4>
                        </div>
                        <div class="modal-body">

                          <form class="form-horizontal" action="../crud/usia_pensiun_Simpan.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                              <div class="form-group">
                                <div class="col-lg-12">
                                  <div class="col-lg-12">

                                  <label for="satuan" class="col-sm-3 control-label">Usia Pensiun</label>
                                <div class="col-sm-3">
                                  <input type="number" class="form-control" name="usia" placeholder="Masukkan Usia Pensiun" value="<?php echo $data['usia']; ?>"><br>
                                </div>
                                <label for="satuan" class="col-sm-6">tahun</label>
                                  </div>
                                </div>
<br><br><br><br><br>
                              </div>
                              <div class="box-footer">
                                 <button type="submit" value="Simpan" name="Edit" class="btn btn-primary">Save</button>
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
                          <span>  <a href="../crud/usia_pensiun_Simpan.php?id=<?php echo $data['id']; ?>"><button type="submit" value="Simpan" name="Delete" class="btn btn-danger">Hapus</button></a></span>
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
          </DIV>
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
