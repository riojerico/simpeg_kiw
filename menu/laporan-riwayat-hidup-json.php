<?php

include "../koneksi/koneksi.php";

$query=mysql_query("select nip, nama from data_pegawai");
$i=0;
while($row=mysql_fetch_array($query)){

	 $data[$i] = $row['nama'];
	 $data2[$i] = $row['nip'];


	 echo json_encode($data2[$i]);
	 echo json_encode($data[$i]);
	 echo "<br>";
	  $i++;
}

?>