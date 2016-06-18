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
                <h4 class="modal-title<?php echo $data['id']; ?>" id="myModalLabel">Input Data Pegawai</h4>
              </div>
              <div class="modal-body">

                <form role="form" action="../crud/rwtPendidikanView.php?id=<?php echo $getid; ?>" method="post" enctype="multipart/form-data">
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
                        <textarea  type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $data['alamat']; ?>"></textarea><br>
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
