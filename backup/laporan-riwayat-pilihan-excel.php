<?php
include "../koneksi/koneksi.php";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan urut kepangkatan.xls");
//memilih riwayat
$riwayat=$_POST['riwayat'];
//memilih pegawai
$id_peg=$_POST['id_peg'];

$id=$_GET['id'];
$query=mysql_query("select * from data_pegawai where id='$id_peg'");
$query2=mysql_fetch_array($query);

//ttl_propinsi
$getTtl_propinsi=$query2['propinsi'];
$getTtl_propinsi2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi = '$getTtl_propinsi'");
$getTtl_propinsi3=mysql_fetch_array($getTtl_propinsi2);

//ttl_kota
$getTtlPropinsi=$query2['propinsi'];
$getTtlKota=$query2['kota'];
$getTtlKota2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getTtlPropinsi' and lokasi_kabupatenkota='$getTtlKota' ");
$getTtlKota3=mysql_fetch_array($getTtlKota2);
$pattern = '/[^ ]*$/';
preg_match($pattern, $getTtlKota3[0], $resultsKota);
$getTtlKota4=ucfirst(strtolower($resultsKota[0]));

//ttl_kecamatan
$getTtlKecamatan=$query2['kecamatan'];
$getTtlKecamatan2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getTtlPropinsi' and lokasi_kabupatenkota = '$getTtlKota' and lokasi_kecamatan = '$getTtlKecamatan' ");
$getTtlKecamatan3=mysql_fetch_array($getTtlKecamatan2); 
$getTtlKecamatan4=ucfirst(strtolower($getTtlKecamatan3[0]));

//ttl_kelurahan
$getTtlKelurahan=explode(".", $query2['kelurahan']);
$getTtlKelurahan2=$getTtlKelurahan[3];
$getTtlKelurahan3=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getTtlPropinsi' and lokasi_kabupatenkota = '$getTtlKota' and lokasi_kecamatan = '$getTtlKecamatan' and lokasi_kelurahan='$getTtlKelurahan2' ");
$getTtlKelurahan4=mysql_fetch_array($getTtlKelurahan3);
$getTtlKelurahan5=ucfirst(strtolower($getTtlKelurahan4[0]));



//jenis_kelamin
$getJkel = $query2['jenis_kelamin'];
$getJkel2=mysql_query("select jenis_kelamin from jenis_kelamin where id='$getJkel'");
$getJkel3=mysql_fetch_array($getJkel2);

//agama
$getAgama=$query2['agama'];
$getAgama2=mysql_query("select agama from agama where id='$getAgama'");
$getAgama3=mysql_fetch_array($getAgama2);

//status_pernikahan
$getStatus = $query2['status_pernikahan'];
$getStatus2=mysql_query("select status_pernikahan from status_pernikahan where id='$getStatus'");
$getStatus3=mysql_fetch_array($getStatus2);


