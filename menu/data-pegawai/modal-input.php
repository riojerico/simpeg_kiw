<!-- Dialog Modal Input -->
<!-- ============================================================== AWAL KONTEN =================================================================== -->        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Input Data Pegawai</h4>
              </div>
              <div class="modal-body">

                <form role="form" action="../crud/dataPegawaiSimpan.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      
                      <div class="col-lg-2">
                        <a href="#" class="thumbnail">
                          <img src="../assets/images/an.jpg" width="150" height="200" class="img-responsive"><br>
                        </a>
                        <input type="file" class="form-control" name="foto" id="foto">
                      </div>
                      <div class="col-lg-10">
                        <div class="panel panel-primary">
                          <div class="panel-heading">Data Diri</div>
                            <div class="panel-body">
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Nip</label> 
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control mb10" name="nip" id="nip" placeholder="Nip">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Nip Lama</label> 
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control mb10" name="nip_lama" id="nip_lama" placeholder="Nip Lama">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Nama Lengkap</label> 
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control mb10" name="nama" id="nama" placeholder="Nama Lengkap">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Gelar Depan</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="gelar_depan" id="gelar_depan" placeholder="Gelar Depan">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Gelar Belakang</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="gelar_belakang" id="gelar_belakang" placeholder="Gelar Belakang">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Tempat Lahir</label> 
                                    <div class="col-sm-8">
                                      <div class="clearfix">
                                        <label class="col-sm-3 control-label">Propinsi</label> 
                                        <div class="col-sm-8">
                                    <select name="ttl_propinsi" id="ttl_propinsi" onchange="ajaxkota2(this.value);nextKota();" class="form-control mb10">
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
                                        <label class="col-sm-3 control-label">Kota</label> 
                                        <div class="col-sm-8">
                                          <select name="ttl_kota" id="ttl_kota" class="form-control mb10" disabled>
                                            <option value="">Pilih Kota</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="clearfix">
                                        <label class="col-sm-3 control-label">Tempat</label> 
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control mb10" name="ttl_tempat" id="ttl_tempat" placeholder="Tempat">
                                        </div>
                                      </div>
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Tanggal Lahir</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                  <div class="col-sm-4"form-co>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control mb10">
                                      <option value="">Pilih Jenis Kelamin</option>
                                      <?php
                                        $qjenis_kelamin=mysql_query("select * from jenis_kelamin");
                                        while($qjenis_kelamin2=mysql_fetch_array($qjenis_kelamin)){
                                      ?>
                                      <option value="<?php echo $qjenis_kelamin2[0] ?>"><?php echo $qjenis_kelamin2[1] ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Gol Darah</label>
                                  <div class="col-sm-4"form-co>
                                    <input type="text" class="form-control mb10" name="gol_darah" id="gol_darah" placeholder="Gol Darah">
                                  </div>
                                </div>
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Agama</label>
                                  <div class="col-sm-4"form-co>
                                    <select name="agama" id="agama" class="form-control mb10">
                                      <option value="">Pilih Agama</option>
                                      <?php
                                        $qagama=mysql_query("select * from agama");
                                        while($qagama2=mysql_fetch_array($qagama)){
                                      ?>
                                      <option value="<?php echo $qagama2[0] ?>"><?php echo $qagama2[1] ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Status</label>
                                  <div class="col-sm-4"form-co>
                                    <select name="status_pernikahan" id="status_pernikahan" class="form-control mb10">
                                      <option value="">Pilih Status</option>
                                      <?php
                                        $qstatus=mysql_query("select * from status_pernikahan");
                                        while($qstatus2=mysql_fetch_array($qstatus)){
                                      ?>
                                      <option value="<?php echo $qstatus2[0] ?>"><?php echo $qstatus2[1] ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Masuk</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="tanggal_masuk" id="tanggal_lahir2" placeholder="Tanggal Masuk">
                                  </div>
                                </div>
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Pengangkatan</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="tanggal_pengangkatan" id="tanggal_lahir3" placeholder="Tanggal Pengangkatan">
                                  </div>
                                </div>
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Pengalaman</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="pengalaman_kerja" id="pengalaman_kerja" placeholder="Misal : 4 Tahun">
                                  </div>
                                </div>
                          </div>
                        </div> 
                      </div>
                      
                      <div class="col-lg-2">
                        
                      </div>
                      <div class="col-lg-10">
                        <div class="panel panel-info">
                          <div class="panel-heading">Data Alamat</div>
                            <div class="panel-body">
                              
                              <div class="clearfix">  
                                <label class="col-sm-2 control-label">Alamat</label> 
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control mb10" name="alamat" id="alamat" placeholder="Alamat">
                                  </div>
                              </div>
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">RT</label> 
                                <div class="col-sm-3">
                                  <input type="text" class="form-control mb10" name="rt" id="rt" placeholder="RT">
                                </div>
                              </div>
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">RW</label> 
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control mb10" name="rw" id="rw" placeholder="RW">
                                </div>
                              </div>
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Propinsi</label>
                                  <div class="col-sm-6"form-co>
                                    <select name="propinsi" id="prop" onchange="ajaxkota(this.value);nextKota2();" class="form-control mb10">
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
                                <label class="col-sm-2 control-label">Kota</label>
                                  <div class="col-sm-6"form-co>
                                    <select name="kota" id="kota" onchange="ajaxkec(this.value);nextKec();" class="form-control mb10" disabled>
                                      <option value="">Pilih Kota</option>
                                    </select>
                                  </div>
                              </div>    
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Kecamatan</label>
                                  <div class="col-sm-6"form-co>
                                    <select name="kecamatan" id="kec" onchange="ajaxkel(this.value);nextKel();" class="form-control mb10" disabled>
                                      <option value="">Pilih Kecamatan</option>
                                    </select>
                                  </div>
                              </div>    
                              <div class="clearfix">     
                                <label class="col-sm-2 control-label">Kelurahan</label>
                                  <div class="col-sm-6"form-co>
                                    <select name="kelurahan" id="kel" class="form-control mb10" disabled>
                                      <option value="">Pilih Kelurahan/Desa</option>
                                    </select>
                                  </div>
                              </div>    
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Kode Pos</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="kode_pos" id="kode_pos" placeholder="Kode Pos">
                                </div>
                              </div>  
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Telepon</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="telepon" id="telepon" placeholder="Telepon">
                                </div>
                              </div>  
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Hp 1</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="hp1" id="hp1" placeholder="Hp1">
                                </div>
                              </div>  
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Hp 2</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="hp2" id="hp2" placeholder="Hp2">
                                </div> 
                              </div>      
                              
                            </div>  
                        </div> 
                      </div>
                        
                      <div class="col-lg-2">
                        
                      </div>
                      <div class="col-lg-5">
                        <div class="panel panel-success">
                          <div class="panel-heading">Keterangan Badan</div>
                            <div class="panel-body">
                                <div class="clearfix"> 
                                  <label class="col-sm-5 control-label">Tinggi Badan</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan">
                                    </div>
                                </div>    
                                <div class="clearfix"> 
                                  <label class="col-sm-5 control-label">Berat Badan</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="berat_badan" id="berat_badan" placeholder="Berat Badan">
                                    </div>
                                </div>    
                                <div class="clearfix">         
                                  <label class="col-sm-5 control-label">Jenis Rambut</label> 
                                    <div class="col-sm-7">
                                      <select name="jenis_rambut" id="jenis_rambut" class="form-control mb10">
                                      <option value="">Pilih Jenis Rambut</option>
                                      <?php
                                        $qjenis_rambut=mysql_query("select * from jenis_rambut");
                                        while($qjenis_rambut2=mysql_fetch_array($qjenis_rambut)){
                                      ?>
                                      <option value="<?php echo $qjenis_rambut2[0] ?>"><?php echo $qjenis_rambut2[1] ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                    </div> 
                                </div>    
                                <div class="clearfix">     
                                  <label class="col-sm-5 control-label">Bentuk Wajah</label> 
                                    <div class="col-sm-7">
                                      <select name="bentuk_wajah" id="bentuk_wajah" class="form-control mb10">
                                      <option value="">Pilih Bentuk Wajah</option>
                                      <?php
                                        $qbentuk_wajah=mysql_query("select * from bentuk_wajah");
                                        while($qbentuk_wajah2=mysql_fetch_array($qbentuk_wajah)){
                                      ?>
                                      <option value="<?php echo $qbentuk_wajah2[0] ?>"><?php echo $qbentuk_wajah2[1] ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                    </div> 
                                </div>
                                <div class="clearfix">       
                                  <label class="col-sm-5 control-label">Warna Kulit</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="warna_kulit" id="warna_kulit" placeholder="Warna Kulit">
                                    </div>
                                </div>    
                            </div>  
                        </div> 
                      </div>
                      <div class="col-lg-5">
                        <div class="panel panel-warning">
                          <div class="panel-heading">Keterangan Lainnya</div>
                            <div class="panel-body">
                                <div class="clearfix"> 
                                  <label class="col-sm-5 control-label">No. KTP</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_ktp" id="no_ktp" placeholder="No. KTP">
                                    </div>
                                </div>    
                                <div class="clearfix"> 
                                  <label class="col-sm-5 control-label">No. Karpeg</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_karpeg" id="no_karpeg" placeholder="No. Karpeg">
                                    </div>
                                </div>    
                                <div class="clearfix">         
                                  <label class="col-sm-5 control-label">No. Askes</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_askes" id="no_askes" placeholder="No. Askes">
                                    </div> 
                                </div>    
                                <div class="clearfix">     
                                  <label class="col-sm-5 control-label">No. Taspen</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_taspen" id="no_taspen" placeholder="No. Taspen">
                                    </div> 
                                </div>
                                <div class="clearfix">       
                                  <label class="col-sm-5 control-label">No. Karis</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_karis" id="no_karis" placeholder="No. Karis">
                                    </div>
                                </div>
                                <div class="clearfix">       
                                  <label class="col-sm-5 control-label">No. NPWP</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_npwp" id="no_npwp" placeholder="No. NPWP">
                                    </div>
                                </div>
                                <div class="clearfix">       
                                  <label class="col-sm-5 control-label">No. KORPRI</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_korpri" id="no_korpri" placeholder="No. Korpri">
                                    </div>
                                </div>    
                            </div>  
                        </div> 
                      </div>
                        
                    </div>
                  </div>  

                  

                  </table>
                   
                

              </div>
              <!-- <div class="box-footer">
                
              </div> -->
              <div class="modal-footer">
                <button type="submit" value="Simpan" name="Simpan" class="btn btn-primary glyphicon glyphicon-floppy-disk" onclick="enableInput()">Simpan</button>
                <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal">Batal</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<!-- ============================================================== AKHIR KONTEN =================================================================== -->        
