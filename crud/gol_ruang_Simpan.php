<?php

	include ("../koneksi/koneksi.php");


	if($_POST['Simpan']){
	$gol_ruang	=	$_POST['gol_ruang'];
	$pangkat	=	$_POST['pangkat'];
	$status		=	$_POST['status'];

	mysql_query("INSERT INTO gol_ruang (id, gol_ruang, pangkat, status) VALUES(NULL, '$gol_ruang', '$pangkat', 1)");

	header('location:../menu/refjab-gol-ruang.php');
	}

	//untuk edit dan delete
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
		} else {
			die ("Error. No ID Selected! ");
		}

	if($_POST['Edit'])
	{
		$gol_ruang	=	$_POST['gol_ruang'];
		$pangkat	=	$_POST['pangkat'];

		$query  = "UPDATE gol_ruang SET gol_ruang='$gol_ruang', pangkat='$pangkat' WHERE id='$id'";
		$sql 	= mysql_query ($query);

		header('location:../menu/refjab-gol-ruang.php');
		} else{

		mysql_query ("delete from gol_ruang WHERE id='$id'");

		header('location:../menu/refjab-gol-ruang.php');
		}


?>
