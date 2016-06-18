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
                  
                <form role="form" action="../crud/dataPegawaiSimpan.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      
                      <div class="col-lg-2">
                        <a class="thumbnail">
                          <?php
                          //DEFAULT FOTO JIKA KOSONG//
                            if($data['foto']=="../assets/images/" || $data['foto']=="")
                              $fotoEdit = "../assets/images/an.jpg";
                            else
                              $fotoEdit = $semua2['foto'];
                          ?>
                          <img src="<?php echo $fotoEdit ?>" width="150" height="200" class="img-responsive"><br>
                        </a>
                        <input type="file" class="form-control" name="foto<?php echo $data['id']; ?>" id="foto<?php echo $data['id']; ?>">
                      </div>
                      <div class="col-lg-10">
                        <div class="panel panel-primary">
                          <div class="panel-heading">Data Diri</div>
                            <div class="panel-body">
                                <input type="hidden" name"getid" value="<?php echo $data['id']; ?>"></input>
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Nip</label> 
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control mb10" name="nip<?php echo $data['id']; ?>" id="nip<?php echo $data['id']; ?>" placeholder="Nip" value="<?php echo $semua2['nip'] ?>">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Nip Lama</label> 
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control mb10" name="nip_lama<?php echo $data['id']; ?>" id="nip_lama<?php echo $data['id']; ?>" placeholder="Nip Lama" value="<?php echo $semua2['nip_lama'] ?>">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Nama Lengkap</label> 
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control mb10" name="nama<?php echo $data['id']; ?>" id="nama<?php echo $data['id']; ?>" placeholder="Nama Lengkap" value="<?php echo $semua2['nama'] ?>">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Gelar Depan</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="gelar_depan<?php echo $data['id']; ?>" id="gelar_depan<?php echo $data['id']; ?>" placeholder="Gelar Depan" value="<?php echo $semua2['gelar_depan'] ?>">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Gelar Belakang</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="gelar_belakang<?php echo $data['id']; ?>" id="gelar_belakang<?php echo $data['id']; ?>" placeholder="Gelar Belakang" value="<?php echo $semua2['gelar_belakang'] ?>">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Tempat Lahir</label> 
                                    <div class="col-sm-8">
                                      <div class="clearfix">
                                        <label class="col-sm-3 control-label">Propinsi</label> 
                                        <div class="col-sm-8">
                                          <select name="ttl_propinsi<?php echo $data['id']; ?>" id="ttl_propinsi<?php echo $data['id']; ?>" onchange="ajaxkota3<?php echo $data['id']; ?>(this.value);nextKota<?php echo $data['id']; ?>();" class="form-control mb10">
                                            <option value="">Pilih Provinsi</option>
                                            <?php 
                                            $queryProvinsi=mysql_query("SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
                                            while ($dataProvinsi=mysql_fetch_array($queryProvinsi)){ ?>

                                            <option value="<?php echo $dataProvinsi['lokasi_propinsi'] ?>" <?php if($dataProvinsi['lokasi_propinsi'] == $semua2['ttl_propinsi']) echo selected ?>><?php echo $dataProvinsi['lokasi_nama'] ?></option>
                                            
                                            <?php
                                            }
                                            ?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="clearfix">
                                        <label class="col-sm-3 control-label">Kota</label> 
                                        <div class="col-sm-8">
                                          <select name="ttl_kota<?php echo $data['id']; ?>" id="ttl_kota3<?php echo $data['id']; ?>" class="form-control mb10" disabled>
                                            <?php
                                            $kota=explode("&prop=", $semua2['ttl_kota']);
                                            $kotaa=$kota[0];$kotab=$kota[1];
                                            $getkota=mysql_query("select lokasi_nama, lokasi_id from inf_lokasi where lokasi_propinsi = '$kotab' and lokasi_kabupatenkota = '$kotaa' ");
                                            $viewkota=mysql_fetch_array($getkota);
                                            ?>
                                            <option value="<?php echo $semua2['ttl_kota'] ?>" selected><?php echo $viewkota[0]  ?></option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="clearfix">
                                        <label class="col-sm-3 control-label">Tempat</label> 
                                        <div class="col-sm-8">
                                          <input type="text" class="form-control mb10" name="ttl_tempat<?php echo $data['id']; ?>" id="ttl_tempat<?php echo $data['id']; ?>" placeholder="Tempat" value="<?php echo $semua2['ttl_tempat'] ?>">
                                        </div>
                                      </div>
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Tanggal Lahir</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="tanggal_lahir<?php echo $data['id']; ?>" id="tanggal_lahir<?php echo $data['id']; ?>" placeholder="Tanggal Lahir" value="<?php echo $semua2['tanggal_lahir'] ?>">
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                  <div class="col-sm-4"form-co>
                                    <select name="jenis_kelamin<?php echo $data['id']; ?>" id="jenis_kelamin<?php echo $data['id']; ?>" class="form-control mb10">
                                      <option value="">Pilih Jenis Kelamin</option>
                                      <?php
                                        $qjenis_kelamin=mysql_query("select * from jenis_kelamin");
                                        while($qjenis_kelamin2=mysql_fetch_array($qjenis_kelamin)){
                                      ?>
                                      <option value="<?php echo $qjenis_kelamin2[0] ?>" <?php if($qjenis_kelamin2[0] == $semua2['jenis_kelamin']) echo 'selected' ?> ><?php echo $qjenis_kelamin2[1] ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Gol Darah</label>
                                  <div class="col-sm-4"form-co>
                                    <input type="text" class="form-control mb10" name="gol_darah<?php echo $data['id']; ?>" id="gol_darah<?php echo $data['id']; ?>" placeholder="Gol Darah" value="<?php echo $semua2['gol_darah'] ?>">
                                  </div>
                                </div>
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Agama</label>
                                  <div class="col-sm-4"form-co>
                                    <select name="agama<?php echo $data['id']; ?>" id="agama<?php echo $data['id']; ?>" class="form-control mb10">
                                      <option value="">Pilih Agama</option>
                                      <?php
                                        $qagama=mysql_query("select * from agama");
                                        while($qagama2=mysql_fetch_array($qagama)){
                                      ?>
                                      <option value="<?php echo $qagama2[0] ?>" <?php if($qagama2[0] == $semua2['agama']) echo 'selected' ?>><?php echo $qagama2[1] ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                  </div>
                                </div>  
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Status</label>
                                  <div class="col-sm-4"form-co>
                                    <select name="status_pernikahan<?php echo $data['id']; ?>" id="status_pernikahan<?php echo $data['id']; ?>" class="form-control mb10">
                                      <option value="">Pilih Status</option>
                                      <?php
                                        $qstatus=mysql_query("select * from status_pernikahan");
                                        while($qstatus2=mysql_fetch_array($qstatus)){
                                      ?>
                                      <option value="<?php echo $qstatus2[0] ?>" <?php if($qstatus2[0] == $semua2['status_pernikahan']) echo 'selected' ?>><?php echo $qstatus2[1] ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Masuk</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="tanggal_masuk<?php echo $data['id']; ?>" id="tanggal_masuk<?php echo $data['id']; ?>" placeholder="Tanggal Masuk" value="<?php echo $semua2['tanggal_masuk'] ?>">
                                  </div>
                                </div>
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Pengangkatan</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="tanggal_pengangkatan<?php echo $data['id']; ?>" id="tanggal_pengangkatan<?php echo $data['id']; ?>" placeholder="Tanggal Pengangkatan" value="<?php echo $semua2['tanggal_pengangkatan'] ?>">
                                  </div>
                                </div>
                                <div class="clearfix">
                                  <label class="col-sm-2 control-label">Pengalaman</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="pengalaman_kerja<?php echo $data['id']; ?>" id="pengalaman_kerja" placeholder="Misal : 4 Tahun" value="<?php echo $semua2['pengalaman_kerja'] ?>">
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
                                    <input type="text" class="form-control mb10" name="alamat<?php echo $data['id']; ?>" id="alamat<?php echo $data['id']; ?>" placeholder="Alamat" value="<?php echo $semua2['alamat'] ?>">
                                  </div>
                              </div>
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">RT</label> 
                                <div class="col-sm-3">
                                  <input type="text" class="form-control mb10" name="rt<?php echo $data['id']; ?>" id="rt<?php echo $data['id']; ?>" placeholder="RT" value="<?php echo $semua2['rt'] ?>">
                                </div>
                              </div>
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">RW</label> 
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control mb10" name="rw<?php echo $data['id']; ?>" id="rw<?php echo $data['id']; ?>" placeholder="RW" value="<?php echo $semua2['rw'] ?>">
                                </div>
                              </div>
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Propinsi</label>
                                  <div class="col-sm-6"form-co>
                                    <select name="propinsi<?php echo $data['id']; ?>" id="prop<?php echo $data['id']; ?>" onchange="ajaxkota4<?php echo $data['id']; ?>(this.value);nextKota2_<?php echo $data['id']; ?>();" class="form-control mb10">
                                      <option value="">Pilih Provinsi</option>
                                        <?php 
                                        $queryProvinsi=mysql_query("SELECT * FROM inf_lokasi where lokasi_kabupatenkota=0 and lokasi_kecamatan=0 and lokasi_kelurahan=0 order by lokasi_nama");
                                        while ($dataProvinsi=mysql_fetch_array($queryProvinsi)){ ?>

                                          <option value="<?php echo $dataProvinsi['lokasi_propinsi'] ?>" <?php if($dataProvinsi['lokasi_propinsi'] == $semua2['propinsi']) echo selected ?>><?php echo $dataProvinsi['lokasi_nama'] ?></option>
                                        
                                        <?php
                                        }
                                        ?>
                                    </select>
                                  </div>
                              </div>    
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Kota</label>
                                  <div class="col-sm-6"form-co>
                                    <select name="kota<?php echo $data['id']; ?>" id="ttl_kota4<?php echo $data['id']; ?>" onchange="ajaxkec2_<?php echo $data['id']; ?>(this.value);nextKec<?php echo $data['id']; ?>();" class="form-control mb10" disabled>
                                      <?php
                                      $kota=explode("&prop=", $semua2['kota']);
                                      $kotaa=$kota[0];$kotab=$kota[1];
                                      $getkota=mysql_query("select lokasi_nama, lokasi_id from inf_lokasi where lokasi_propinsi = '$kotab' and lokasi_kabupatenkota = '$kotaa' ");
                                      $viewkota=mysql_fetch_array($getkota);
                                      ?>
                                      <option value="<?php echo $semua2['kota'] ?>"><?php echo $viewkota[0]  ?></option>
                                    </select>
                                  </div>
                              </div>    
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Kecamatan</label>
                                  <div class="col-sm-6"form-co>
                                    <select name="kecamatan<?php echo $data['id']; ?>" id="kec4<?php echo $data['id']; ?>" onchange="ajaxkel2_<?php echo $data['id']; ?>(this.value);nextKel<?php echo $data['id']; ?>();" class="form-control mb10" disabled>
                                      <?php
                                      $kec=explode("&prop=", $semua2['kecamatan']);
                                      $kec2=explode("&kec=", $kec[0]);
                                      $kecb=$kec[1]; $kecc=$kec2[1]; $kecd=$kec2[0];
                                      $getkec=mysql_query("select lokasi_nama, lokasi_id from inf_lokasi where lokasi_propinsi = '$kecb' and lokasi_kabupatenkota = '$kecc' and lokasi_kecamatan = '$kecd'");
                                      $viewkec=mysql_fetch_array($getkec);
                                      ?>
                                      <option value="<?php echo $semua2['kecamatan'] ?>"><?php echo $viewkec[0]; ?></option>
                                    </select>
                                  </div>
                              </div>    
                              <div class="clearfix">     
                                <label class="col-sm-2 control-label">Kelurahan</label>
                                  <div class="col-sm-6"form-co>
                                    <select name="kelurahan<?php echo $data['id']; ?>" id="kel4<?php echo $data['id']; ?>" class="form-control mb10" disabled>
                                      <?php
                                      $kel=explode(".", $semua2['kelurahan']);
                                      $kela=$kel[0];$kelb=$kel[1];$kelc=$kel[2];$keld=$kel[3];
                                      $getkel=mysql_query("select lokasi_nama, lokasi_id from inf_lokasi where lokasi_propinsi = '$kela' and lokasi_kabupatenkota = '$kelb' and lokasi_kecamatan = '$kelc' and lokasi_kelurahan='$keld'");
                                      $getkel2=mysql_fetch_array($getkel);
                                      ?>
                                      <option value="<?php echo $semua2['kelurahan'] ?>"><?php echo $getkel2[0] ?></option>
                                    </select>
                                  </div>
                              </div>    
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Kode Pos</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="kode_pos<?php echo $data['id']; ?>" id="kode_pos<?php echo $data['id']; ?>" placeholder="Kode Pos" value="<?php echo $semua2['kode_pos'] ?>">
                                </div>
                              </div>  
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Telepon</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="telepon<?php echo $data['id']; ?>" id="telepon<?php echo $data['id']; ?>" placeholder="Telepon" value="<?php echo $semua2['telepon'] ?>">
                                </div>
                              </div>  
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Hp 1</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="hp1<?php echo $data['id']; ?>" id="hp1<?php echo $data['id']; ?>" placeholder="Hp1" value="<?php echo $semua2['hp1'] ?>">
                                </div>
                              </div>  
                              <div class="clearfix"> 
                                <label class="col-sm-2 control-label">Hp 2</label> 
                                  <div class="col-sm-4">
                                    <input type="text" class="form-control mb10" name="hp2<?php echo $data['id']; ?>" id="hp2<?php echo $data['id']; ?>" placeholder="Hp2" value="<?php echo $semua2['hp2'] ?>">
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
                                      <input type="text" class="form-control mb10" name="tinggi_badan<?php echo $data['id']; ?>" id="tinggi_badan<?php echo $data['id']; ?>" placeholder="Tinggi Badan" value="<?php echo $semua2['tinggi_badan'] ?>">
                                    </div>
                                </div>    
                                <div class="clearfix"> 
                                  <label class="col-sm-5 control-label">Berat Badan</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="berat_badan<?php echo $data['id']; ?>" id="berat_badan<?php echo $data['id']; ?>" placeholder="Berat Badan" value="<?php echo $semua2['berat_badan'] ?>">
                                    </div>
                                </div>    
                                <div class="clearfix">         
                                  <label class="col-sm-5 control-label">Jenis Rambut</label> 
                                    <div class="col-sm-7">
                                      <select name="jenis_rambut<?php echo $data['id']; ?>" id="jenis_rambut<?php echo $data['id']; ?>" class="form-control mb10">
                                      <option value="">Pilih Jenis Rambut</option>
                                      <?php
                                        $qjenis_rambut=mysql_query("select * from jenis_rambut");
                                        while($qjenis_rambut2=mysql_fetch_array($qjenis_rambut)){
                                      ?>
                                      <option value="<?php echo $qjenis_rambut2[0] ?>" <?php if($qjenis_rambut2[0] == $semua2['jenis_rambut']) echo 'selected' ?>><?php echo $qjenis_rambut2[1] ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                    </div> 
                                </div>    
                                <div class="clearfix">     
                                  <label class="col-sm-5 control-label">Bentuk Wajah</label> 
                                    <div class="col-sm-7">
                                      <select name="bentuk_wajah<?php echo $data['id']; ?>" id="bentuk_wajah<?php echo $data['id']; ?>" class="form-control mb10">
                                      <option value="">Pilih Bentuk Wajah</option>
                                      <?php
                                        $qbentuk_wajah=mysql_query("select * from bentuk_wajah");
                                        while($qbentuk_wajah2=mysql_fetch_array($qbentuk_wajah)){
                                      ?>
                                      <option value="<?php echo $qbentuk_wajah2[0] ?>" <?php if($qbentuk_wajah2[0] == $semua2['bentuk_wajah']) echo 'selected' ?>><?php echo $qbentuk_wajah2[1] ?></option>
                                      <?php }
                                      ?>
                                    </select>
                                    </div> 
                                </div>
                                <div class="clearfix">       
                                  <label class="col-sm-5 control-label">Warna Kulit</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="warna_kulit<?php echo $data['id']; ?>" id="warna_kulit<?php echo $data['id']; ?>" placeholder="Warna Kulit" value="<?php echo $semua2['warna_kulit'] ?>">
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
                                      <input type="text" class="form-control mb10" name="no_ktp<?php echo $data['id']; ?>" id="no_ktp<?php echo $data['id']; ?>" placeholder="No. KTP" value="<?php echo $semua2['no_ktp'] ?>">
                                    </div>
                                </div>    
                                <div class="clearfix"> 
                                  <label class="col-sm-5 control-label">No. Karpeg</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_karpeg<?php echo $data['id']; ?>" id="no_karpeg<?php echo $data['id']; ?>" placeholder="No. Karpeg" value="<?php echo $semua2['no_karpeg'] ?>">
                                    </div>
                                </div>    
                                <div class="clearfix">         
                                  <label class="col-sm-5 control-label">No. Askes</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_askes<?php echo $data['id']; ?>" id="no_askes<?php echo $data['id']; ?>" placeholder="No. Askes" value="<?php echo $semua2['no_askes'] ?>">
                                    </div> 
                                </div>    
                                <div class="clearfix">     
                                  <label class="col-sm-5 control-label">No. Taspen</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_taspen<?php echo $data['id']; ?>" id="no_taspen<?php echo $data['id']; ?>" placeholder="No. Taspen" value="<?php echo $semua2['no_taspen'] ?>">
                                    </div> 
                                </div>
                                <div class="clearfix">       
                                  <label class="col-sm-5 control-label">No. Karis</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_karis<?php echo $data['id']; ?>" id="no_karis<?php echo $data['id']; ?>" placeholder="No. Karis" value="<?php echo $semua2['no_karis'] ?>">
                                    </div>
                                </div>
                                <div class="clearfix">       
                                  <label class="col-sm-5 control-label">No. NPWP</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_npwp<?php echo $data['id']; ?>" id="no_npwp<?php echo $data['id']; ?>" placeholder="No. NPWP" value="<?php echo $semua2['no_npwp'] ?>">
                                    </div>
                                </div>
                                <div class="clearfix">       
                                  <label class="col-sm-5 control-label">No. KORPRI</label> 
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control mb10" name="no_korpri<?php echo $data['id']; ?>" id="no_korpri<?php echo $data['id']; ?>" placeholder="No. Korpri" value="<?php echo $semua2['no_korpri'] ?>">
                                    </div>
                                </div>    
                            </div>  
                        </div> 
                      </div>
                        
                    </div>
                  </div>  

                

              </div>
              <!-- <div class="box-footer">
                
              </div> -->
              <div class="modal-footer">
                <button type="submit" value="Edit" name="Edit" class="btn btn-primary glyphicon glyphicon-floppy-disk" onclick="enableInput<?php echo$data['id']?>()">Edit</button>
                <button type="button" class="btn btn-default glyphicon glyphicon-remove" data-dismiss="modal">Batal</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<!-- ============================================================== AKHIR KONTEN =================================================================== -->        
