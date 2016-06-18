<?php

	include ("../koneksi/koneksi.php");


	if($_POST['Simpan']){
	$kode			=	$_POST['kode'];
	$penghargaan	=	$_POST['penghargaan'];
	
	$nomor=mysql_fetch_array(mysql_query("SELECT id from master_penghargaan order by id desc limit 1"));
	$nomor2=$nomor[0]+1;

	mysql_query("INSERT INTO master_penghargaan VALUES (NULL, '$kode-$nomor2', '$penghargaan', 1)");

	header('location:../menu/datainstansi-penghargaan.php');
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
		$penghargaan	=	$_POST['penghargaan'];
		$status			=	$_POST['status'];

		$query  = "UPDATE master_penghargaan SET kode='$kode', penghargaan='$penghargaan' WHERE id='$id'";
		$sql 	= mysql_query ($query);

	header('location:../menu/datainstansi-penghargaan.php');
		} else{

		mysql_query ("delete from master_penghargaan WHERE id='$id'");

	header('location:../menu/datainstansi-penghargaan.php');
		}


?>
