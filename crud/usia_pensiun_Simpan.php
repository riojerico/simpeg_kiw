<?php

	include ("../koneksi/koneksi.php");

if($_POST['Edit'])
	{
		if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$usia			=	$_POST['usia'];

		$query  = "UPDATE usia_pensiun SET usia='$usia' WHERE id='$id'";
		$sql 	= mysql_query ($query);

		header('location:../menu/usia-pensiun.php');
		}
		else {
		die ("Error. No ID Selected! ");
	}
	}else{
		if (isset($_GET['id'])) {
		$id = $_GET['id'];

		mysql_query ("delete from usia_pensiun WHERE id='$id'");

		header('location:../menu/usia-pensiun.php');
		}
		else {
		die ("Error. No ID Selected! ");
	}
	}
?>
