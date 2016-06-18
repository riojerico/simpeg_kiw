<?php

	include ("../koneksi/koneksi.php");

	if($_POST['Simpan']){
		$bentuk_wajah	=	$_POST['bentuk_wajah'];

		mysql_query("INSERT INTO bentuk_wajah (id, bentuk_wajah, status) VALUES(NULL, '$bentuk_wajah', 1)");

		header("location:../menu/dataumum-bentuk-wajah.php");
	}


//untuk edit dan delete
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		die ("Error. No ID Selected! ");
	}


 if($_POST['Edit'])
	{
		$bentuk_wajah	=	$_POST['bentuk_wajah'];

		mysql_query ("UPDATE bentuk_wajah SET bentuk_wajah='$bentuk_wajah' WHERE id='$id'");

		header("location:../menu/dataumum-bentuk-wajah.php");
	}	else{

		$bentuk_wajah	=	$_POST['bentuk_wajah'];

		mysql_query ("delete from bentuk_wajah WHERE id='$id'");

		header("location:../menu/dataumum-bentuk-wajah.php");
	}
?>
