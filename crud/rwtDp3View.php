<?php

	include ("../koneksi/koneksi.php");



		if($_POST['Simpan']){
			$id1	=	$_POST['getid'];
			$id2	=	$_POST['getid'];

			$tahun		=	$_POST['tahun'];
			$rata2		=	$_POST['rata2'];
			$atasan		=	$_POST['atasan'];
			$penilai	=	$_POST['penilai'];

			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/penilaiankinerja/$namafile";
			$tujuan="../assets/doc/penilaiankinerja/$tanggal_file-$id1-$namafile";
			copy($tmp_name,$tujuan);

			if ($namafile=="") {
			mysql_query("INSERT INTO rwt_dp3 VALUES ('','$id1', '$tahun','$rata2','$atasan', '$penilai', '$tujuan0')");
			}
			else {
			mysql_query("INSERT INTO rwt_dp3 VALUES ('','$id1', '$tahun','$rata2','$atasan', '$penilai', '$tujuan')");
			}
			header("location:../menu/riwayat-dp3-view.php?id=$id2");
}





else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

			$tahun		=	$_POST['tahun'];
			$rata2		=	$_POST['rata2'];
			$atasan		=	$_POST['atasan'];
			$penilai	=	$_POST['penilai'];

			// document
			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/penilaiankinerja/$namafile";
			$tujuan="../assets/doc/penilaiankinerja/$tanggal_file-$id-$namafile";
			copy($tmp_name,$tujuan);
	//--------------------------------------

	$pegawai = mysql_query("SELECT id_peg from rwt_dp3 where id='$id'");
	$pegawai2 = mysql_fetch_array($pegawai);

	if ($namafile=="") {
	mysql_query ("UPDATE rwt_dp3 SET tahun='$tahun', rata2='$rata2', atasan='$atasan', penilai='$penilai', doc='$tujuan0' WHERE id='$id'");
	}
	else {
	mysql_query ("UPDATE rwt_dp3 SET tahun='$tahun', rata2='$rata2', atasan='$atasan', penilai='$penilai', doc='$tujuan' WHERE id='$id'");
	}
	header("location:../menu/riwayat-dp3-view.php?id=$pegawai2[0]");
}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from rwt_dp3 where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from rwt_dp3 WHERE id='$id'");

	header("location:../menu/riwayat-dp3-view.php?id=$pegawai2[0]");
}
}

?>
