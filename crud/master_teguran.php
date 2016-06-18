<?php

	include ("../koneksi/koneksi.php");


	if($_POST['Simpan']){
	$kode		=	$_POST['kode'];
	$teguran	=	$_POST['teguran'];
	
	$nomor=mysql_fetch_array(mysql_query("SELECT id from master_teguran order by id desc limit 1"));
	$nomor2=$nomor[0]+1;

	mysql_query("INSERT INTO master_teguran VALUES (NULL, '$kode-$nomor2', '$teguran', 1)");

	header('location:../menu/datainstansi-teguran.php');
	}

	//untuk edit dan delete
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			die ("Error. No ID Selected! ");
		}

	if($_POST['Edit'])
	{
		$kode		=	$_POST['kode'];
		$teguran	=	$_POST['teguran'];
		$status		=	$_POST['status'];

		$query  = "UPDATE master_teguran SET kode='$kode', teguran='$teguran' WHERE id='$id'";
		$sql 	= mysql_query ($query);

	header('location:../menu/datainstansi-teguran.php');
		} else{

		mysql_query ("delete from master_teguran WHERE id='$id'");

	header('location:../menu/datainstansi-teguran.php');
		}


?>
