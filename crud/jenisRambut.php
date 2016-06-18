<?php

	include ("../koneksi/koneksi.php");

	if($_POST['Simpan']){
		$jenis_rambut	=	$_POST['jenis_rambut'];

		mysql_query("INSERT INTO jenis_rambut (id, jenis_rambut, status) VALUES(NULL, '$jenis_rambut', 1)");

		header("location:../menu/dataumum-jenis-rambut.php");
	}


//untuk edit dan delete
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		die ("Error. No ID Selected! ");
	}


 if($_POST['Edit'])
	{
		$jenis_rambut	=	$_POST['jenis_rambut'];

		mysql_query ("UPDATE jenis_rambut SET jenis_rambut='$jenis_rambut' WHERE id='$id'");

		header("location:../menu/dataumum-jenis-rambut.php");
	}	else{

		$jenis_rambut	=	$_POST['jenis_rambut'];

		mysql_query ("delete from jenis_rambut WHERE id='$id'");

		header("location:../menu/dataumum-jenis-rambut.php");
	}
?>
