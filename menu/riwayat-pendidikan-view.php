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
            <form class="form-horizontal" action="../crud/rwtPendidikanView.php" method="post" enctype="multipart/form-data">



                  <div class="col-lg-6">

                                      <div class="panel-body">

                      <label for="satuan" class="col-lg-5 control-label">Tingkat Pendidikan</label>
                      <div class="col-lg-7">
                        <select name="tingkat" id="jenis_kelamin" class="form-control mb10">
                          <option value="">Pilih Tingkat Pendidikan</option>
                          <?php
                            $q=mysql_query("select * from jenjang_pendidikan");
                            while($q2=mysql_fetch_array($q)){
                          ?>
                          <option value="<?php echo $q2[0] ?>"><?php echo $q2[2] ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>
                      <?php $getid = $_REQUEST['id']; ?>
                      <input  type="hidden" class="form-control" name="getid" placeholder="Masukkan Nama Tempat" value="<?php echo $getid; ?>"></input>
                      <label for="satuan" class="col-lg-5 control-label">Nama Sekolah</label>
                      <div class="col-lg-7">
                        <input  type="text" class="form-control" name="nama" placeholder="Masukkan Nama Tempat" value="<?php echo $data['nama']; ?>"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Fakultas</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="fakultas" placeholder="Masukkan Fakultas" value="<?php echo $data['fakultas']; ?>"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Jurusan</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="jurusan" placeholder="Masukkan Jurusan" value="<?php echo $data['jurusan']; ?>"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Alamat</label>
                      <div class="col-sm-7">
                        <textarea  type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" value=""></textarea><br>
                      </div>

                          </div>

                 </div>

                <div class="col-lg-6">
                  <br>
                 <div class="clearfix">
                                   <label class="col-sm-4 control-label">Propinsi</label>
                                     <div class="col-sm-8" form-co>
                                       <select name="provinsi" id="prop" onchange="ajaxkota(this.value)" class="form-control mb10">
                                         <option value="">Pilih Provinsi</option>
                                           <?php
                                           $queryProvinsi=mysql_query("SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
                                           while ($dataProvinsi=mysql_fetch_array($queryProvinsi)){
                                             echo '<option value="'.$dataProvinsi['lokasi_propinsi'].'">'.$dataProvinsi['lokasi_nama'].'</option>';
                                           }
                                           ?>
                                       </select>
                                     </div>
                                 </div>

                 <div class="clearfix">
                       <label class="col-sm-4 control-label">Kota</label>
                     <div class="col-sm-8"form-co>
                       <select name="kota" id="kota" onchange="ajaxkec(this.value)" class="form-control mb10">
                     <option value="">Pilih Kota</option>
                       </select>
                     </div>
                 </div>

                 <label for="satuan" class="col-sm-4 control-label">Kepsek. / Rektor</label>
                 <div class="col-sm-8">
                   <input  type="text" class="form-control" name="kepala" placeholder="Masukkan Tingkat Eselon" value="<?php echo $data['kepala']; ?>"><br>
                 </div>

                 <label for="satuan" class="col-sm-4 control-label">No. Ijazah</label>
                 <div class="col-sm-8">
                   <input  type="text" class="form-control" name="noijazah" placeholder="Masukkan No. Ijazah" value="<?php echo $data['noijazah']; ?>"><br>
                 </div>

                 <label for="satuan" class="col-sm-4 control-label">Tanggal Ijazah   <i class="fa fa-calendar"> </i></label>
                 <div class="col-sm-8">
                <input type="text" class="form-control" name="tglijazah" id="tanggal_lahir" placeholder="Masukkan Tgl. Ijazah" value="<?php echo $data['tglijazah']; ?>"><br>
                 </div>

                 <label for="satuan" class="col-sm-4 control-label">Document   <i class="fa fa-file-pdf-o"> </i></label>
                 <div class="col-sm-8">
                <input type="file" class="form-control" name="doc" id="" placeholder="Masukkan Scan Document" value="<?php echo $data['doc']; ?>"><br>
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
          <table id="" class="table table-bordered table-striped">
              <thead>
                <tr style="font-size:11px; ">

                  <th width="130"><center>Tingkat</center></th>
                  <th width="130"><center>Nama Sekolah</center></th>
                  <th ><center>Jurusan</center></th>
                  <th ><center>No. Ijazah</center></th>
                  <th width="100"><center>Tgl. Ijazah</center></th>
                  <th width="160"><center>Tempat</center></th>
                  <th width="140"><center>Nama Kepsek./Rektor</center></th>
                  <th width="100"><center>Document</center></th>
                  <th width="180px"><center>Action</center></th>
                </tr>
              </thead>
              <tbody>
              <?php
              //  $getid2=$_REQUEST['id'];
  				$no	=	1;
  				$data_pegawai	=	mysql_query("select * from rwt_pendidikan where id_peg='$getid' order by id desc");
  				while($data	=	mysql_fetch_array($data_pegawai)){
  			?>
                <tr>
                  <td> <center>
                      <?php
                        $gettingkat3 = $data['tingkat'];
                        $gettingkat=mysql_query("select pendidikan from jenjang_pendidikan where id = '$gettingkat3'");
                        $gettingkat2=mysql_fetch_array($gettingkat);
                        echo  $gettingkat2[0]
                       ?>
                      </center>
                  </td>
                  <td> <center><?php echo $data['nama'] ?></center></td>
                  <td> <center><?php echo $data['jurusan'] ?></center></td>
                  <td> <center><?php echo $data['noijazah'] ?></center></td>
                  <td> <center><?php echo date("d M Y", strtotime($data['tglijazah'])) ?></center></td>
                  <td> <center>
                    <?php
                    $getprov=$data['provinsi'];
                    $getkota=$data['kota'] ;
                    $kota = mysql_fetch_array(mysql_query("select lokasi_nama from inf_lokasi where lokasi_kabupatenkota = '$getkota' and lokasi_propinsi='$getprov'"));

                    echo ucwords(strtolower($kota[0]));
                    ?></center>
                  </td>
                  <td> <center><?php echo $data['kepala'] ?></center></td>
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
                              <span>  <button type="button" class="btn btn-defaut" data-dismiss="modal">Batal</button></span>
                              <input type="hidden" name="getid3" value="<?php echo $data['id']; ?>">
                              <span>  <a href="../crud/rwtPendidikanView.php?id=<?php echo $data['id']; ?>"><button type="submit" value="Delete" name="Delete" class="btn btn-danger">Hapus</button></a></span>
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
                <h4 class="modal-title<?php echo $data['id']; ?>" id="myModalLabel">Edit Data Pendidikan</h4>
              </div>
              <div class="modal-body">

                <form role="form" action="../crud/rwtPendidikanView.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                  <div class="col-lg-6">

                      <div class="panel-body">                  
                      <label for="satuan" class="col-lg-5 control-label">Tingkat Pendidikan</label>
                      <div class="col-lg-7">
                        <select name="tingkat" id="jenis_kelamin" class="form-control mb10">
                          <option value="">Pilih Tingkat Pendidikan</option>
                          <?php
                            $q=mysql_query("select * from jenjang_pendidikan");
                            while($q2=mysql_fetch_array($q)){
                          ?>
                          <option value="<?php echo $q2[0] ?>" <?php if($data['tingkat']==$q2[0]) echo selected ?> ><?php echo $q2[2] ?></option>
                          <?php }
                          ?>
                        </select>
                      </div>
                      <?php $getid = $_REQUEST['id']; ?>
                      <input  type="hidden" class="form-control" name="getid" value="<?php echo $getid; ?>"></input>
                      <label for="satuan" class="col-lg-5 control-label">Nama Tempat</label>
                      <div class="col-lg-7">
                        <input  type="text" class="form-control" name="nama" placeholder="Masukkan Nama Tempat" value="<?php echo $data['nama']; ?>"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Fakultas</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="fakultas" placeholder="Masukkan Fakultas" value="<?php echo $data['fakultas']; ?>"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Jurusan</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="jurusan" placeholder="Masukkan Jurusan" value="<?php echo $data['jurusan']; ?>"><br>
                      </div>

                      <label for="satuan" class="col-sm-5 control-label">Alamat</label>
                      <div class="col-sm-7">
                        <textarea type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat"><?php echo $data['alamat']; ?></textarea><br>
                      </div>

                          </div>

                 </div>

                <div class="col-lg-6">
                  <br>
                 <div class="clearfix">
                   <label class="col-sm-4 control-label">Propinsi</label>
                     <div class="col-sm-8" form-co>
                       <select name="provinsi" id="ttl_prov" onchange="ajaxkota3<?php echo $data['id'] ?>(this.value)" class="form-control mb10">
                         <option value="">Pilih Provinsi</option>
                          <?php 
                          $queryProvinsi=mysql_query("SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
                          while ($dataProvinsi=mysql_fetch_array($queryProvinsi)){ ?>

                          <option value="<?php echo $dataProvinsi['lokasi_propinsi'] ?>" <?php if($dataProvinsi['lokasi_propinsi'] == $data['provinsi']) echo selected ?>><?php echo $dataProvinsi['lokasi_nama'] ?></option>
                          
                          <?php
                          }
                          ?>
                       </select>
                     </div>
                 </div>

                 <div class="clearfix">
                       <label class="col-sm-4 control-label">Kota</label>
                     <div class="col-sm-8"form-co>
                       <select name="kota" id="ttl_kota3<?php echo $data['id'] ?>" class="form-control mb10">
                        <?php
                          $kota=explode("&prop=", $data['kota']);
                          $kotaa=$kota[0];$kotab=$kota[1];
                          $getkota=mysql_query("select lokasi_nama, lokasi_id from inf_lokasi where lokasi_propinsi = '$kotab' and lokasi_kabupatenkota = '$kotaa' ");
                          $viewkota=mysql_fetch_array($getkota);
                        ?>
                          <option value="<?php echo $data['kota'] ?>" selected><?php echo $viewkota[0]  ?></option>
                       </select>
                     </div>
                 </div>

                 <label for="satuan" class="col-sm-4 control-label">Kepsek. / Rektor</label>
                 <div class="col-sm-8">
                   <input  type="text" class="form-control" name="kepala" placeholder="Masukkan Kepsek. / Rektor" value="<?php echo $data['kepala']; ?>"><br>
                 </div>

                 <label for="satuan" class="col-sm-4 control-label">No. Ijazah</label>
                 <div class="col-sm-8">
                   <input  type="text" class="form-control" name="noijazah" placeholder="Masukkan No. Ijazah" value="<?php echo $data['noijazah']; ?>"><br>
                 </div>

                 <label for="satuan" class="col-sm-4 control-label">Tanggal Ijazah   <i class="fa fa-calendar"> </i></label>
                 <div class="col-sm-8">
                <input type="text" class="form-control" name="tglijazah" id="tanggal_lahir<?php echo $data['id'] ?>" placeholder="Masukkan Tgl. Ijazah" value="<?php echo $data['tglijazah']; ?>"><br>
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

                 </tr>
  			<?php
          include 'data-pegawai/ajax_kota.php';
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
