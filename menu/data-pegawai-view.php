<?php
include ('../layout/layout-header.php');
include ('../layout/layout-sidebartop.php');
$id=$_REQUEST['id'];
$query=mysql_query("select * from data_pegawai where id='$id'");
$data=mysql_fetch_array($query);

//ttl_propinsi
$getTtl_propinsi=$data['ttl_propinsi'];
$getTtl_propinsi2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi = '$getTtl_propinsi'");
$getTtl_propinsi3=mysql_fetch_array($getTtl_propinsi2);

//ttl_kota
$getTtl_kota=explode("&prop=", $data['ttl_kota']);
$kotaa=$getTtl_kota[0];$kotab=$getTtl_kota[1];
$getTtl_kota2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi = '$kotab' and lokasi_kabupatenkota = '$kotaa' ");
$getTtl_kota3=mysql_fetch_array($getTtl_kota2);

//propinsi
$getpropinsi=$data['propinsi'];
$getpropinsi2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi = '$getpropinsi'");
$getpropinsi3=mysql_fetch_array($getpropinsi2);

//kota
$getPropinsi=$data['propinsi'];
$getKota=$data['kota'];
$getKota2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getPropinsi' and lokasi_kabupatenkota='$getKota' ");
$getKota3=mysql_fetch_array($getKota2);
$pattern = '/[^ ]*$/';
preg_match($pattern, $getKota3[0], $resultsKota);
$getKota4=ucfirst(strtolower($resultsKota[0]));

//ttl_kecamatan
$getTtlKecamatan=$data['kecamatan'];
$getTtlKecamatan2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getPropinsi' and lokasi_kabupatenkota = '$getKota' and lokasi_kecamatan = '$getTtlKecamatan' ");
$getTtlKecamatan3=mysql_fetch_array($getTtlKecamatan2); 
$getTtlKecamatan4=ucfirst(strtolower($getTtlKecamatan3[0]));

//ttl_kelurahan
$getTtlKelurahan=explode(".", $data['kelurahan']);
$getTtlKelurahan2=$getTtlKelurahan[3];
$getTtlKelurahan3=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getPropinsi' and lokasi_kabupatenkota = '$getKota' and lokasi_kecamatan = '$getTtlKecamatan' and lokasi_kelurahan='$getTtlKelurahan2' ");
$getTtlKelurahan4=mysql_fetch_array($getTtlKelurahan3);
$getTtlKelurahan5=ucfirst(strtolower($getTtlKelurahan4[0]));

//usia
$viewdate1 = date("Y", strtotime($data['tanggal_lahir']));
$viewdate2 = date("Y");

//jenis_kelamin
$getJkel = $data['jenis_kelamin'];
$getJkel2=mysql_query("select jenis_kelamin from jenis_kelamin where id='$getJkel'");
$getJkel3=mysql_fetch_array($getJkel2);

