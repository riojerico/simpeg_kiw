<?php

	include ("../koneksi/koneksi.php");



		if($_POST['Simpan']){
			$id1	=	$_POST['getid'];
			$id2	=	$_POST['getid'];

			$tingkat	=	$_POST['tingkat'];
			$nama	    =	$_POST['nama'];
			$fakultas	=	$_POST['fakultas'];
			$jurusan	=	$_POST['jurusan'];
			$alamat	  =	$_POST['alamat'];
			$provinsi	=	$_POST['provinsi'];
			$kota	    =	$_POST['kota'];
			$kepala	  =	$_POST['kepala'];
			$noijazah	=	$_POST['noijazah'];
			$tglijazah=	$_POST['tglijazah'];

			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/pendidikan/$namafile";
			$tujuan="../assets/doc/pendidikan/$tanggal_file-$id1-$namafile";
			copy($tmp_name,$tujuan);

			if ($namafile=="") {
				$input="INSERT INTO rwt_pendidikan VALUES ('','$id1', '$tingkat','$nama','$fakultas','$jurusan','$alamat','$provinsi',
															'$kota','$kepala','$noijazah','$tglijazah','$tujuan0')";
			}else{
				$input="INSERT INTO rwt_pendidikan VALUES ('','$id1', '$tingkat','$nama','$fakultas','$jurusan','$alamat','$provinsi',
															'$kota','$kepala','$noijazah','$tglijazah','$tujuan')";
			}

			$datainput=mysql_query($input);

			header("location:../menu/riwayat-pendidikan-view.php?id=$id2");
}





else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

	$idpegawai = $_POST['id_peg'];
	$tingkat2	=	$_POST['tingkat'];
	$nama2	    =	$_POST['nama'];
	$fakultas2	=	$_POST['fakultas'];
	$jurusan2	=	$_POST['jurusan'];
	$alamat2	  =	$_POST['alamat'];
	$provinsi2	=	$_POST['provinsi'];
	$kota2	    =	$_POST['kota'];
	$kepala2	  =	$_POST['kepala'];
	$noijazah2	=	$_POST['noijazah'];
	$tglijazah2=	$_POST['tglijazah'];

	// document
			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/pendidikan/$namafile";
			$tujuan="../assets/doc/pendidikan/$tanggal_file-$id-$namafile";
			copy($tmp_name,$tujuan);
	//--------------------------------------
	$pegawai = mysql_query("SELECT id_peg from rwt_pendidikan where id='$id'");
	$pegawai2 = mysql_fetch_array($pegawai);

	if($namafile==""){
		$edit="UPDATE rwt_pendidikan SET tingkat='$tingkat2', nama='$nama2',fakultas='$fakultas2',
		jurusan='$jurusan2',alamat='$alamat2',provinsi='$provinsi2', kota='$kota2',kepala='$kepala2',noijazah='$noijazah2',
		tglijazah='$tglijazah2',doc='$tujuan0' WHERE id='$id'";
	}else{
		$edit="UPDATE rwt_pendidikan SET tingkat='$tingkat2', nama='$nama2',fakultas='$fakultas2',
		jurusan='$jurusan2',alamat='$alamat2',provinsi='$provinsi2', kota='$kota2',kepala='$kepala2',noijazah='$noijazah2',
		tglijazah='$tglijazah2',doc='$tujuan' WHERE id='$id'";
	}

	$dataedit=mysql_query($edit);

	header("location:../menu/riwayat-pendidikan-view.php?id=$pegawai2[0]");
}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from rwt_pendidikan where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from rwt_pendidikan WHERE id='$id'");

	header("location:../menu/riwayat-pendidikan-view.php?id=$pegawai2[0]");
}
}

?>
