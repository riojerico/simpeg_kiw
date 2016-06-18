<?php

	include ("../koneksi/koneksi.php");

	if($_POST['Simpan']){
		$kode			=	$_POST['kode'];
		$jenis_diklat	=	$_POST['jenis_diklat'];
		$status			=	$_POST['status'];

		mysql_query("INSERT INTO jenis_diklat (id, kode, jenis_diklat, status) VALUES(NULL, '$kode', '$jenis_diklat', 1)");

		header('location:../menu/dataumum-jenis-diklat.php');
	}
	else if($_POST['Edit'])
	{
		if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$kode			=	$_POST['kode'];
		$jenis_diklat	=	$_POST['jenis_diklat'];

		$query  = "UPDATE jenis_diklat SET kode='$kode', jenis_diklat='$jenis_diklat' WHERE id='$id'";
		$sql 	= mysql_query ($query);
		header('location:../menu/dataumum-jenis-diklat.php');
		}
		else {
		die ("Error. No ID Selected! ");
	}
	}else{
		if (isset($_GET['id'])) {
		$id = $_GET['id'];

		mysql_query ("delete from jenis_diklat WHERE id='$id'");

		header('location:../menu/dataumum-jenis-diklat.php');
		}
		else {
		die ("Error. No ID Selected! ");
	}
	}
?>
