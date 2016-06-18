<?php
include "../koneksi/koneksi.php";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan urut kepangkatan.xls");

$id=$_GET['id'];
// $query=mysql_query("select * from data_pegawai where id='$id'");
// $query2=mysql_fetch_array($query);

// //ttl_propinsi
// $getTtl_propinsi=$query2['propinsi'];
// $getTtl_propinsi2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi = '$getTtl_propinsi'");
// $getTtl_propinsi3=mysql_fetch_array($getTtl_propinsi2);

// //ttl_kota
// $getTtlPropinsi=$query2['propinsi'];
// $getTtlKota=$query2['kota'];
// $getTtlKota2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getTtlPropinsi' and lokasi_kabupatenkota='$getTtlKota' ");
// $getTtlKota3=mysql_fetch_array($getTtlKota2);
// $pattern = '/[^ ]*$/';
// preg_match($pattern, $getTtlKota3[0], $resultsKota);
// $getTtlKota4=ucfirst(strtolower($resultsKota[0]));

// //ttl_kecamatan
// $getTtlKecamatan=$query2['kecamatan'];
// $getTtlKecamatan2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getTtlPropinsi' and lokasi_kabupatenkota = '$getTtlKota' and lokasi_kecamatan = '$getTtlKecamatan' ");
// $getTtlKecamatan3=mysql_fetch_array($getTtlKecamatan2); 
// $getTtlKecamatan4=ucfirst(strtolower($getTtlKecamatan3[0]));

// //ttl_kelurahan
// $getTtlKelurahan=explode(".", $query2['kelurahan']);
// $getTtlKelurahan2=$getTtlKelurahan[3];
// $getTtlKelurahan3=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getTtlPropinsi' and lokasi_kabupatenkota = '$getTtlKota' and lokasi_kecamatan = '$getTtlKecamatan' and lokasi_kelurahan='$getTtlKelurahan2' ");
// $getTtlKelurahan4=mysql_fetch_array($getTtlKelurahan3);
// $getTtlKelurahan5=ucfirst(strtolower($getTtlKelurahan4[0]));



// //jenis_kelamin
// $getJkel = $query2['jenis_kelamin'];
// $getJkel2=mysql_query("select jenis_kelamin from jenis_kelamin where id='$getJkel'");
// $getJkel3=mysql_fetch_array($getJkel2);

// //agama
// $getAgama=$query2['agama'];
// $getAgama2=mysql_query("select agama from agama where id='$getAgama'");
// $getAgama3=mysql_fetch_array($getAgama2);

// //status_pernikahan
// $getStatus = $query2['status_pernikahan'];
// $getStatus2=mysql_query("select status_pernikahan from status_pernikahan where id='$getStatus'");
// $getStatus3=mysql_fetch_array($getStatus2);


?>
	<h2 align="center" class="l1">DAFTAR JABATAN / KEPANGKATAN</h2>
	<hr class="l2">
	<?php
	$getNmJabatan=mysql_query("select jenis_jabatan from jenis_jabatan where id='$id' ");
	$getNmJabatan2=mysql_fetch_array($getNmJabatan);
	if($id==0)
		$NmJabatan="Semua Jabatan / Kepangkatan";
	else
		$NmJabatan=$getNmJabatan2[0];	
	?>
	<h3 align="center"><?php echo $NmJabatan ?></h3>

	<table border="1" align="center">
		<thead>
			<tr>
				<th width="20" align="center"><strong>No</strong></th>
				<th width="120" align="center"><strong>Nip</strong></th>
				<th width="150" align="center"><strong>Nama</strong></th>
				<th width="120" align="center"><strong>Jabatan</strong></th>
				<th width="70" align="center"><strong>Status</strong></th>
			</tr>
		</thead>
		<?php
		if($id==0)
			$jabatan=mysql_query("select * from view_datapegawai_update where jabatan !='0' order by jabatan asc");
		else
			$jabatan=mysql_query("select * from view_datapegawai_update where jabatan='$id' ");

		while($jabatan2=mysql_fetch_array($jabatan)){
		$no++;	
		$getPegawai=$jabatan2['id_peg'];
		$getPegawai2=mysql_query("select * from data_pegawai where id='$getPegawai' ");
		$getPegawai3=mysql_fetch_array($getPegawai2);

		$getJabatan=$jabatan2['jabatan'];
		$getJabatan2=mysql_query("select jenis_jabatan from jenis_jabatan where id='$getJabatan' ");
		$getJabatan3=mysql_fetch_array($getJabatan2);

		$status=$jabatan2['status_peg'];
        $status2=mysql_fetch_array(mysql_query("select status_pegawai from master_statuspegawai where id='$status' "));

		?>
			<tr>
				<td align="center"><?php echo $no ?></td>
				<td align="center"><?php echo $getPegawai3['nip'] ?></td>
				<td align="center"><?php echo $getPegawai3['nama'] ?></td>
				<td align="center"><?php echo $getJabatan3['jenis_jabatan'] ?></td>
				<td align="center"><?php echo $status2[0] ?></td>
			</tr>
		<?php
		}
		?>	
	</table>