//status_pernikahan
$getStatus = $data['status_pernikahan'];
$getStatus2=mysql_query("select status_pernikahan from status_pernikahan where id='$getStatus'");
$getStatus3=mysql_fetch_array($getStatus2);
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
        <h3>Referensi Data Pegawai <i class="fa fa-angle-double-down "></i></h3>

        <!-- <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p> -->
      </div>
      <!-- Default box -->


      <div class="box">
        
        <div class="box-header">
          
        </div>

        <!-- /.box-header -->
        <div class="box-body">

          <div class="col-lg-2"> <!-- required for floating -->
          <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-left">
              <li class="active"><a href="#profile_lengkap" data-toggle="tab">Profile Lengkap</a></li>
              <li><a href="#riwayat_pendidikan" data-toggle="tab">Pendidikan</a></li>
              <li><a href="#riwayat_pekerjaan" data-toggle="tab">Jabatan</a></li>
              <li><a href="#riwayat_gapok" data-toggle="tab">Gaji Pokok</a></li>
              <li><a href="#riwayat_hukuman" data-toggle="tab">Hukuman</a></li>
              <li><a href="#riwayat_organisasi" data-toggle="tab">Organisasi</a></li>
              <li><a href="#riwayat_pelatihan" data-toggle="tab">Pelatihan</a></li>
              <li><a href="#riwayat_penghargaan" data-toggle="tab">Penghargaan</a></li>
              <li><a href="#riwayat_seminar" data-toggle="tab">Seminar</a></li>
              <li><a href="#riwayat_dp3" data-toggle="tab">DP3 / Penilaian Kerja</a></li>
            </ul>
          </div>

          <div class="col-lg-8">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="profile_lengkap">
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Nama</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo ucwords($data['nama']) ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Nip</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['nip'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Nip Lama</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['nip_lama'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Tempat Lahir</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo ucwords($data['ttl_tempat']) ?> - <?php echo ucwords(strtolower($getTtl_kota3[0]))  ?> - <?php echo $getTtl_propinsi3[0] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Tgl Lahir</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo date("d M Y", strtotime($data['tanggal_lahir'])) ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Umur</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $viewdate3 = $viewdate2 - $viewdate1; ?> Thn
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Alamat</div>
                      <div class="col-sm-10"form-co>
                        :&nbsp;&nbsp;
                        <?php echo ucwords($data['alamat']); ?> - Rt <?php echo ucwords($data['rt']); ?> Rw <?php echo ucwords($data['rw']); ?>
                        <?php echo ucwords($getTtlKelurahan5); ?> - <?php echo ucwords($getTtlKecamatan4); ?> - <?php echo ucwords($getKota4); ?> - <?php echo ucwords($getpropinsi3[0]); ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Jenis Kel</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo ucwords($getJkel3[0]) ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Gol Darah</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['gol_darah'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Status</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $getStatus3[0] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Masuk</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo date("d M Y",strtotime($data['tanggal_masuk']))  ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Pengangkatan</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo date("d M Y",strtotime($data['tanggal_pengangkatan'])) ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Pengalaman</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['pengalaman_kerja'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Tinggi Badan</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['tinggi_badan'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Berat Badan</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['berat_badan'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Jenis Rambut</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['jenis_rambut'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">Warna Kulit</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo ucwords($data['warna_kulit']) ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">No Telepon</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['telepon'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">No Hp</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['hp1'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">No Ktp</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['no_ktp'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">No Karpeg</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['no_karpeg'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">No Askes</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['no_askes'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">No Taspen</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['no_taspen'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">No karis</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['no_karis'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">No Npwp</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['no_npwp'] ?>
                      </div>
                    </div>
                    <div class="clearfix mb10">
                      <div class="col-sm-2 control-label">No Korpri</div>
                      <div class="col-sm-10"form-co>
                        : &nbsp;&nbsp;<?php echo $data['no_korpri'] ?>
                      </div>
                    </div>
                </div>
                
              <div class="tab-pane" id="riwayat_pendidikan">
                <table class="table table-bordered table-striped" align="center">
                  <thead>
                    <tr>
                      <td align="center"><strong>Tingkat</strong></td>
                      <td align="center"><strong>Nama Instansi</strong></td>
                      <td align="center"><strong>Jurusan</strong></td>
                      <td align="center"><strong>No. Ijazah</strong></td>
                      <td align="center"><strong>Alamat</strong></td>
                      <td align="center"><strong>Nama Kepala</strong></td>
                    </tr>
                  </thead>
                  <?php
                    //RIWAYAT PENDIDIKAN
                    $id=$_GET['id'];
                    $getRwtPdd=mysql_query("select * from rwt_pendidikan where id_peg='$id' order by tingkat desc ");
                    while($getRwtPdd2=mysql_fetch_array($getRwtPdd)){

                    //jenjang_pendidikan
                    $getJenjang=$getRwtPdd2['tingkat'];                   
                    $getJenjang2=mysql_query("select pendidikan from jenjang_pendidikan where id='$getJenjang' ");
                    $getJenjang3=mysql_fetch_array($getJenjang2);

                    //ttl_propinsi
                    $getTtl_propinsi=$getRwtPdd2['provinsi'];
                    $getTtl_propinsi2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi = '$getTtl_propinsi'");
                    $getTtl_propinsi3=mysql_fetch_array($getTtl_propinsi2);

                    //ttl_kota
                    $getTtlPropinsi=$getRwtPdd2['provinsi'];
                    $getTtlKota=$getRwtPdd2['kota'];
                    $getTtlKota2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getTtlPropinsi' and lokasi_kabupatenkota='$getTtlKota' ");
                    $getTtlKota3=mysql_fetch_array($getTtlKota2);
                    $pattern = '/[^ ]*$/';
                    preg_match($pattern, $getTtlKota3[0], $resultsKota);
                    $getTtlKota4=ucfirst(strtolower($resultsKota[0]));
                  ?>
                    <tr>
                      <td align="center"><?php echo $getJenjang3[0] ?></td>
                      <td align="center"><?php echo $getRwtPdd2['nama'] ?></td>
                      <td align="center"><?php echo $getRwtPdd2['jurusan'] ?></td>
                      <td align="center"><?php echo $getRwtPdd2['noijazah'] ?></td>
                      <td align="center"><?php echo $getRwtPdd2['alamat'] ?> - <?php echo $getTtlKota4 ?> - <?php echo $getTtl_propinsi3[0] ?></td>
                      <td align="center"><?php echo $getRwtPdd2['kepala'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
              </div>

              <div class="tab-pane" id="riwayat_pekerjaan">
                <table class="table table-bordered table-striped" align="center">
                  <thead>
                    <tr>
                      <td width="50" align="center" rowspan="2" vertical-align="text-center"><strong>Jabatan</strong></td>
                      <td width="50" align="center" colspan="3"><strong>Surat Keputusan</strong></td>
                    </tr>
                    <tr>
                      <td width="50" align="center"><strong>Pejabat</strong></td>
                      <td width="50" align="center"><strong>Nomor SK</strong></td>
                      <td width="50" align="center"><strong>Tanggal SK</strong></td>
                    </tr>
                  </thead>
                  <?php
                    //RIWAYAT PEKERJAAN
                    $id=$_GET['id'];
                    
                    $getRwtPkj=mysql_query("select * from rwt_jabatan where id_peg = '$id' order by id desc");
                    while($getRwtPkj2=mysql_fetch_array($getRwtPkj)){

                      $getJabatan=$getRwtPkj2['jabatan']; 
                      $getJabatan2=mysql_query("select jenis_jabatan from jenis_jabatan where id='$getJabatan' ");
                      $getJabatan3=mysql_fetch_array($getJabatan2);
                  ?>
                    <tr>
                      <td align="center"><?php echo $getJabatan3[0] ?></td>
                      <td align="center"><?php echo $getRwtPkj2['pejabat'] ?></td>
                      <td align="center"><?php echo $getRwtPkj2['nosk'] ?></td>
                      <td align="center"><?php echo date("d M Y", strtotime($getRwtPkj2['tglsk'])) ?></td>
                    </tr>
                    <?php } ?>
                </table>
              </div>

              <div class="tab-pane" id="riwayat_gapok">
                <table border="1" align="center" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td width="50" align="center"><strong>Golongan</strong></td>
                      <td width="50" align="center"><strong>Gaji Pokok</strong></td>
                    </tr>
                  </thead>
                  <?php
                  $id=$_GET['id'];
                  $getRwtgapok=mysql_query("select * from rwt_gajipokok where id_peg = '$id'");
                  while($getRwtgapok2=mysql_fetch_array($getRwtgapok)){
                  $getGol=$getRwtgapok2['golongan'];
                  $getGol2=mysql_query("select pangkat from gol_ruang where id='$getGol' ");
                  $getGol3=mysql_fetch_array($getGol2);
                  ?>
                  <tr>
                    <td align="center"><?php echo $getGol3[0]  ?></td>
                    <td align="center">Rp <?php echo number_format($getRwtgapok2['gaji_pokok'] , 0, '.', ',') ?></td>
                  </tr>
                  <?php } ?>
                </table>
              </div>

              <div class="tab-pane" id="riwayat_hukuman">
                <table border="1" align="center" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td width="50" align="center"><strong>Nama Hukuman</strong></td>
                      <td width="50" align="center"><strong>Tanggal</strong></td>
                    </tr>
                  </thead>
                  <?php
                  $id=$_GET['id'];
                  $getRwthukuman=mysql_query("select * from rwt_hukuman where id_peg = '$id'");
                  while($getRwthukuman2=mysql_fetch_array($getRwthukuman)){

                  $gethukuman=$getRwthukuman2['nama_hukuman'];
                  $gethukuman2=mysql_query("select hukuman from master_hukuman where id='$gethukuman' ");
                  $gethukuman3=mysql_fetch_array($gethukuman2);
                  ?>
                  <tr>
                    <td align="center"><?php echo $gethukuman3[0]  ?></td>
                    <td align="center"><?php echo date("d M Y", strtotime($getRwthukuman2['tanggal_hukuman'])) ?></td>
                  </tr>
                  <?php } ?>
                </table>
              </div>

              <div class="tab-pane" id="riwayat_organisasi">
                <table border="1" align="center" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td width="50" align="center" ><strong>Uraian</strong></td>
                    <td width="50" align="center"><strong>Lokasi</strong></td>
                    <td width="50" align="center"><strong>Tanggal</strong></td>
                  </tr>
                </thead>
                <?php
                $id=$_GET['id'];
                $getRwtorganisasi=mysql_query("select * from rwt_organisasi where id_peg = '$id'");
                while($getRwtorganisasi2=mysql_fetch_array($getRwtorganisasi)){
                ?>
                <tr>
                  <td align="center"><?php echo $getRwtorganisasi2['uraian']  ?></td>
                  <td align="center"><?php echo $getRwtorganisasi2['lokasi'] ?></td>
                  <td align="center"><?php echo date("d M Y", strtotime($getRwtorganisasi2['tanggal'])) ?></td>
                </tr>
                <?php } ?>
                </table>
              </div>  

              <div class="tab-pane" id="riwayat_pelatihan">
                <table border="1" align="center" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td width="50" align="center" ><strong>Pelatihan</strong></td>
                      <td width="50" align="center"><strong>Lokasi</strong></td>
                      <td width="50" align="center"><strong>Tanggal Sertifikat</strong></td>
                    </tr>
                  </thead>
                  <?php
                  $id=$_GET['id'];
                  $getRwtpelatihan=mysql_query("select * from rwt_pelatihan where id_peg = '$id'");
                  while($getRwtpelatihan2=mysql_fetch_array($getRwtpelatihan)){
                  ?>
                  <tr>
                    <td align="center"><?php echo $getRwtpelatihan2['nama_pelatihan']  ?></td>
                    <td align="center"><?php echo $getRwtpelatihan2['lokasi'] ?></td>
                    <td align="center"><?php echo date("d M Y", strtotime($getRwtpelatihan2['tanggal_sertifikat'])) ?></td>
                  </tr>
                  <?php } ?>
                </table>
              </div>  

              <div class="tab-pane" id="riwayat_penghargaan">
                <table border="1" align="center" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td width="50" align="center"><strong>Nama Penghargaan</strong></td>
                      <td width="50" align="center"><strong>No SK</strong></td>
                      <td width="50" align="center"><strong>Tanggal SK</strong></td>
                    </tr>
                  </thead>
                  <?php
                  $id=$_GET['id'];
                  $getRwtpenghargaan=mysql_query("select * from rwt_penghargaan where id_peg = '$id'");
                  while($getRwtpenghargaan2=mysql_fetch_array($getRwtpenghargaan)){

                  $getpenghargaan=$getRwtpenghargaan2['nama_penghargaan'];
                  $getpenghargaan2=mysql_query("select penghargaan from master_penghargaan where id='$getpenghargaan' ");
                  $getpenghargaan3=mysql_fetch_array($getpenghargaan2);
                  ?>
                  <tr>
                    <td align="center"><?php echo $getpenghargaan3[0]  ?></td>
                    <td align="center"><?php echo $getRwtpenghargaan2['nosk'] ?></td>
                    <td align="center"><?php echo date("d M Y", strtotime($getRwtpenghargaan2['tanggal_sk'])) ?></td>
                  </tr>
                  <?php } ?>
                </table>
              </div>  

              <div class="tab-pane" id="riwayat_seminar">
                <table border="1" align="center" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td width="50" align="center" ><strong>Uraian</strong></td>
                      <td width="50" align="center"><strong>Lokasi</strong></td>
                      <td width="50" align="center"><strong>Tanggal</strong></td>
                    </tr>
                  </thead>
                  <?php
                  $id=$_GET['id'];
                  $getRwtseminar=mysql_query("select * from rwt_seminar where id_peg = '$id'");
                  while($getRwtseminar2=mysql_fetch_array($getRwtseminar)){
                  ?>
                  <tr>
                    <td align="center"><?php echo $getRwtseminar2['uraian']  ?></td>
                    <td align="center"><?php echo $getRwtseminar2['lokasi'] ?></td>
                    <td align="center"><?php echo date("d M Y", strtotime($getRwtseminar2['tanggal'])) ?></td>
                  </tr>
                  <?php } ?>
                </table>
              </div> 

              <div class="tab-pane" id="riwayat_dp3">
                <table border="1" align="center" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <td width="50" align="center" ><strong>Tahun</strong></td>
                        <td width="50" align="center"><strong>Rata - Rata</strong></td>
                        <td width="50" align="center"><strong>Atasan</strong></td>
                        <td width="50" align="center"><strong>Penilai</strong></td>
                      </tr>
                    </thead>
                    <?php
                    $id=$_GET['id'];
                    $getRwtdp3=mysql_query("select * from rwt_dp3 where id_peg = '$id'");
                    while($getRwtdp32=mysql_fetch_array($getRwtdp3)){
                    ?>
                    <tr>
                      <td align="center"><?php echo $getRwtdp32['tahun']  ?></td>
                      <td align="center"><?php echo $getRwtdp32['rata2'] ?></td>
                      <td align="center"><?php echo $getRwtdp32['atasan'] ?></td>
                      <td align="center"><?php echo $getRwtdp32['penilai'] ?></td>
                    </tr>
                    <?php } ?>
                  </table>
              </div> 

            </div>
          </div>
          <div class="col-lg-2"> <!-- required for floating -->
          <!-- Nav tabs -->
            <a class="thumbnail">
              <?php
              //DEFAULT FOTO JIKA KOSONG//
                if($data['foto']=="../assets/images/" || $data['foto']=="")
                  $fotoView = "../assets/images/an.jpg";
                else
                  $fotoView = $data['foto'];
              ?>
              <img src="<?php echo $fotoView ?>" width="150" height="200" class="img-responsive"><br>
            </a>
          </div>
        
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
