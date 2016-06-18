<?php

	include ("../koneksi/koneksi.php");

		if($_POST['Simpan']){
			$id1	=	$_POST['getid'];
			$id2	=	$_POST['getid'];

			$username	=	$_POST['username'];
			$nama	    =	$_POST['nama'];
			$password	=	$_POST['password'];

			mysql_query("INSERT INTO login VALUES ('','$username', md5('$password'),'$nama','','','','')");
			header("location:../menu/user-management.php");
}

else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

	$username	=	$_POST['username'];
	$nama	    =	$_POST['nama'];
	$password	=	$_POST['password'];

	$pegawai = mysql_query("SELECT id_peg from rwt_pendidikan where id='$id'");
	$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("UPDATE login SET username='$username', nama='$nama',password=md5('$password') WHERE id='$id'");

	header("location:../menu/user-management.php");
}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from rwt_pendidikan where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from login WHERE id='$id'");

	header("location:../menu/user-management.php");
}
}

?>
