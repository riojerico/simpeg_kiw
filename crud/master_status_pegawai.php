<?php

	include ("../koneksi/koneksi.php");


	if($_POST['Simpan']){
	$kode			=	$_POST['kode'];
	$status_pegawai	=	$_POST['status_pegawai'];
	
	$nomor=mysql_fetch_array(mysql_query("SELECT id from master_Statuspegawai order by id desc limit 1"));
	$nomor2=$nomor[0]+1;

	mysql_query("INSERT INTO master_Statuspegawai VALUES (NULL, '$kode-$nomor2', '$status_pegawai', 1)");

	header('location:../menu/datainstansi-status-pegawai.php');
	}

	//untuk edit dan delete
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			die ("Error. No ID Selected! ");
		}

	if($_POST['Edit'])
	{
		$kode			=	$_POST['kode'];
		$status_pegawai	=	$_POST['status_pegawai'];
		$status			=	$_POST['status'];

		$query  = "UPDATE master_Statuspegawai SET kode='$kode', status_pegawai='$status_pegawai' WHERE id='$id'";
		$sql 	= mysql_query ($query);

	header('location:../menu/datainstansi-status-pegawai.php');
		} else{

		mysql_query ("delete from master_Statuspegawai WHERE id='$id'");

	header('location:../menu/datainstansi-status-pegawai.php');
		}


?>
