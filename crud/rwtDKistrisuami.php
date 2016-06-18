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
			$tgl_nikah  =	$_POST['tgl_nikah'];
			$pekerjaan  =	$_POST['pekerjaan'];
			$tunjangan	=	$_POST['tunjangan'];



			mysql_query("INSERT INTO dk_istrisuami VALUES ('','$id1', '$status','$nama','$ttl_prov','$ttl_kota','$tgl_lahir','$pendidikan',
																											'$tgl_nikah','$pekerjaan','$tunjangan')");

																	header("location:../menu/data-keluarga-istrisuami.php?id=$id2");
		}

else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$haha = mysql_query("SELECT id_peg from dk_istrisuami where id='$id'");
		$haha2 = mysql_fetch_array($haha);

		$id2	=	$id;

		$status			=	$_POST['status'];
		$nama	    	=	$_POST['nama'];
		$ttl_prov		=	$_POST['ttl_prov'];
		$ttl_kota		=	$_POST['ttl_kota'];
		$tgl_lahir  =	$_POST['tgl_lahir'];
		$pendidikan	=	$_POST['pendidikan'];
		$tgl_nikah  =	$_POST['tgl_nikah'];
		$pekerjaan  =	$_POST['pekerjaan'];
		$tunjangan	=	$_POST['tunjangan'];


	mysql_query ("UPDATE dk_istrisuami SET status='$status', nama='$nama',ttl_prov='$ttl_prov',
		ttl_kota='$ttl_kota', tgl_lahir='$tgl_lahir', pendidikan='$pendidikan',	tgl_nikah='$tgl_nikah',pekerjaan='$pekerjaan',tunjangan='$tunjangan' WHERE id='$id'");

	header("location:../menu/data-keluarga-istrisuami.php?id=$haha2[0]");
}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from dk_istrisuami where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from dk_istrisuami WHERE id='$id'");

header("location:../menu/data-keluarga-istrisuami.php?id=$pegawai2[0]");
}
}

?>
