<?php

	include ("../koneksi/koneksi.php");



		if($_POST['Simpan']){
			$id1	=	$_POST['getid'];
			$id2	=	$_POST['getid'];

			$golongan		=	$_POST['golongan'];
			$gaji_pokok		=	str_replace(",", "",$_POST['gaji_pokok']);

			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/gajipokok/$namafile";
			$tujuan="../assets/doc/gajipokok/$tanggal_file-$id1-$namafile";
			copy($tmp_name,$tujuan);

			if ($namafile=="") {
			mysql_query("INSERT INTO rwt_gajipokok VALUES ('','$id1', '$golongan','$gaji_pokok', '$tujuan0')");
			}
			else {
			mysql_query("INSERT INTO rwt_gajipokok VALUES ('','$id1', '$golongan','$gaji_pokok', '$tujuan')");
			}
			header("location:../menu/riwayat-gajipokok-view.php?id=$id2");
}





else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

	$golongan		=	$_POST['golongan'];
	$gaji_pokok    	=	$_POST['gaji_pokok'];

	// document
			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/gajipokok/$namafile";
			$tujuan="../assets/doc/gajipokok/$tanggal_file-$id-$namafile";
			copy($tmp_name,$tujuan);
	//--------------------------------------

	$pegawai = mysql_query("SELECT id_peg from rwt_gajipokok where id='$id'");
	$pegawai2 = mysql_fetch_array($pegawai);

	if ($namafile=="") {
	mysql_query ("UPDATE rwt_gajipokok SET golongan='$golongan', gaji_pokok='$gaji_pokok', doc='$tujuan0' WHERE id='$id'");
	}
	else {
	mysql_query ("UPDATE rwt_gajipokok SET golongan='$golongan', gaji_pokok='$gaji_pokok', doc='$tujuan' WHERE id='$id'");
	}
	header("location:../menu/riwayat-gajipokok-view.php?id=$pegawai2[0]");
}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from rwt_gajipokok where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from rwt_gajipokok WHERE id='$id'");

	header("location:../menu/riwayat-gajipokok-view.php?id=$pegawai2[0]");
}
}

?>
