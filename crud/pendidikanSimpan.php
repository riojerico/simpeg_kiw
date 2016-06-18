<?php

	include ("../koneksi/koneksi.php");

	if($_POST['Simpan']){
		$kode		=	$_POST['kode'];
		$pendidikan	=	$_POST['pendidikan'];
		$nomor=mysql_fetch_array(mysql_query("SELECT id from jenjang_pendidikan order by id desc limit 1"));
		$nomor2=$nomor[0]+1;
		
		mysql_query("INSERT INTO jenjang_pendidikan (id, kode, pendidikan, status) VALUES(NULL, '$kode-$nomor2','$pendidikan', 1)");


		header("location:../menu/dataumum-jenjang-pendidikan.php");
	}


//untuk edit dan delete
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		die ("Error. No ID Selected! ");
	}


 if($_POST['Edit'])
	{
		$kode	=	$_POST['kode'];
		$pendidikan	=	$_POST['pendidikan'];

		mysql_query ("UPDATE jenjang_pendidikan SET kode='$kode' ,pendidikan='$pendidikan' WHERE id='$id'");

		header("location:../menu/dataumum-jenjang-pendidikan.php");
	}	else{

		$kode	=	$_POST['kode'];
		$pendidikan	=	$_POST['pendidikan'];

		mysql_query ("delete from jenjang_pendidikan WHERE id='$id'");

		header("location:../menu/dataumum-jenjang-pendidikan.php");
	}
?>
