<?php

	include ("../koneksi/koneksi.php");

	if($_POST['Simpan']){
		$kode			=	$_POST['kode'];
		$unit_kerja		=	$_POST['unit_kerja'];

		$nomor=mysql_fetch_array(mysql_query("SELECT id from unit_kerja order by id desc limit 1"));
		$nomor2=$nomor[0]+1;

		mysql_query("INSERT INTO unit_kerja (id, kode, unit_kerja, status) VALUES(NULL, '$kode-$nomor2', '$unit_kerja', 1)");

		header('location:../menu/datainstansi-unit-kerja.php');
	}
	else if($_POST['Edit'])
	{
		if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$kode			=	$_POST['kode'];
		$unit_kerja		=	$_POST['unit_kerja'];

		$query  = "UPDATE unit_kerja SET kode='$kode', unit_kerja='$unit_kerja' WHERE id='$id'";
		$sql 	= mysql_query ($query);

		header('location:../menu/datainstansi-unit-kerja.php');
		}
		else {
		die ("Error. No ID Selected! ");
	}
	}else{
		if (isset($_GET['id'])) {
		$id = $_GET['id'];

		mysql_query ("delete from unit_kerja WHERE id='$id'");

		header('location:../menu/datainstansi-unit-kerja.php');
		}
		else {
		die ("Error. No ID Selected! ");
	}
	}
?>
