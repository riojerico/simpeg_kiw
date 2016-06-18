<?php

	include ("../koneksi/koneksi.php");



		if($_POST['Simpan']){
			$id1	=	$_POST['getid'];
			$id2	=	$_POST['getid'];

			$uraian		=	$_POST['uraian'];
			$lokasi		=	$_POST['lokasi'];
			$tanggal	=	$_POST['tanggal'];

			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/organisasi/$namafile";
			$tujuan="../assets/doc/organisasi/$tanggal_file-$id1-$namafile";
			copy($tmp_name,$tujuan);

			if ($namafile=="") {
			mysql_query("INSERT INTO rwt_organisasi VALUES ('','$id1', '$uraian','$lokasi','$tanggal', '$tujuan0')");
			}
			else {
			mysql_query("INSERT INTO rwt_organisasi VALUES ('','$id1', '$uraian','$lokasi','$tanggal', '$tujuan')");
			}
			header("location:../menu/riwayat-organisasi-view.php?id=$id2");
}





else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

	$uraian		=	$_POST['uraian'];
	$lokasi    	=	$_POST['lokasi'];
	$tanggal	=	$_POST['tanggal'];

	// document
			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/organisasi/$namafile";
			$tujuan="../assets/doc/organisasi/$tanggal_file-$id-$namafile";
			copy($tmp_name,$tujuan);
	//--------------------------------------

	$pegawai = mysql_query("SELECT id_peg from rwt_organisasi where id='$id'");
	$pegawai2 = mysql_fetch_array($pegawai);

	if ($namafile=="") {
	mysql_query ("UPDATE rwt_organisasi SET uraian='$uraian', lokasi='$lokasi',tanggal='$tanggal', doc='$tujuan0' WHERE id='$id'");
	}
	else{
	mysql_query ("UPDATE rwt_organisasi SET uraian='$uraian', lokasi='$lokasi',tanggal='$tanggal', doc='$tujuan' WHERE id='$id'");
	}
	header("location:../menu/riwayat-organisasi-view.php?id=$pegawai2[0]");
}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from rwt_organisasi where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from rwt_organisasi WHERE id='$id'");

	header("location:../menu/riwayat-organisasi-view.php?id=$pegawai2[0]");
}
}

?>
