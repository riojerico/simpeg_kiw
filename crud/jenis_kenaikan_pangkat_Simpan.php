<?php

	include ("../koneksi/koneksi.php");

	if($_POST['Simpan']){
		$kode			=	$_POST['kode'];
		$jenis_kenaikan	=	$_POST['jenis_kenaikan'];
		$status			=	$_POST['status'];

		mysql_query("INSERT INTO jenis_kenaikan_pangkat (id, kode, jenis_kenaikan, status) VALUES(NULL, '$kode', '$jenis_kenaikan', 1)");

		header('location:../menu/refjab-jenis-kenaikan-pangkat.php');
	}
	else if($_POST['Edit'])
	{
		if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$kode			=	$_POST['kode'];
		$jenis_kenaikan	=	$_POST['jenis_kenaikan'];

		$query  = "UPDATE jenis_kenaikan_pangkat SET kode='$kode', jenis_kenaikan='$jenis_kenaikan' WHERE id='$id'";
		$sql 	= mysql_query ($query);


		header('location:../menu/refjab-jenis-kenaikan-pangkat.php');
		}
		else {
		die ("Error. No ID Selected! ");
	}
	}else{
		if (isset($_GET['id'])) {
		$id = $_GET['id'];

		mysql_query ("delete from jenis_kenaikan_pangkat WHERE id='$id'");

		header('location:../menu/refjab-jenis-kenaikan-pangkat.php');
		}
		else {
		die ("Error. No ID Selected! ");
	}
	}
?>
