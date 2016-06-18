<?php

	include ("../koneksi/koneksi.php");

	if($_POST['Simpan']){
		$agama	=	$_POST['agama'];
		$status	=	$_POST['status'];

		mysql_query("INSERT INTO agama (id, agama, status) VALUES(NULL, '$agama', 1)");

		header("location:../menu/dataumum-agama.php");
	}


//untuk edit dan delete
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		die ("Error. No ID Selected! ");
	}


 if($_POST['Edit'])
	{
		$agama	=	$_POST['agama'];
		$status	=	$_POST['status'];

		mysql_query ("UPDATE agama SET agama='$agama' WHERE id='$id'");

		header("location:../menu/dataumum-agama.php");
	}	else{

		$agama	=	$_POST['agama'];
		$status	=	$_POST['status'];

		mysql_query ("delete agama from agama WHERE id='$id'");

		header("location:../menu/dataumum-agama.php");
	}
?>
