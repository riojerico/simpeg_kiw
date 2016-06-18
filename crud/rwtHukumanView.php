<?php

	include ("../koneksi/koneksi.php");



		if($_POST['Simpan']){
			$id1	=	$_POST['getid'];
			$id2	=	$_POST['getid'];

			$nama_hukuman		=	$_POST['nama_hukuman'];
			$tgl_hukuman		=	$_POST['tgl'];

			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/hukuman/$namafile";
			$tujuan="../assets/doc/hukuman/$tanggal_file-$id1-$namafile";
			copy($tmp_name,$tujuan);

			if ($namafile=="") {
			mysql_query("INSERT INTO rwt_hukuman VALUES ('','$id1', '$nama_hukuman','$tgl_hukuman', '$tujuan0')");
			}
			else {
			mysql_query("INSERT INTO rwt_hukuman VALUES ('','$id1', '$nama_hukuman','$tgl_hukuman', '$tujuan')");
			}
			header("location:../menu/riwayat-hukuman-view.php?id=$id2");
}





else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

	$nama_hukuman		=	$_POST['nama_hukuman'];
	$tgl_hukuman		=	$_POST['tgl'];

	// document
			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/hukuman/$namafile";
			$tujuan="../assets/doc/hukuman/$tanggal_file-$id-$namafile";
			copy($tmp_name,$tujuan);
	//--------------------------------------

	$pegawai = mysql_query("SELECT id_peg from rwt_hukuman where id='$id'");
	$pegawai2 = mysql_fetch_array($pegawai);

	if ($namafile=="") {
	mysql_query ("UPDATE rwt_hukuman SET nama_hukuman='$nama_hukuman', tanggal='$tgl_hukuman', doc='$tujuan0' WHERE id='$id'");
	}
	else {
	mysql_query ("UPDATE rwt_hukuman SET nama_hukuman='$nama_hukuman', tanggal='$tgl_hukuman', doc='$tujuan' WHERE id='$id'");
	}
	header("location:../menu/riwayat-hukuman-view.php?id=$pegawai2[0]");
}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from rwt_hukuman where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from rwt_hukuman WHERE id='$id'");

	header("location:../menu/riwayat-hukuman-view.php?id=$pegawai2[0]");
}
}

?>