?>
	<h2 align="center" class="l1">DAFTAR RIWAYAT PILIHAN</h2><br><br><br>
	<!-- <hr class="l2"> -->
	<h3>I. DATA DIRI</h3>
	<?php
	  //DEFAULT FOTO JIKA KOSONG//
	    if($query2['foto']=="../assets/images/" || $query2['foto']=="")
	      $foto = "../assets/images/an.jpg";
	    else
	      $foto = $query2['foto'];
	  ?>
	<img src="<?php echo $foto ?>" style="max-width: 150px;">
	<table border="1" style="margin-top: -225px;">
		<tr>
			<td width="130">Nama Lengkap</td>
			<td><?php echo $query2['gelar_depan'];?> <?php echo $query2['nama'];?>, <?php echo $query2['gelar_belakang']; ?></td>
		</tr>
		<tr>
			<td>Tempat / Tanggal Lahir</td>
			<td><?php echo $getTtlKota4 ?>, <?php echo date("d M Y", strtotime($query2['tanggal_lahir'])) ?></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td><?php echo $getJkel3[0] ?></td>
		</tr>
		<tr>
			<td>Agama</td>
			<td><?php echo $getAgama3[0] ?></td>
		</tr>
		<tr>
			<td>Status</td>
			<td><?php echo $getStatus3[0] ?></td>
		</tr>
		<tr>
			<td>Alamat Rumah</td>
			<td><?php echo $query2['alamat'] ?> - Rt <?php echo $query2['rt']; ?> Rw <?php echo $query2['rw']; ?> - <?php echo $getTtlKelurahan5 ?> - <?php echo $getTtlKecamatan4 ?> - <?php echo $getTtlKota4 ?> - <?php echo $getTtl_propinsi3[0] ?></td>
		</tr>
		<tr>
			<td>Kode Pos</td>
			<td><?php echo $query2['kode_pos'] ?></td>
		</tr>
		<tr>
			<td>Telepon</td>
			<td>- <?php echo $query2['telepon'] ?><br>- <?php echo $query2['hp1'] ?><br>- <?php echo $query2['hp2'] ?></td>
		</tr>
	</table>
	<?php if($riwayat==1){ ?>
	<h3 class="l2">RIWAYAT PENDIDIKAN</h3>
	<table border="1" align="center">
		<thead>
			<tr>
				<th width="50" align="center"><strong>Tingkat</strong></th>
				<th width="50" align="center"><strong>Nama Instansi</strong></th>
				<th width="50" align="center"><strong>Jurusan</strong></th>
				<th width="50" align="center"><strong>No. Ijazah</strong></th>
				<th width="50" align="center"><strong>Alamat</strong></th>
				<th width="50" align="center"><strong>Nama Kepala</strong></th>
			</tr>
		</thead>
		<?php
			//RIWAYAT PENDIDIKAN
			$id=$_GET['id'];
			$getRwtPdd=mysql_query("select * from rwt_pendidikan where id_peg='$id_peg' order by tingkat desc");
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
	<?php }else if($riwayat==2){ ?>
	<h3 class="l2">RIWAYAT JABATAN</h3>
	<table border="1" align="center">
		<thead>
			<tr>
				<th width="50" align="center" ><strong>Jabatan</strong></th>
				<th width="50" align="center"><strong>Pejabat</strong></th>
				<th width="50" align="center"><strong>Nomor SK</strong></th>
				<th width="50" align="center"><strong>Tanggal SK</strong></th>
			</tr>
		</thead>
		<?php
		$id=$_GET['id'];
		$getRwtPkj=mysql_query("select * from rwt_jabatan where id_peg = '$id_peg'");
		while($getRwtPkj2=mysql_fetch_array($getRwtPkj)){

		$getJabatan=$getRwtPkj2['jabatan'];	
		$getJabatan2=mysql_query("select jenis_jabatan from jenis_jabatan where id='$getJabatan' ")	;
		$getJabatan3=mysql_fetch_array($getJabatan2);
		?>
		<tr>
			<td align="center"><?php echo $getJabatan3[0]  ?></td>
			<td align="center"><?php echo $getRwtPkj2['pejabat'] ?></td>
			<td align="center"><?php echo $getRwtPkj2['nosk'] ?></td>
			<td align="center"><?php echo date("d M Y", strtotime($getRwtPkj2['tglsk'])) ?></td>
		</tr>
		<?php } ?>
	</table>
	<?php } else if($riwayat==6){ ?>
	<h3 class="l2">RIWAYAT PELATIHAN</h3>
	<table border="1" align="center">
		<thead>
			<tr>
				<th width="50" align="center" ><strong>Pelatihan</strong></th>
				<th width="50" align="center"><strong>Lokasi</strong></th>
				<th width="50" align="center"><strong>Tanggal Sertifikat</strong></th>
			</tr>
		</thead>
		<?php
		$id=$_GET['id'];
		$getRwtpelatihan=mysql_query("select * from rwt_pelatihan where id_peg = '$id_peg'");
		while($getRwtpelatihan2=mysql_fetch_array($getRwtpelatihan)){
		?>
		<tr>
			<td align="center"><?php echo $getRwtpelatihan2['nama_pelatihan']  ?></td>
			<td align="center"><?php echo $getRwtpelatihan2['lokasi'] ?></td>
			<td align="center"><?php echo date("d M Y", strtotime($getRwtpelatihan2['tanggal_sertifikat'])) ?></td>
		</tr>
		<?php } ?>
	</table>
	<?php }else if($riwayat==8){ ?>
	<h3 class="l2">RIWAYAT SEMINAR</h3>
	<table border="1" align="center">
		<thead>
			<tr>
				<th width="50" align="center" ><strong>Uraian</strong></th>
				<th width="50" align="center"><strong>Lokasi</strong></th>
				<th width="50" align="center"><strong>Tanggal</strong></th>
			</tr>
		</thead>
		<?php
		$id=$_GET['id'];
		$getRwtseminar=mysql_query("select * from rwt_seminar where id_peg = '$id_peg'");
		while($getRwtseminar2=mysql_fetch_array($getRwtseminar)){
		?>
		<tr>
			<td align="center"><?php echo $getRwtseminar2['uraian']  ?></td>
			<td align="center"><?php echo $getRwtseminar2['lokasi'] ?></td>
			<td align="center"><?php echo date("d M Y", strtotime($getRwtseminar2['tanggal'])) ?></td>
		</tr>
		<?php } ?>
	</table>
	<?php }else if($riwayat==5){ ?>
	<h3 class="l2">RIWAYAT ORGANISASI</h3>
	<table border="1" align="center">
		<thead>
			<tr>
				<th width="50" align="center" ><strong>Uraian</strong></th>
				<th width="50" align="center"><strong>Lokasi</strong></th>
				<th width="50" align="center"><strong>Tanggal</strong></th>
			</tr>
		</thead>
		<?php
		$id=$_GET['id'];
		$getRwtorganisasi=mysql_query("select * from rwt_organisasi where id_peg = '$id_peg'");
		while($getRwtorganisasi2=mysql_fetch_array($getRwtorganisasi)){
		?>
		<tr>
			<td align="center"><?php echo $getRwtorganisasi2['uraian']  ?></td>
			<td align="center"><?php echo $getRwtorganisasi2['lokasi'] ?></td>
			<td align="center"><?php echo date("d M Y", strtotime($getRwtorganisasi2['tanggal'])) ?></td>
		</tr>
		<?php } ?>
	</table>
	<?php }else if($riwayat==9){ ?>
	<h3 class="l2">RIWAYAT DP 3 / PENILAIAN KERJA</h3>
	<table border="1" align="center">
		<thead>
			<tr>
				<th width="50" align="center" ><strong>Tahun</strong></th>
				<th width="50" align="center"><strong>Rata - Rata</strong></th>
				<th width="50" align="center"><strong>Atasan</strong></th>
				<th width="50" align="center"><strong>Penilai</strong></th>
			</tr>
		</thead>
		<?php
		$id=$_GET['id'];
		$getRwtdp3=mysql_query("select * from rwt_dp3 where id_peg = '$id_peg'");
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
	<?php }else if($riwayat==3){ ?>
	<h3 class="l2">RIWAYAT GAJI POKOK</h3>
	<table border="1" align="center">
		<thead>
			<tr>
				<th width="50" align="center" ><strong>Golongan</strong></th>
				<th width="50" align="center"><strong>Gaji Pokok</strong></th>
			</tr>
		</thead>
		<?php
		$id=$_GET['id'];
		$getRwtgapok=mysql_query("select * from rwt_gajipokok where id_peg = '$id_peg'");
		while($getRwtgapok2=mysql_fetch_array($getRwtgapok)){
		$getGol=$getRwtgapok2['golongan'];
		$getGol2=mysql_query("select pangkat from gol_ruang where id='$getGol' ");
		$getGol3=mysql_fetch_array($getGol2);
		?>
		<tr>
			<td align="center"><?php echo $getGol3[0]  ?></td>
			<td align="center">Rp <?php echo $getRwtgapok2['gaji_pokok'] ?></td>
		</tr>
		<?php } ?>
	</table>
	<?php }else if($riwayat==7){ ?>
	<h3 class="l2">RIWAYAT PENGHARGAAN</h3>
	<table border="1" align="center">
		<thead>
			<tr>
				<th width="50" align="center"><strong>Nama Penghargaan</strong></th>
				<th width="50" align="center"><strong>No SK</strong></th>
				<th width="50" align="center"><strong>Tanggal SK</strong></th>
			</tr>
		</thead>
		<?php
		$id=$_GET['id'];
		$getRwtpenghargaan=mysql_query("select * from rwt_penghargaan where id_peg = '$id_peg'");
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
		<?php }else if($riwayat==4){ ?>
	<h3 class="l2">RIWAYAT HUKUMAN</h3>
	<table border="1" align="center">
		<thead>
			<tr>
				<th width="50" align="center"><strong>Nama Hukuman</strong></th>
				<th width="50" align="center"><strong>Tanggal</strong></th>
			</tr>
		</thead>
		<?php
		$id=$_GET['id'];
		$getRwthukuman=mysql_query("select * from rwt_hukuman where id_peg = '$id_peg'");
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
	<?php } ?>