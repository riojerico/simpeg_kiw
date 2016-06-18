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




			mysql_query("INSERT INTO dk_orangtua VALUES ('','$id1', '$status','$nama','$ttl_prov','$ttl_kota','$tgl_lahir','$pendidikan',
																											'$pekerjaan')");

																	header("location:../menu/data-keluarga-orangtua.php?id=$id2");
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


	mysql_query ("UPDATE dk_orangtua SET status='$status', nama='$nama',ttl_prov='$ttl_prov',
		ttl_kota='$ttl_kota', tgl_lahir='$tgl_lahir', pendidikan='$pendidikan',	pekerjaan='$pekerjaan' WHERE id='$cek'");

	header("location:../menu/data-keluarga-orangtua.php?id=$id2");
}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from dk_orangtua where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from dk_orangtua WHERE id='$id'");

header("location:../menu/data-keluarga-orangtua.php?id=$pegawai2[0]");
}
}

?>
