<?php
include ('../layout/layout-header.php');
include ('../layout/layout-sidebartop.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  die ("Error. No ID Selected! ");
}
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
        <h3>Riwayat DP3 / Penilaian Kinerja <i class="fa fa-angle-double-down "></i></h3>

        <!-- <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p> -->
      </div>

      <div class="box">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">

            <h3 class="box-title"> Tambah Data Riwayat -
              <b> <?php $data =	mysql_query("select * from data_pegawai where id='$id'"); while($data_pegawai	=	mysql_fetch_array($data)){ ?>
                <?php    echo $data_pegawai['gelar_depan']; ?>  <?php    echo $data_pegawai['nama']; ?>,   <?php    echo $data_pegawai['gelar_belakang']; ?>


                <?php }?></b></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>



              <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button> -->
            </div>
          </div>
          <div class="box-body">
            <form class="form-horizontal" action="../crud/rwtDp3View.php" method="post" enctype="multipart/form-data">



                  <div class="col-lg-6">

                                      <div class="panel-body">

                      <?php $getid = $_REQUEST['id']; ?>
                      <input  type="hidden" class="form-control" name="getid" placeholder="" value="<?php echo $getid; ?>"></input>
                      <label for="satuan" class="col-lg-5 control-label">Tahun</label>
                      <div class="col-lg-7">
                        <input  type="text" class="form-control" name="tahun" placeholder="Masukkan Tahun"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Rata - rata</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="rata2" placeholder="Masukkan Rata - rata"><br>
                      </div>

                     <label for="satuan" class="col-sm-5 control-label">Atasan</label>
                     <div class="col-sm-7">
                      <input  type="text" class="form-control" name="atasan" placeholder="Masukkan Atasan"><br>
                     </div>
                          </div>

                 </div>

                 <div class="col-lg-6">
                  <br>
                 <div class="clearfix">
                      <label for="satuan" class="col-lg-4 control-label">Penilai</label>
                      <div class="col-lg-8">
                        <input  type="text" class="form-control" name="penilai" placeholder="Masukkan Penilai"><br>
                      </div>
                      <label for="satuan" class="col-sm-4 control-label">Document   <i class="fa fa-file-pdf-o"> </i></label>
                 <div class="col-sm-8">
                <input type="file" class="form-control" name="doc" id="" placeholder="Masukkan Scan Document" value="<?php echo $data['doc']; ?>"><br>
                 </div>
                  </div>
                  </div>

                 <br><br><br><br><br><br>

                <div class="box-footer" align="right">
                  <br><br>
                   <button type="submit" value="Simpan" name="Simpan" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
                </div>

            </form>


            <div class="input-group input-group-sm" >

            </div>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
<br>
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->



        <!-- /.box-header -->
        <div class="box-body">
          <table id="" class="table table-bordered table-striped">
              <thead>
                <tr style="font-size:11px; ">

                  <th ><center>No.</center></th>
                  <th ><center>Tahun</center></th>
                  <th ><center>Rata - rata</center></th>
                  <th ><center>Atasan</center></th>
                  <th ><center>Penilai</center></th>
                  <th ><center>Document</center></th>
                  <th width="200px"><center>Action</center></th>
                </tr>
              </thead>
              <tbody>
              <?php
              //  $getid2=$_REQUEST['id'];
  				$no	=	1;
  				$data_pegawai	=	mysql_query("select * from rwt_dp3 where id_peg='$getid' order by id desc");
  				while($data	=	mysql_fetch_array($data_pegawai)){
  			?>
                <tr>
                  <td> <center><?php echo $no ?></center></td>
                  <td> <center><?php echo $data['tahun'] ?></center></td>
                  <td> <center><?php echo $data['rata2'] ?></center></td>
                  <td> <center><?php echo $data['atasan'] ?></center></td>
                  <td> <center><?php echo $data['penilai'] ?></center></td>
                  <td width="100"> <center>
                    <a href="<?php 
                    echo $data['doc'];
                    ?>" target="_blank">doc </a>
                  </center></td>

                  
                  <td width="140"><center>
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
                              <span>  <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button></span>
                              <input type="hidden" name="getid3" value="<?php echo $data['id']; ?>">
                              <span>  <a href="../crud/rwtDp3View.php?id=<?php echo $data['id']; ?>"><button type="submit" value="Delete" name="Delete" class="btn btn-danger">Hapus</button></a></span>
                              </center>

                            </div>

                          </div>
                        </div>
                      </div>

                <!-- Dialog Modal Edit -->
<!-- ============================================================== AWAL KONTEN =================================================================== -->

      
        <div class="modal fade" id="myModalEdit<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $data['id']; ?>" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title<?php echo $data['id']; ?>" id="myModalLabel">Edit Riwayat DP3 / Penilaian Kerja</h4>
              </div>
              <div class="modal-body">

                <form role="form" action="../crud/rwtDp3View.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                  <div class="col-lg-6">

                      <div class="panel-body">                  
                      <?php $getid = $_REQUEST['id']; ?>
                      <input  type="hidden" class="form-control" name="getid" value="<?php echo $getid; ?>"></input>
                      <label for="satuan" class="col-lg-5 control-label">Tahun</label>
                      <div class="col-lg-7">
                        <input  type="text" class="form-control" name="tahun" placeholder="Masukkan Tahun" value="<?php echo $data['tahun']; ?>"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Rata - rata</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="rata2" placeholder="Masukkan Rata - rata" value="<?php echo $data['rata2']; ?>"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Atasan</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="atasan" placeholder="Masukkan Atasan" value="<?php echo $data['atasan']; ?>"><br>
                      </div>
                          </div>

                 </div>

                <div class="col-lg-6">
                  <br>
                 
                 <label for="satuan" class="col-sm-4 control-label">Penilai</label>
                 <div class="col-sm-8">
                   <input  type="text" class="form-control" name="penilai" placeholder="Masukkan Penilai" value="<?php echo $data['penilai']; ?>"><br>
                 </div>
                  <label for="satuan" class="col-sm-4 control-label">Document   <i class="fa fa-file-pdf-o"> </i></label>
                 <div class="col-sm-8">
                <input type="file" class="form-control" name="doc" id="" placeholder="Masukkan Scan Document" value=""><br>
                <?php echo $data['doc']; ?>
                 </div>
               </div>


                <div class="box-footer" align="right">
                  <br><br><br><br><br><br><br><br>
                    <button type="submit" value="Edit" name="Edit" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
                </div>

              </form>
            </div>
          </div>
        </div>
<!-- ============================================================== AKHIR KONTEN =================================================================== -->

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
