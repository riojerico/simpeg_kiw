<?php

	include ("../koneksi/koneksi.php");



		if($_POST['Simpan']){
			$id1	=	$_POST['getid'];
			$id2	=	$_POST['getid'];

			$nama_penghargaan		=	$_POST['nama_penghargaan'];
			$nosk					=	$_POST['nosk'];
			$tanggal_sk				=	$_POST['tanggal_sk'];

			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/penghargaan/$namafile";
			$tujuan="../assets/doc/penghargaan/$tanggal_file-$id1-$namafile";
			copy($tmp_name,$tujuan);

			if ($namafile=="") {
			$input = mysql_query("INSERT INTO rwt_penghargaan VALUES ('','$id1', '$nama_penghargaan','$nosk','$tanggal_sk', '$tujuan0')");
			}
			else{
			$input = mysql_query("INSERT INTO rwt_penghargaan VALUES ('','$id1', '$nama_penghargaan','$nosk','$tanggal_sk', '$tujuan')");
			}

			$datainput=mysql_query($input);

			header("location:../menu/riwayat-penghargaan-view.php?id=$id2");
}





else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

	$nama_penghargaan		=	$_POST['nama_penghargaan'];
	$nosk			    	=	$_POST['nosk'];
	$tanggal_sk 			=	$_POST['tanggal_sk'];

	// document
			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/penghargaan/$namafile";
			$tujuan="../assets/doc/penghargaan/$tanggal_file-$id-$namafile";
			copy($tmp_name,$tujuan);
	//--------------------------------------

	$pegawai = mysql_query("SELECT id_peg from rwt_penghargaan where id='$id'");
	$pegawai2 = mysql_fetch_array($pegawai);

	if ($namafile=="") {
	$edit = mysql_query ("UPDATE rwt_penghargaan SET nama_penghargaan='$nama_penghargaan', nosk='$nosk',tanggal_sk='$tanggal_sk', doc='$tujuan0' WHERE id='$id'");
	}
	else {
	$edit = mysql_query ("UPDATE rwt_penghargaan SET nama_penghargaan='$nama_penghargaan', nosk='$nosk',tanggal_sk='$tanggal_sk', doc='$tujuan' WHERE id='$id'");
	}

	$dataedit=mysql_query($edit);
	header("location:../menu/riwayat-penghargaan-view.php?id=$pegawai2[0]");
}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from rwt_penghargaan where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from rwt_penghargaan WHERE id='$id'");

	header("location:../menu/riwayat-penghargaan-view.php?id=$pegawai2[0]");
}
}

?>
