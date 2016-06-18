<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include "koneksi.php";

if(empty($_SESSION["username"]) )
	{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../login/eror-2.php">';
	die();
	}

?>
