<?php

	include ("../koneksi/koneksi.php");



		if($_POST['Simpan']){
			$id1	=	$_POST['getid'];
			$id2	=	$_POST['getid'];

			$status			=	$_POST['status'];
			$nama	    	=	$_POST['nama'];
			$ttl_prov		=	$_POST['ttl_prov'];
			$ttl_kota		=	$_POST['ttl_kota'];
			$tgl_lahir  =	$_POST['tgl_lahir'];
			$pendidikan	=	$_POST['pendidikan'];
			$pekerjaan  =	$_POST['pekerjaan'];
			$ket		=	$_POST['ket'];




			mysql_query("INSERT INTO dk_anak VALUES ('','$id1', '$status','$nama','$ttl_prov','$ttl_kota','$tgl_lahir','$pendidikan',
																											'$pekerjaan', '$ket')");

																	header("location:../menu/data-keluarga-anak.php?id=$id2");
		}

else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$id2 = $id;


		$cek			=	$_POST['id'];
		$status			=	$_POST['status'];
		$nama	    	=	$_POST['nama'];
		$ttl_prov		=	$_POST['ttl_prov'];
		$ttl_kota		=	$_POST['ttl_kota'];
		$tgl_lahir  =	$_POST['tgl_lahir'];
		$pendidikan	=	$_POST['pendidikan'];
		$tgl_nikah  =	$_POST['tgl_nikah'];
		$pekerjaan  =	$_POST['pekerjaan'];
		$pendidikan =	$_POST['pendidikan'];
		$ket		=	$_POST['ket'];


	mysql_query ("UPDATE dk_anak SET status='$status', nama='$nama',ttl_prov='$ttl_prov',
		ttl_kota='$ttl_kota', tgl_lahir='$tgl_lahir', pendidikan='$pendidikan',	pekerjaan='$pekerjaan', ket='$ket' WHERE id='$cek'");

	header("location:../menu/data-keluarga-anak.php?id=$id2");
		}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from dk_anak where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from dk_anak WHERE id='$id'");

header("location:../menu/data-keluarga-anak.php?id=$pegawai2[0]");
}
}

?>
