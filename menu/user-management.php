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
        <h3>User Management <i class="fa fa-angle-double-down "></i></h3>

        <!-- <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p> -->
      </div>

      <div class="box">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">

           

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>



              <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button> -->
            </div>
          </div>
          <div class="box-body">
            <form class="form-horizontal" action="../crud/logincrud.php" method="post" enctype="multipart/form-data"><br>
                <div class="col-lg-6">
                    <label class="col-sm-4 control-label">User Name</label>
                    <div class="col-sm-8" form-co>
                      <input  type="text" class="form-control" name="username" placeholder="User Name"><br>
                    </div>
                    <label for="satuan" class="col-sm-4 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                      <input  type="text" class="form-control" name="nama" placeholder="Nama Lengkap"><br>
                    </div>
                 </div>

                <div class="col-lg-6">
                   <label class="col-sm-4 control-label">Password</label>
                   <div class="col-sm-8" form-co>
                      <input  type="password" class="form-control" name="password" placeholder="Password"><br>
                   </div>
                   <label class="col-sm-4 control-label">Ulangi Password</label>
                   <div class="col-sm-8" form-co>
                      <input  type="password" class="form-control" name="password2" placeholder="Ulangi Password"><br>
                   </div>
                </div>   

                <div class="box-footer" align="right">
                  <br><br>
                   <button type="submit" value="Simpan" name="Simpan" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
                </div>

            </form>


            <div class="input-group input-group-sm" >

            </div>

          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->



        <!-- /.box-header -->
        <div class="box-body">
          <table id="data1" class="table table-bordered table-striped">
              <thead>
                <tr style="font-size:11px;">
                  <th ><center>No</center></th>
                 <!--  <th ><center>ID Pegawai</center></th> -->
                  <th ><center>Username</center></th>
                  <th ><center>Nama Lengkap</center></th>
                  <th ><center>Action</center></th>
                </tr>
              </thead>
              <tbody>
              <?php
  				$no	=	1;
          $id2 = 1;
  				$data_pegawai	=	mysql_query("select * from login");
  				while($data	=	mysql_fetch_array($data_pegawai)){
  			?>
                <tr>
                  <td> <center><?php echo $no; ?></center></td>
                  <td> <center><?php echo $data['username'] ?></center></td>
                  <td> <center><?php echo $data['nama'] ?></center></td>

                  <td width="200"><center>
                     <a class="btn btn-warning btn-md" data-toggle="modal" data-target="#myModalEdit<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit</a>
                     <a data-toggle="modal" data-target="#modalHapus<?php echo $data['id']; ?>" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a> </center></td>
                  </td>
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
                              <span>  <button type="button" class="btn btn-defaut" data-dismiss="modal">Batal</button></span>
                              <input type="hidden" name="getid3" value="<?php echo $data['id']; ?>">
                              <span>  <a href="../crud/logincrud.php?id=<?php echo $data['id']; ?>"><button type="submit" value="Delete" name="Delete" class="btn btn-danger">Hapus</button></a></span>
                              </center>

                            </div>

                          </div>
                        </div>
                      </div>

                  </center>
                  </td>
                   <!-- Dialog Modal Edit -->
<!-- ============================================================== AWAL KONTEN =================================================================== -->


        <div class="modal fade" id="myModalEdit<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $data['id']; ?>" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title<?php echo $data['id']; ?>" id="myModalLabel">Input Data Pegawai</h4>
              </div>
              <div class="modal-body">

                <form role="form" action="../crud/logincrud.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                 <div class="col-lg-6">
                    <label class="col-sm-4 control-label">User Name</label>
                    <div class="col-sm-8" form-co>
                      <input  type="text" class="form-control" name="username" placeholder="User Name" value="<?php echo $data['username'] ?>"><br>
                    </div>
                    <label for="satuan" class="col-sm-4 control-label">Nama Lengkap</label>
                    <div class="col-sm-8">
                      <input  type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $data['nama'] ?>"><br>
                    </div>
                 </div>

                <div class="col-lg-6">
                   <label class="col-sm-4 control-label">Password</label>
                   <div class="col-sm-8" form-co>
                      <input  type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $data['password'] ?>"><br>
                   </div>
                   <label class="col-sm-4 control-label">Ulangi Password</label>
                   <div class="col-sm-8" form-co>
                      <input  type="password" class="form-control" name="password2" placeholder="Ulangi Password" value="<?php echo $data['password'] ?>"><br>
                   </div>
                </div>   

                 

                <div class="box-footer" align="right">
                  <br><br>
                    <button type="submit" value="Edit" name="Edit" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
                </div>

              </form>
            </div>
          </div>
        </div>
<!-- ============================================================== AKHIR KONTEN =================================================================== -->

                  <?php
                  // include "data-pegawai/modal-view.php";
                  // include "riwayat/pendidikan-edit.php";
                  // include "riwayat/pendidikan-hapus.php";
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
