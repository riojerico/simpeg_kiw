<?php

	include ("../koneksi/koneksi.php");

	if($_POST['Simpan']){
	$kode			=	$_POST['kode'];
	$satuan_kerja	=	$_POST['satuan_kerja'];
	$status			=	$_POST['status'];

	mysql_query("INSERT INTO instansi (id, kode, satuan_kerja, status) VALUES(NULL, '$kode', '$satuan_kerja', 1)");

	header('location:../menu/datainstansi-instansi.php');
	}

//edit dan delete
if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	die ("Error. No ID Selected! ");
}

	if($_POST['Edit'])
	{
		$kode			=	$_POST['kode'];
		$satuan_kerja	=	$_POST['satuan_kerja'];

		$query  = "UPDATE instansi SET kode='$kode', satuan_kerja='$satuan_kerja' WHERE id='$id'";
		$sql 	= mysql_query ($query);

		header('location:../menu/datainstansi-instansi.php');

	}else{

		mysql_query ("delete from instansi WHERE id='$id'");

		header('location:../menu/datainstansi-instansi.php');
		}

?>
