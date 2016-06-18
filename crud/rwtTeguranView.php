<?php

	include ("../koneksi/koneksi.php");



		if($_POST['Simpan']){
			$id1	=	$_POST['getid'];
			$id2	=	$_POST['getid'];

			$nama_teguran		=	$_POST['nama_teguran'];
			$tgl_teguran		=	$_POST['tgl'];
			$no_surat			=	$_POST['no_surat'];
			$alasan				=	$_POST['alasan'];

			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/teguran/$namafile";
			$tujuan="../assets/doc/teguran/$tanggal_file-$id1-$namafile";
			copy($tmp_name,$tujuan);

			if ($namafile=="") {
			mysql_query("INSERT INTO rwt_teguran VALUES ('','$id1', '$nama_teguran','$no_surat','$alasan','$tgl_teguran', '$tujuan0')");
			}
			else {
			mysql_query("INSERT INTO rwt_teguran VALUES ('','$id1', '$nama_teguran','$tgl_teguran', '$tujuan')");
			}
			header("location:../menu/riwayat-teguran-view.php?id=$id2");
}





else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

	$nama_teguran		=	$_POST['nama_teguran'];
	$tgl_teguran		=	$_POST['tgl'];
	$no_surat			=	$_POST['no_surat'];
	$alasan				=	$_POST['alasan'];

	// document
			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/teguran/$namafile";
			$tujuan="../assets/doc/teguran/$tanggal_file-$id-$namafile";
			copy($tmp_name,$tujuan);
	//--------------------------------------

	$pegawai = mysql_query("SELECT id_peg from rwt_teguran where id='$id'");
	$pegawai2 = mysql_fetch_array($pegawai);

	if ($namafile=="") {
	mysql_query ("UPDATE rwt_teguran SET nama_teguran='$nama_teguran', tanggal='$tgl_teguran', doc='$tujuan0', no_surat='$no_surat', alasan='$alasan' WHERE id='$id'");
	}
	else {
	mysql_query ("UPDATE rwt_teguran SET nama_teguran='$nama_teguran', tanggal='$tgl_teguran', doc='$tujuan' WHERE id='$id'");
	}
	header("location:../menu/riwayat-teguran-view.php?id=$pegawai2[0]");
}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from rwt_teguran where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from rwt_teguran WHERE id='$id'");

	header("location:../menu/riwayat-teguran-view.php?id=$pegawai2[0]");
}
}

?>
