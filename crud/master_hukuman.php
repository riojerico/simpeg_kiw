<?php

	include ("../koneksi/koneksi.php");


	if($_POST['Simpan']){
	$kode		=	$_POST['kode'];
	$hukuman	=	$_POST['hukuman'];
	
	$nomor=mysql_fetch_array(mysql_query("SELECT id from master_hukuman order by id desc limit 1"));
	$nomor2=$nomor[0]+1;

	mysql_query("INSERT INTO master_hukuman VALUES (NULL, '$kode-$nomor2', '$hukuman', 1)");

	header('location:../menu/datainstansi-hukuman.php');
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
		$hukuman	=	$_POST['hukuman'];
		$status		=	$_POST['status'];

		$query  = "UPDATE master_hukuman SET kode='$kode', hukuman='$hukuman' WHERE id='$id'";
		$sql 	= mysql_query ($query);

	header('location:../menu/datainstansi-hukuman.php');
		} else{

		mysql_query ("delete from master_hukuman WHERE id='$id'");

	header('location:../menu/datainstansi-hukuman.php');
		}


?>
