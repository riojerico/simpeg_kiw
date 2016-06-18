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
        <h3>Data Keluarga Orangtua <i class="fa fa-angle-double-down "></i></h3>

        <!-- <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p> -->
      </div>

      <div class="box">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">

            <h3 class="box-title"> Tambah Data Keluarga -
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
            <form class="form-horizontal" action="../crud/rwtDKorangtua.php?id=<?php echo $data_pegawai['id']?>" method="post" enctype="multipart/form-data">

                  <div class="col-lg-6">

                  <div class="panel-body">

                      <?php $getid = $_REQUEST['id']; ?>
                        <input  type="hidden" class="form-control" name="getid" placeholder="Masukkan Nama Tempat" value="<?php echo $getid; ?>"></input>
                      <!-- 1 -->
                      <label for="satuan" class="col-lg-5 control-label">Status</label>
                      <div class="col-lg-7">
                        <select name="status" class="form-control"> <option value="">Pilih Status</option>
                                                                  <option value="Ayah">Ayah</option>
                                                                  <option value="Ibu">Ibu</option>
                        </select><br>
                      </div>
                      <!-- 2 -->
                      <label for="satuan" class="col-sm-5 control-label">Nama</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?php echo $data['nama']; ?>"><br>
                      </div>
                      <!-- 3 -->
                      <label for="satuan" class="col-sm-5 control-label">Tempat Lahir</label>
                      <div class="col-sm-7" form-co>
                        <select name="ttl_prov" id="prop" onchange="ajaxkota(this.value)" class="form-control mb10">
                          <option value="">Pilih Provinsi</option>
                            <?php
                            $queryProvinsi=mysql_query("SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
                            while ($dataProvinsi=mysql_fetch_array($queryProvinsi)){
                              echo '<option value="'.$dataProvinsi['lokasi_propinsi'].'">'.$dataProvinsi['lokasi_nama'].'</option>';
                            }
                            ?>
                        </select>
                      </div>
                      <!-- 4 -->
                      <label for="satuan" class="col-sm-5 control-label"></label>
                      <div class="col-sm-7"form-co>
                        <select name="ttl_kota" id="kota" onchange="ajaxkec(this.value)" class="form-control mb10">
                      <option value="">Pilih Kota</option>
                        </select>
                      </div>


                          </div>

                 </div>

                <div class="col-lg-6">
                  <br>
                  <!-- 5 -->
                  <label for="satuan" class="col-sm-5 control-label">Tanggal Lahir <i class="fa fa-calendar"> </i></label>
                  <div class="col-sm-7">
                 <input type="text" class="form-control" name="tgl_lahir" id="tanggal_lahir" placeholder="Masukkan Tgl. Lahir" value="<?php echo $data['tgl_lahir']; ?>"><br>
                  </div>
                 <div class="clearfix">
                   <label for="satuan" class="col-lg-5 control-label">Tingkat Pendidikan</label>
                   <div class="col-lg-7">
                     <select name="pendidikan" id="pendidikan" class="form-control mb10">
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
                 </div>


                 <label for="satuan" class="col-sm-5 control-label">Pekerjaan</label>
                 <div class="col-sm-7">
                   <input  type="text" class="form-control" name="pekerjaan" placeholder="Masukkan Pekerjaan" value="<?php echo $data['pekerjaan']; ?>"><br>
                 </div>


<br><br><br><br><br>


                <div class="" align="right">

                   <button type="submit" value="Simpan" name="Simpan" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
                </div>

            </form>
</div>


          </div>

        </div>
        <!-- /.box -->



        <!-- /.box-header -->
        <div class="box-body">
          <table id="data1" class="table table-bordered table-striped">
              <thead>
                <tr style="font-size:11px; ">
                <th ><center>Orangtua </center></th>
                  <th ><center>Nama </center></th>
                  <th ><center>TTL</center></th>
                  <th ><center>Pendidikan</center></th>
                  <th ><center>Pekerjaan</center></th>
                  <th width="200px"><center>Action</center></th>
                </tr>
              </thead>
              <tbody>
              <?php
              //  $getid2=$_REQUEST['id'];
  				$no	=	1;
  				$data_pegawai	=	mysql_query("select * from dk_orangtua where id_peg='$getid' order by id desc");
  				while($data	=	mysql_fetch_array($data_pegawai)){
  			?>
                <tr>
                  <td> <center><?php echo $data['status'] ?></center></td>
                  <td> <center><?php echo $data['nama'] ?></center></td>
                  <td> <center><?php
                  $getprov=$data['ttl_prov'];
                  $getkota3=$data['ttl_kota'] ;
                  $getkota=mysql_query("select lokasi_nama from inf_lokasi where lokasi_kabupatenkota = '$getkota3' and lokasi_propinsi='$getprov'");
                  $getkota2=mysql_fetch_row($getkota);

                  echo date("d M Y", strtotime($data['tgl_lahir'])) ?>, <?php echo ucwords(strtolower($getkota2[0])) ?>
                       </center></td>
                  <td> <center>
                      <?php
                        $gettingkat3 = $data['pendidikan'];
                        $gettingkat=mysql_query("select pendidikan from jenjang_pendidikan where id = '$gettingkat3'");
                        $gettingkat2=mysql_fetch_array($gettingkat);
                        echo  $gettingkat2[0]
                       ?>
                      </center>
                  </td>
                  <td> <center><?php echo $data['pekerjaan'] ?></center></td>
                  
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
                              <span>  <a href="../crud/rwtDKorangtua.php?id=<?php echo $data['id']; ?>"><button type="submit" value="Delete" name="Delete" class="btn btn-danger">Hapus</button></a></span>
                              </center>

                            </div>

                          </div>
                        </div>
                      </div>

                      <!-- Dialog Modal Edit -->
  <!-- ============================================================== AWAL KONTEN =================================================================== -->
  <?php
  $abc = $data['id'];
  $semua  = mysql_query("select * from data_pegawai where id = '$abc' ");
  $semua2 = mysql_fetch_array($semua);

  ?>

          <div class="modal fade" id="myModalEdit<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $data['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title<?php echo $data['id']; ?>" id="myModalLabel">Edit Data Keluarga Orangtua</h4>
                </div>
                <div class="modal-body">

                  <form role="form" action="../crud/rwtDKorangtua.php?id=<?php echo $data['id_peg']; ?>" method="post" enctype="multipart/form-data">
                    <div class="panel-body">
                    <div class="col-lg-6">



                        <?php $getid = $_REQUEST['id']; ?>
                            <input  type="hidden" class="form-control" name="getid" placeholder="Masukkan Nama Tempat" value="<?php echo $getid; ?>"></input>
                      <!-- 1 -->
                      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                      <label for="satuan" class="col-lg-5 control-label">Status</label>
                      <div class="col-lg-7">
                        <select name="status" class="form-control"> <option value="">Pilih Status</option>
                                                                  <option value="Ayah" <?php if($data['status']=="Ayah") echo selected ?>>Ayah</option>
                                                                  <option value="Ibu" <?php if($data['status']=="Ibu") echo selected ?>>Ibu</option>
                        </select><br>
                      </div>
                      <!-- 2 -->
                      <label for="satuan" class="col-sm-5 control-label">Nama</label>
                      <div class="col-sm-7">
                        <input  type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?php echo $data['nama']; ?>"><br>
                      </div>
                      <!-- 3 -->
                       <label for="satuan" class="col-sm-5 control-label">Tempat Lahir</label>
                        <div class="col-sm-7" form-co>
                          <select name="ttl_prov" id="ttl_prov" onchange="ajaxkota5<?php echo $data['id'] ?>(this.value)" class="form-control mb10">
                            <option value="">Pilih Provinsi</option>
                              <?php 
                              $queryProvinsi=mysql_query("SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
                              while ($dataProvinsi=mysql_fetch_array($queryProvinsi)){ ?>

                              <option value="<?php echo $dataProvinsi['lokasi_propinsi'] ?>" <?php if($dataProvinsi['lokasi_propinsi'] == $data['ttl_prov']) echo selected ?>><?php echo $dataProvinsi['lokasi_nama'] ?></option>
                              
                              <?php
                              }
                              ?>
                          </select>
                        </div>
                        <!-- 4 -->
                        <label for="satuan" class="col-sm-5 control-label"></label>
                        <div class="col-sm-7"form-co>
                          <select name="ttl_kota" id="ttl_kota5<?php echo $data['id'] ?>" class="form-control mb10">
                            <?php
                            $kota=explode("&prop=", $data['ttl_kota']);
                            $kotaa=$kota[0];$kotab=$kota[1];
                            $getkota=mysql_query("select lokasi_nama, lokasi_id from inf_lokasi where lokasi_propinsi = '$kotab' and lokasi_kabupatenkota = '$kotaa' ");
                            $viewkota=mysql_fetch_array($getkota);
                            ?>
                            <option value="<?php echo $data['ttl_kota'] ?>" selected><?php echo $viewkota[0]  ?></option>
                          </select>
                          </div>

                        <!-- 5 -->
                        <label for="satuan" class="col-sm-5 control-label">Tanggal Lahir <i class="fa fa-calendar"> </i></label>
                        <div class="col-sm-7">
                       <input type="text" class="form-control" name="tgl_lahir" id="tanggal_lahir<?php echo $data['id']; ?>" placeholder="Masukkan Tgl. Lahir" value="<?php echo $data['tgl_lahir']; ?>"><br>
                        </div>


                   </div>

                  <div class="col-lg-6">
                      <!-- 6 -->
                     <label for="satuan" class="col-lg-5 control-label">Tingkat Pendidikan</label>
                   <div class="col-lg-7">
                     <select name="pendidikan" id="pendidikan" class="form-control mb10">
                                             <option value="">Pilih Tingkat Pendidikan</option>
                                             <?php
                                               $q=mysql_query("select * from jenjang_pendidikan");
                                               while($q2=mysql_fetch_array($q)){
                                             ?>
                                             <option value="<?php echo $q2[0] ?>" <?php if($q2[0]==$data['pendidikan']) echo selected ?>><?php echo $q2[2] ?></option>
                                             <?php }
                                             ?>
                                           </select>
                   </div>
                   
                   <label for="satuan" class="col-sm-5 control-label">Pekerjaan</label>
                 <div class="col-sm-7">
                   <input  type="text" class="form-control" name="pekerjaan" placeholder="Masukkan Pekerjaan" value="<?php echo $data['pekerjaan']; ?>"><br>
                 </div>
                   </div>


                  <div class="box-footer" align="right">
                    <br><br>
                     <button type="submit" value="Edit" name="Edit" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
                  </div>

                </div>

                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
          var ajaxku;

          //edit
          function ajaxkota5<?php echo $data['id']; ?>(id){
              ajaxku = buatajax();
              var url="ajax/select_kota.php";
              url=url+"?q="+id;
              url=url+"&sid="+Math.random();
              ajaxku.onreadystatechange=stateChanged5<?php echo $data['id']; ?>;
              ajaxku.open("GET",url,true);
              ajaxku.send(null);
          }

          function buatajax(){
              if (window.XMLHttpRequest){
              return new XMLHttpRequest();
              }
              if (window.ActiveXObject){
              return new ActiveXObject("Microsoft.XMLHTTP");
              }
              return null;
          }

          function stateChanged5<?php echo $data['id']; ?>(){
              var data;
              if (ajaxku.readyState==4){
              data=ajaxku.responseText;
              if(data.length>=0){
              document.getElementById("ttl_kota5<?php echo $data['id']; ?>").innerHTML = data
              }else{
              document.getElementById("ttl_kota5<?php echo $data['id']; ?>").value = "<option selected>Pilih Kota/Kab</option>";
              }
              }
          }
      </script>
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
