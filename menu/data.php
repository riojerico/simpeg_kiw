<?php
	// require connection.php
	require('../koneksi/koneksi.php');

	$q = strtolower($_GET['term']);
	$query = "select * from data_pegawai where nip like '%$q%' or nama like '%$q%' order by id asc";
	$query = mysql_query($query);
	$num = mysql_num_rows($query);
   	if($num > 0){
		while ($row = mysql_fetch_array($query)){
			$row_set[] = htmlentities(stripslashes($row[1]));
			$row_set[] = htmlentities(stripslashes($row[3]));
		}
		echo json_encode($row_set);
	}
?>
