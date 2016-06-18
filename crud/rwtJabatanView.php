<?php

	include ("../koneksi/koneksi.php");



		if($_POST['Simpan']){
			$id1	=	$_POST['id_peg'];
			$id2	=	$id1;
			
			$unit_kerja =	$_POST['unit'];
			$jabatan	=	$_POST['jabatan'];
			$nosk    	=	$_POST['nosk'];
			$tglsk  	=	$_POST['tglsk'];
			$pejabat	=	$_POST['pejabat'];
			$gol	    =	$_POST['gol'];
			$status_peg =	$_POST['st_peg'];

			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/jabatan/$namafile";
			$tujuan="../assets/doc/jabatan/$tanggal_file-$id1-$namafile";
			copy($tmp_name,$tujuan);

			if ($namafile=="") {
			$input = mysql_query("INSERT INTO rwt_jabatan VALUES ('','$unit_kerja','$jabatan','$nosk','$tglsk','$pejabat','$gol', '$status_peg','$id1','','','','','','$tujuan0')");
			}
			else{
			$input = mysql_query("INSERT INTO rwt_jabatan VALUES ('','$unit_kerja','$jabatan','$nosk','$tglsk','$pejabat','$gol', '$status_peg','$id1','','','','','','$tujuan')");				
			}

			$datainput=mysql_query($input);
			header("location:../menu/riwayat-jabatan-view.php?id=$id2");
}





else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id1	=	$_POST['acuan'];
		$id2	=	$_GET['id'];

			$unit_kerja =	$_POST['unit'];
			$jabatan	=	$_POST['jabatan'];
			$nosk    	=	$_POST['nosk'];
			$tglsk  	=	$_POST['tglsk'];
			$pejabat	=	$_POST['pejabat'];
			$gol	    =	$_POST['gol'];
			$status_peg =	$_POST['st_peg'];

			// document
			$tanggal_file=date(ymd); 
			$doc=$_POST['doc'];
			$doc=$_FILES['doc'];
			$tmp_name=$doc['tmp_name'];
			$namafile=$doc['name'];
			$tujuan0="../assets/doc/jabatan/$namafile";
			$tujuan="../assets/doc/jabatan/$tanggal_file-$id-$namafile";
			copy($tmp_name,$tujuan);
	//--------------------------------------

	if($namafile==""){		
	$edit = mysql_query ("UPDATE rwt_jabatan SET unit_kerja='$unit_kerja', jabatan='$jabatan',
		nosk='$nosk', tglsk='$tglsk', pejabat='$pejabat',golongan='$gol',status_peg='$status_peg', doc='$tujuan0' WHERE id='$id2'");
	}
	else{		
	$edit = mysql_query ("UPDATE rwt_jabatan SET unit_kerja='$unit_kerja', jabatan='$jabatan',
		nosk='$nosk', tglsk='$tglsk', pejabat='$pejabat',golongan='$gol',status_peg='$status_peg', doc='$tujuan' WHERE id='$id2'");
	}
	$dataedit=mysql_query($edit);
	header("location:../menu/riwayat-jabatan-view.php?id=$id1");

}
	else{

	}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from rwt_jabatan where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from rwt_jabatan WHERE id='$id'");


	header("location:../menu/riwayat-jabatan-view.php?id=$pegawai2[0]");
}
}

?>
