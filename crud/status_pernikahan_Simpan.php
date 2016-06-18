<?php

	include ("../koneksi/koneksi.php");

	if($_POST['Simpan']){
		$status_pernikahan	=	$_POST['status_pernikahan'];
		$status				=	$_POST['status'];

		mysql_query("INSERT INTO status_pernikahan (id, status_pernikahan, status) VALUES(NULL, '$status_pernikahan', 1)");

		header('location:../menu/dataumum-status-pernikahan.php');
	}

//edit dan delete

if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	die ("Error. No ID Selected! ");
}

if($_POST['Edit'])
 {
	 $id = $_GET['id'];
	 $status_pernikahan	=	$_POST['status_pernikahan'];

	 mysql_query ("UPDATE status_pernikahan SET status_pernikahan='$status_pernikahan' WHERE id='$id'");

	 header("location:../menu/dataumum-status-pernikahan.php");
 }
		else{


		mysql_query ("delete from status_pernikahan WHERE id='$id'");

		header("location:../menu/dataumum-status-pernikahan.php");
	}


?>
