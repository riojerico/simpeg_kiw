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
        <h3>Riwayat Pendidikan <i class="fa fa-angle-double-down "></i></h3>

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
            <form class="form-horizontal" action="../crud/rwtKepangkatanView.php" method="post" enctype="multipart/form-data">



                  <div class="col-lg-6">

                                      <div class="panel-body">

                      <label for="satuan" class="col-lg-5 control-label">Jenis Kenaikan Pangkat</label>
                      <div class="col-lg-7">
                        <select name="jenis_kenaikan" id="jenis_kenaikan" class="form-control mb10">
                                                <option value="">Pilih Jenis Kenaikan Pangkat</option>
                                                <?php
                                                  $q=mysql_query("select * from jenis_kenaikan_pangkat");
                                                  while($q2=mysql_fetch_array($q)){
                                                ?>
                                                <option value="<?php echo $q2[2] ?>"><?php echo $q2[2] ?></option>
                                                <?php }
                                                ?>
                                              </select>
                      </div>
                      <input  type="hidden" class="form-control" name="id_peg" value="<?php echo $id; ?>"></input>
                      <label for="satuan" class="col-lg-5 control-label">Pangkat Golongan</label>
                      <div class="col-lg-7">
                        <input  type="text" class="form-control" name="pangkat_gol" placeholder="Masukkan Pangkat Golongan"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Nomer SK</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="nosk" placeholder="Masukkan Nomer SK"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Tanggal SK   <i class="fa fa-calendar"> </i></label>
                 <div class="col-sm-7">
                <input type="text" class="form-control" name="tglsk" id="tanggal_lahir" placeholder="Masukkan Tanggal SK"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Pejabat</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="pejabat" placeholder="Masukkan Pejabat"></input><br>
                      </div>

                          </div>

                 </div>

                <div class="col-lg-6">
                  <br>
                 <div class="clearfix">
                                   <label class="col-sm-4 control-label">TMT</label>
                                     <div class="col-sm-8" form-co>
                                      <input  type="text" class="form-control" name="tmt" placeholder="Masukkan TMT"></input><br>
                                     </div>
                       <label class="col-sm-4 control-label">Dasar Kepemimpinan</label>
                     <div class="col-sm-8"form-co>
                    <input  type="text" class="form-control" name="dasarkep" placeholder="Masukkan Dasar Kepemimpinan"></input>
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
          <!-- /.box-body -->
          <div class="box-footer">
<br>
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->



        <!-- /.box-header -->
        <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
              <thead>
                <tr style="font-size:11px; ">

                  <th ><center>Jenis Kenaikan</center></th>
                  <th ><center>Pangkat Golongan</center></th>
                  <th ><center>Nomer Sk</center></th>
                  <th ><center>Tanggal SK</center></th>
                  <th ><center>Pejabat</center></th>
                  <th ><center>TMT</center></th>
                  <th ><center>Dasar Kepemimpinan</center></th>
                  <th width="140px"><center>Action</center></th>
                </tr>
              </thead>
              <tbody>
              <?php
              //  $getid2=$_REQUEST['id'];
  				$no	=	1;
  				$data_pegawai	=	mysql_query("select * from rwt_kepangkatan where id_peg='$id'");
  				while($data	=	mysql_fetch_array($data_pegawai)){
  			?>
                <tr>
                  <td> <center><?php echo $data['jenis_kenaikan'] ?></center></td>
                  <td> <center><?php echo $data['pangkat_gol'] ?></center></td>
                  <td> <center><?php echo $data['nosk'] ?></center></td>
                  <td> <center><?php echo $data['tglsk'] ?></center></td>
                  <td> <center><?php echo $data['pejabat'] ?></center></td>
                  <td> <center><?php echo $data['tmt'] ?></center></td>
                   <td> <center><?php echo $data['dasarkep'] ?></center></td>

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
                              <span>  <button type="button" class="btn btn-defaut" data-dismiss="modal">Batal</button></span>
                              <input type="hidden" name="getid3" value="<?php echo $data['id']; ?>">
                              <span>  <a href="../crud/rwtKepangkatanView.php?id=<?php echo $data['id']; ?>"><button type="submit" value="Delete" name="Delete" class="btn btn-danger">Hapus</button></a></span>
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
                <h4 class="modal-title<?php echo $data['id']; ?>" id="myModalLabel">Input Data Pegawai</h4>
              </div>
              <div class="modal-body">

                <form role="form" action="../crud/rwtKepangkatanView.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                     <div class="col-lg-6">

                                      <div class="panel-body">

                      <label for="satuan" class="col-lg-5 control-label">Jenis Kenaikan Pangkat</label>
                      <div class="col-lg-7">
                        <select name="jenis_kenaikan" id="jenis_kenaikan" class="form-control mb10">
                                                <option value="">Pilih Jenis Kenaikan Pangkat</option>
                                                <?php
                                                  $q=mysql_query("select * from jenis_kenaikan_pangkat");
                                                  while($q2=mysql_fetch_array($q)){
                                                ?>
                                                <option value="<?php echo $q2[2] ?>"><?php echo $q2[2] ?></option>
                                                <?php }
                                                ?>
                                              </select>
                      </div>
                      <input  type="hidden" class="form-control" name="acuan" value="<?php echo $id; ?>"></input>
                      <label for="satuan" class="col-lg-5 control-label">Pangkat Golongan</label>
                      <div class="col-lg-7">
                        <input  type="text" class="form-control" name="pangkat_gol" placeholder="Masukkan Pangkat Golongan" value="<?php echo $data['pangkat_gol']; ?>"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Nomer SK</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="nosk" placeholder="Masukkan Nomer SK" value="<?php echo $data['nosk']; ?>"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Tanggal SK   <i class="fa fa-calendar"> </i></label>
                 <div class="col-sm-7">
                <input type="text" class="form-control" name="tglsk" id="tanggal_lahir" placeholder="Masukkan Tanggal SK" value="<?php echo $data['tglsk']; ?>"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Pejabat</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="pejabat" placeholder="Masukkan Pejabat" value="<?php echo $data['pejabat']; ?>"></input><br>
                      </div>

                          </div>

                 </div>

                <div class="col-lg-6">
                  <br>
                 <div class="clearfix">
                                   <label class="col-sm-4 control-label">TMT</label>
                                     <div class="col-sm-8" form-co>
                                      <input  type="text" class="form-control" name="tmt" placeholder="Masukkan TMT" value="<?php echo $data['tmt']; ?>"></input><br>
                                     </div>
                       <label class="col-sm-4 control-label">Dasar Kepemimpinan</label>
                     <div class="col-sm-8"form-co>
                    <input  type="text" class="form-control" name="dasarkep" placeholder="Masukkan Dasar Kepemimpinan" value="<?php echo $data['dasarkep']; ?>"></input><br><br>
                     </div>
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
