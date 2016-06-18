<?php

	include ("../koneksi/koneksi.php");


		$nama	      =	$_POST['term'];
		$jkel	      =	$_POST['status'];
    $agama	    =	$_POST['status'];
    $usia     	=	$_POST['status'];
    $jabatan  	=	$_POST['status'];
    $pendidikan	=	$_POST['status'];
    $nikah    	=	$_POST['status'];

		mysql_query("INSERT INTO agama (id, agama, status) VALUES(NULL, '$agama', 1)");

		header("location:../menu/dataumum-agama.php");
