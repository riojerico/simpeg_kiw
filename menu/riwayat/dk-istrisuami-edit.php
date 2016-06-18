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
                <h4 class="modal-title<?php echo $data['id']; ?>" id="myModalLabel">Edit Data Keluarga Istri / Suami</h4>
              </div>
              <div class="modal-body">

                <form role="form" action="../crud/rwtDKistrisuami.php?id=<?php echo $getid; ?>" method="post" enctype="multipart/form-data">
                  <div class="panel-body">
                  <div class="col-lg-6">



                      <?php $getid = $_REQUEST['id']; ?>
                        <input  type="hidden" class="form-control" name="getid" placeholder="Masukkan Nama Tempat" value="<?php echo $getid; ?>"></input>
                      <!-- 1 -->
                      <label for="satuan" class="col-lg-5 control-label">Istri / Suami</label>
                      <div class="col-lg-7">
                        <select name="istrisuami" class="form-control"> <option value="">Pilih Status</option>
                                                                  <option value="istri">Istri</option>
                                                                  <option value="suami">Suami</option>
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
                      <!-- 5 -->
                      <label for="satuan" class="col-sm-5 control-label">Tanggal Lahir <i class="fa fa-calendar"> </i></label>
                      <div class="col-sm-7">
                     <input type="text" class="form-control" name="tgl_lahir" id="tanggal_lahir" placeholder="Masukkan Tgl. Lahir" value="<?php echo $data['tgl_lahir']; ?>"><br>
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
                                             <option value="<?php echo $q2[0] ?>"><?php echo $q2[2] ?></option>
                                             <?php }
                                             ?>
                                           </select>
                   </div>
                   <!-- 7 -->
                   <label for="satuan" class="col-sm-5 control-label">Tgl. Menikah  <i class="fa fa-calendar"> </i></label>
                   <div class="col-sm-7">
                     <input type="text" class="form-control" name="tgl_nikah" id="tanggal_2" placeholder="Masukkan Tgl. Menikah" value="<?php echo $data['tgl_nikah']; ?>"><br>
                   </div>
                   <!-- 8 -->
                 <label for="satuan" class="col-sm-5 control-label">Pekerjaan</label>
                 <div class="col-sm-7">
                   <input  type="text" class="form-control" name="pekerjaan" placeholder="Masukkan Pekerjaan" value="<?php echo $data['pekerjaan']; ?>"><br>
                 </div>
                  <!-- 9 -->
                 <label for="satuan" class="col-sm-5 control-label">Tunjangan</label>
                 <div class="col-sm-7">
                   <select  class="form-control" name="tunjangan" >
                     <option value="">Pilih Status</option>
                     <option value="Mendapat Tunjangan">Mendapat Tunjangan</option>
                     <option value="Tidak Mendapat Tunjangan">Tidak Mendapat Tunjangan</option>
                   </select>
                 </div>

                <div class="box-footer" align="right">
                  <br><br>
                   <button type="submit" value="Simpan" name="Simpan" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
                </div>

              </div>

              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
<!-- ============================================================== AKHIR KONTEN =================================================================== -->
