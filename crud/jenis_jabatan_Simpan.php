<?php

	include ("../koneksi/koneksi.php");

	if($_POST['Simpan']){
		$kode			=	$_POST['kode'];
		$jenis_jabatan	=	$_POST['jenis_jabatan'];
		
		$nomor=mysql_fetch_array(mysql_query("SELECT id from jenis_jabatan order by id desc limit 1"));
		$nomor2=$nomor[0]+1;

		mysql_query("INSERT INTO jenis_jabatan (id, kode, jenis_jabatan, status) VALUES(NULL, '$kode-$nomor2', '$jenis_jabatan', 1)");

		header('location:../menu/refjab-jenis-jabatan.php');
	}
	else if($_POST['Edit'])
	{
		if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$kode			=	$_POST['kode'];
		$jenis_jabatan	=	$_POST['jenis_jabatan'];

		$query  = "UPDATE jenis_jabatan SET kode='$kode', jenis_jabatan='$jenis_jabatan' WHERE id='$id'";
		$sql 	= mysql_query ($query);

		header('location:../menu/refjab-jenis-jabatan.php');
		}
		else {
		die ("Error. No ID Selected! ");
	}
	}else{
		if (isset($_GET['id'])) {
		$id = $_GET['id'];

		mysql_query ("delete from jenis_jabatan WHERE id='$id'");

		header('location:../menu/refjab-jenis-jabatan.php');
		}
		else {
		die ("Error. No ID Selected! ");
	}
	}
?>
