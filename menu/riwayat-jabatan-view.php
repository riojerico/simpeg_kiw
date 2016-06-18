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
        <h3>Riwayat Jabatan <i class="fa fa-angle-double-down "></i></h3>

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
            <form class="form-horizontal" action="../crud/rwtJabatanView.php" method="post" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <div class="panel-body">
                      <label for="satuan" class="col-sm-5 control-label">Unit Kerja</label>
                      <div class="col-sm-7">
                        <select name="unit" id="unit" class="form-control mb10">
                          <option value="">Pilih Unit Kerja</option>
                          <?php
                            $q=mysql_query("select * from unit_kerja");
                            while($q2=mysql_fetch_array($q)){
                          ?>
                          <option value="<?php echo $q2[0] ?>"><?php echo $q2[2] ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Jabatan</label>
                      <div class="col-sm-7">
                        <select name="jabatan" id="jabatan" class="form-control mb10">
                          <option value="">Pilih Jabatan</option>
                          <?php
                            $q=mysql_query("select * from jenis_jabatan");
                            while($q2=mysql_fetch_array($q)){
                          ?>
                          <option value="<?php echo $q2[0] ?>"><?php echo $q2[2] ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Golongan</label>
                      <div class="col-sm-7">
                        <select name="gol" id="gol" class="form-control mb10">
                          <option value="">Pilih Golongan</option>
                          <?php
                            $q=mysql_query("select * from gol_ruang");
                            while($q2=mysql_fetch_array($q)){
                          ?>
                          <option value="<?php echo $q2[0] ?>"><?php echo $q2[2] ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Status Pegawai</label>
                      <div class="col-sm-7">
                        <select name="st_peg" id="st_peg" class="form-control mb10">
                          <option value="">Pilih Status Pegawai</option>
                          <?php
                            $q=mysql_query("select * from master_statuspegawai");
                            while($q2=mysql_fetch_array($q)){
                          ?>
                          <option value="<?php echo $q2[0] ?>"><?php echo $q2[2] ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>

                      
                    </div>
                 </div>

                <div class="col-lg-6">
                  <br>
                   <label for="satuan" class="col-sm-4 control-label">Nomer SK</label>
                      <div class="col-sm-8">
                        <input  type="hidden" class="form-control" name="id_peg" value="<?php echo $id; ?>">
                        <input  type="text" class="form-control" name="nosk" placeholder="Masukkan Nomer SK"><br>
                      </div>

                    <label for="satuan" class="col-sm-4 control-label">Tanggal SK <i class="fa fa-calendar"></i></label>
                     <div class="col-sm-8">
                        <input type="text" class="form-control" name="tglsk" id="tanggal_lahir" placeholder="Masukkan Tanggal SK"><br>
                     </div>

                   <label class="col-sm-4 control-label">Pejabat</label>
                     <div class="col-sm-8" form-co>
                      <input  type="text" class="form-control" name="pejabat" placeholder="Masukkan Pejabat"><br>
                     </div>

                    <label for="satuan" class="col-sm-4 control-label">Document   <i class="fa fa-file-pdf-o"> </i></label>
                    <div class="col-sm-8">
                    <input type="file" class="form-control" name="doc" id="" placeholder="Masukkan Scan Document" value="<?php echo $data['doc']; ?>"><br>
                    </div>  
                   
                </div>   

                 <!-- <div class="clearfix">
                       <label class="col-sm-4 control-label">TMT</label>
                     <div class="col-sm-8"form-co>
                       <input  type="text" class="form-control" name="tmt" placeholder="Masukkan TMT"><br>
                     </div>
                 </div>

                 <label for="satuan" class="col-sm-4 control-label">Sumpah</label>
                 <div class="col-sm-8">
                   <input  type="text" class="form-control" name="sumpah" placeholder="Masukkan Sumpah"><br>
                 </div> -->

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
                  <th ><center>Unit Kerja</center></th>
                  <th ><center>Jabatan</center></th>
                  <th ><center>Golongan</center></th>
                  <th ><center>Status</center></th>
                  <th ><center>No. SK</center></th>
                  <th ><center>Tanggal SK</center></th>
                  <th ><center>Pejabat</center></th>
                  <th ><center>Document</center></th>
                  <th ><center>Action</center></th>
                </tr>
              </thead>
              <tbody>
              <?php
  				$no	=	1;
          $id2 = 1;
  				$data_pegawai	=	mysql_query("select * from rwt_jabatan where id_peg = '$id' order by id desc");
  				while($data	=	mysql_fetch_array($data_pegawai)){
            $jabatan=$data['jabatan'];
            $jabatan2=mysql_query("select jenis_jabatan from jenis_jabatan where id='$jabatan'");
            $jabatan3=mysql_fetch_array($jabatan2);

            $unit=$data['unit_kerja'];
            $unit2=mysql_query("select unit_kerja from unit_kerja where id='$unit'");
            $unit3=mysql_fetch_array($unit2);

            $gol=$data['golongan'];
            $gol2=mysql_query("select pangkat from gol_ruang where id='$gol'");
            $gol3=mysql_fetch_array($gol2);

            $status_pegawai=$data['status_peg'];
            $status_pegawai2=mysql_query("select status_pegawai from master_statuspegawai where id='$status_pegawai'");
            $status_pegawai3=mysql_fetch_array($status_pegawai2);
  			?>
                <tr>
                  <td> <center><?php echo $no; ?></center></td>
                 <!--  <td> <center><?php echo $data['id_peg'] ?></center></td> -->
                  <td> <center><?php echo $unit3[0] ?></center></td>
                  <td> <center><?php echo $jabatan3[0] ?></center></td>
                  <td> <center><?php echo $gol3[0] ?></center></td>
                  <td> <center><?php echo $status_pegawai3[0] ?></center></td>
                  <td> <center><?php echo $data['nosk'] ?></center></td>
                  <td> <center><?php echo date("d M Y", strtotime($data['tglsk'])) ?></center></td>
                  <td> <center><?php echo $data['pejabat'] ?></center></td>
                  <td width="100"> <center>
                    <a href="<?php 
                    echo $data['doc'];
                    ?>" target="_blank">doc </a>
                  </center></td>

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
                              <span>  <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button></span>
                              <input type="hidden" name="getid3" value="<?php echo $data['id']; ?>">
                              <span>  <a href="../crud/rwtJabatanView.php?id=<?php echo $data['id']; ?>"><button type="submit" value="Delete" name="Delete" class="btn btn-danger">Hapus</button></a></span>
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

                <form role="form" action="../crud/rwtJabatanView.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                  <div class="col-lg-6">

                  <div class="panel-body">

                      <label for="satuan" class="col-sm-5 control-label">Unit Kerja</label>
                      <div class="col-sm-7">
                        <select name="unit" id="unit" class="form-control mb10">
                          <option value="">Pilih Unit Kerja</option>
                          <?php
                            $q=mysql_query("select * from unit_kerja");
                            while($q2=mysql_fetch_array($q)){
                          ?>
                          <option value="<?php echo $q2[0] ?>" <?php if($data['unit_kerja']==$q2[0]) echo selected ?>><?php echo $q2[2] ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Jabatan</label>
                      <div class="col-sm-7">
                        <select name="jabatan" id="jabatan" class="form-control mb10">
                          <option value="">Pilih Jabatan</option>
                          <?php
                            $q=mysql_query("select * from jenis_jabatan");
                            while($q2=mysql_fetch_array($q)){
                          ?>
                          <option value="<?php echo $q2[0] ?>" <?php if($data['jabatan']==$q2[0]) echo selected ?>><?php echo $q2[2] ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Golongan</label>
                      <div class="col-sm-7">
                        <select name="gol" id="gol" class="form-control mb10">
                          <option value="">Pilih Golongan</option>
                          <?php
                            $q=mysql_query("select * from gol_ruang");
                            while($q2=mysql_fetch_array($q)){
                          ?>
                          <option value="<?php echo $q2[0] ?>" <?php if($data['golongan']==$q2[0]) echo selected ?>><?php echo $q2[2] ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Status Pegawai</label>
                      <div class="col-sm-7">
                        <select name="st_peg" id="st_peg" class="form-control mb10">
                          <option value="">Pilih Status Pegawai</option>
                          <?php
                            $q=mysql_query("select * from master_statuspegawai");
                            while($q2=mysql_fetch_array($q)){
                          ?>
                          <option value="<?php echo $q2[0] ?>" <?php if($data['status_peg']==$q2[0]) echo selected ?>><?php echo $q2[2] ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>

                      

                    </div>

                 </div>

                <div class="col-lg-6">
                  <br>
                  <label for="satuan" class="col-sm-4 control-label">Nomer SK</label>
                      <div class="col-sm-8">
                        <input  type="hidden" class="form-control" name="acuan" value="<?php echo $id; ?>">
                        <input  type="text" class="form-control" name="nosk" placeholder="Masukkan Nomer SK" value="<?php echo $data['nosk']; ?>"><br>
                      </div>

                   <label for="satuan" class="col-sm-4 control-label">Tanggal SK <i class="fa fa-calendar"></i></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="tglsk" id="tanggal_lahir<?php echo $data['id'] ?>" placeholder="Masukkan Tanggal SK" value="<?php echo $data['tglsk']; ?>"><br>
                      </div>

                   <label class="col-sm-4 control-label">Pejabat</label>
                     <div class="col-sm-8" form-co>
                      <input  type="text" class="form-control" name="pejabat" placeholder="Masukkan Pejabat" value="<?php echo $data['pejabat']; ?>"><br>
                     </div>

                    <label for="satuan" class="col-sm-4 control-label">Document   <i class="fa fa-file-pdf-o"> </i></label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control" name="doc" id="" placeholder="Masukkan Scan Document" value=""><br>
                          <?php echo $data['doc']; ?>
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
