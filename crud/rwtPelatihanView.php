<?php

	include ("../koneksi/koneksi.php");



		if($_POST['Simpan']){
			$id1	=	$_POST['getid'];
			$id2	=	$_POST['getid'];

			$nama_pelatihan		=	$_POST['nama_pelatihan'];
			$lokasi				=	$_POST['lokasi'];
			$tanggal_sertifikat	=	$_POST['tanggal_sertifikat'];

			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/pelatihan/$namafile";
			$tujuan="../assets/doc/pelatihan/$tanggal_file-$id1-$namafile";
			copy($tmp_name,$tujuan);

			if ($namafile=="") {
			$input = mysql_query("INSERT INTO rwt_pelatihan VALUES ('','$id1', '$nama_pelatihan','$lokasi','$tanggal_sertifikat', '$tujuan0')");
			}
			else {
			$input = mysql_query("INSERT INTO rwt_pelatihan VALUES ('','$id1', '$nama_pelatihan','$lokasi','$tanggal_sertifikat', '$tujuan')");
			}

			$datainput = mysql_query($input);
			header("location:../menu/riwayat-pelatihan-view.php?id=$id2");
}





else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

	$nama_pelatihan		=	$_POST['nama_pelatihan'];
	$lokasi		    	=	$_POST['lokasi'];
	$tanggal_sertifikat	=	$_POST['tanggal_sertifikat'];

	// document
			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/pelatihan/$namafile";
			$tujuan="../assets/doc/pelatihan/$tanggal_file-$id-$namafile";
			copy($tmp_name,$tujuan);
	//--------------------------------------

	$pegawai = mysql_query("SELECT id_peg from rwt_pelatihan where id='$id'");
	$pegawai2 = mysql_fetch_array($pegawai);

	if($namafile==""){
	$edit = mysql_query ("UPDATE rwt_pelatihan SET nama_pelatihan='$nama_pelatihan', lokasi='$lokasi',tanggal_sertifikat='$tanggal_sertifikat', doc='$tujuan0' WHERE id='$id'");
	}
	else{
	$edit = mysql_query ("UPDATE rwt_pelatihan SET nama_pelatihan='$nama_pelatihan', lokasi='$lokasi',tanggal_sertifikat='$tanggal_sertifikat', doc='$tujuan' WHERE id='$id'");
	}

	$dataedit=mysql_query($edit);
	header("location:../menu/riwayat-pelatihan-view.php?id=$pegawai2[0]");
}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from rwt_pelatihan where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from rwt_pelatihan WHERE id='$id'");

	header("location:../menu/riwayat-pelatihan-view.php?id=$pegawai2[0]");
}
}

?>
