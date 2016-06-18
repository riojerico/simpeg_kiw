<?php

	include ("../koneksi/koneksi.php");



		if($_POST['Simpan']){
			$id1	=	$_POST['id_peg'];
			$id2	=	$id1;

			$jenis_kenaikan	=	$_POST['jenis_kenaikan'];
			$pangkat_gol    =	$_POST['pangkat_gol'];
			$nosk       	=	$_POST['nosk'];
			$tglsk    	    =	$_POST['tglsk'];
			$pejabat	    = 	$_POST['pejabat'];
			$tmt	        =	$_POST['tmt'];
			$dasarkep       =	$_POST['dasarkep'];


			mysql_query("INSERT INTO rwt_kepangkatan VALUES ('','$jenis_kenaikan', '$pangkat_gol','$nosk','$tglsk','$pejabat','$tmt', '$dasarkep','$id1')");

			header("location:../menu/riwayat-kepangkatan-view.php?id=$id2");
}





else if($_POST['Edit'])
{
	if (isset($_GET['id'])) {
		$id1	=	$_POST['acuan'];
		$id2	=	$_GET['id'];

		$jenis_kenaikan	=	$_POST['jenis_kenaikan'];
		$pangkat_gol    =	$_POST['pangkat_gol'];
		$nosk       	=	$_POST['nosk'];
		$tglsk    	    =	$_POST['tglsk'];
		$pejabat	    = 	$_POST['pejabat'];
		$tmt	        =	$_POST['tmt'];
		$dasarkep       =	$_POST['dasarkep'];

		echo $id1;
	mysql_query ("UPDATE rwt_kepangkatan SET jenis_kenaikan='$jenis_kenaikan', pangkat_gol='$pangkat_gol',nosk='$nosk',
		 tglsk='$tglsk', pejabat='$pejabat',	tmt='$tmt',dasarkep='$dasarkep' WHERE id='$id2'");

	header("location:../menu/riwayat-kepangkatan-view.php?id=$id1");

}
	else{

	}
}	else{
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$pegawai = mysql_query("SELECT id_peg from rwt_kepangkatan where id='$id'");
		$pegawai2 = mysql_fetch_array($pegawai);

	mysql_query ("delete from rwt_kepangkatan WHERE id='$id'");


	header("location:../menu/riwayat-kepangkatan-view.php?id=$pegawai2[0]");
}
}

?>
