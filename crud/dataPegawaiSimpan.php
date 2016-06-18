<?php

	include ("../koneksi/koneksi.php");

		$nip			=	trim($_POST['nip']);
		$nip_lama		=	trim($_POST['nip_lama']);
		$nama			=	trim($_POST['nama']);
		$gelar_depan	=	trim($_POST['gelar_depan']);
		$gelar_belakang	=	trim($_POST['gelar_belakang']);
		$ttl_propinsi	=	$_POST['ttl_propinsi'];
		$ttl_kota		=	$_POST['ttl_kota'];
		$ttl_tempat		=	trim($_POST['ttl_tempat']);
		$tanggal_lahir	=	$_POST['tanggal_lahir'];
		$jenis_kelamin	=	$_POST['jenis_kelamin'];
		$agama			=	$_POST['agama'];
		$gol_darah		=	trim($_POST['gol_darah']);
		$status_pernikahan	=	$_POST['status_pernikahan'];

		$alamat			=	trim($_POST['alamat']);
		$rt				=	trim($_POST['rt']);
		$rw				=	trim($_POST['rw']);
		$propinsi		=	$_POST['propinsi'];
		$kota			=	$_POST['kota'];
		$kecamatan		=	$_POST['kecamatan'];
		$kelurahan		=	$_POST['kelurahan'];
		$kode_pos		=	trim($_POST['kode_pos']);
		$telepon		=	trim($_POST['telepon']);
		$hp1			=	trim($_POST['hp1']);
		$hp2			=	trim($_POST['hp2']);

		$tinggi_badan	=	trim($_POST['tinggi_badan']);
		$berat_badan	=	trim($_POST['berat_badan']);
		$jenis_rambut	=	$_POST['jenis_rambut'];
		$bentuk_wajah	=	$_POST['bentuk_wajah'];
		$warna_kulit	=	trim($_POST['warna_kulit']);

		$no_ktp			=	trim($_POST['no_ktp']);
		$no_karpeg		=	trim($_POST['no_karpeg']);
		$no_askes		=	trim($_POST['no_askes']);
		$no_taspen		=	trim($_POST['no_taspen']);
		$no_karis		=	trim($_POST['no_karis']);
		$no_npwp		=	trim($_POST['no_npwp']);
		$no_korpri		=	trim($_POST['no_korpri']);
		$tanggal_masuk	=	$_POST['tanggal_masuk'];
		$tanggal_pengangkatan	=	$_POST['tanggal_pengangkatan'];
		$pengalaman		=	trim($_POST['pengalaman_kerja']);


		$foto=$_POST['foto'];
		$foto=$_FILES['foto'];
		$tmp_name=$foto['tmp_name'];
		$namafile=$foto['name'];

		$tujuan="../assets/images/$namafile";
		copy($tmp_name,$tujuan);


	if($_POST['Simpan']){

		mysql_query("INSERT INTO data_pegawai VALUES(NULL, '$nip', '$nip_lama', '$nama', '$gelar_depan', '$gelar_belakang', '$ttl_propinsi', '$ttl_kota', '$ttl_tempat', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$gol_darah', '$status_pernikahan'
			,'$alamat', '$rt', '$rw', '$propinsi', '$kota', '$kecamatan', '$kelurahan', '$kode_pos', '$telepon', '$hp1', '$hp2'
			,'$tinggi_badan', '$berat_badan', '$jenis_rambut', '$bentuk_wajah', '$warna_kulit'
			,'$no_ktp', '$no_karpeg', '$no_askes', '$no_taspen', '$no_karis', '$no_npwp', '$no_korpri', '$tujuan','$tanggal_masuk','$tanggal_pengangkatan','$pengalaman')");

		header("location:../menu/data-pegawai.php");
	}


//untuk edit dan delete
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		die ("Error. No ID Selected! ");
	}


 if($_POST['Edit'])
	{
		$nip			=	trim($_POST['nip'.$id]);
		$nip_lama		=	trim($_POST['nip_lama'.$id]);
		$nama			=	trim($_POST['nama'.$id]);
		$gelar_depan	=	trim($_POST['gelar_depan'.$id]);
		$gelar_belakang	=	trim($_POST['gelar_belakang'.$id]);
		$ttl_propinsi	=	$_POST['ttl_propinsi'.$id];
		$ttl_kota		=	$_POST['ttl_kota'.$id];
		$ttl_tempat		=	trim($_POST['ttl_tempat'.$id]);
		$tanggal_lahir	=	$_POST['tanggal_lahir'.$id];
		$jenis_kelamin	=	$_POST['jenis_kelamin'.$id];
		$agama			=	$_POST['agama'.$id];
		$gol_darah		=	trim($_POST['gol_darah'.$id]);
		$status_pernikahan	=	$_POST['status_pernikahan'.$id];

		$alamat			=	trim($_POST['alamat'.$id]);
		$rt				=	trim($_POST['rt'.$id]);
		$rw				=	trim($_POST['rw'.$id]);
		$propinsi		=	$_POST['propinsi'.$id];
		$kota			=	$_POST['kota'.$id];
		$kecamatan		=	$_POST['kecamatan'.$id];
		$kelurahan		=	$_POST['kelurahan'.$id];
		$kode_pos		=	trim($_POST['kode_pos'.$id]);
		$telepon		=	trim($_POST['telepon'.$id]);
		$hp1			=	trim($_POST['hp1'.$id]);
		$hp2			=	trim($_POST['hp2'.$id]);

		$tinggi_badan	=	trim($_POST['tinggi_badan'.$id]);
		$berat_badan	=	trim($_POST['berat_badan'.$id]);
		$jenis_rambut	=	$_POST['jenis_rambut'.$id];
		$bentuk_wajah	=	$_POST['bentuk_wajah'.$id];
		$warna_kulit	=	trim($_POST['warna_kulit'.$id]);

		$no_ktp			=	trim($_POST['no_ktp'.$id]);
		$no_karpeg		=	trim($_POST['no_karpeg'.$id]);
		$no_askes		=	trim($_POST['no_askes'.$id]);
		$no_taspen		=	trim($_POST['no_taspen'.$id]);
		$no_karis		=	trim($_POST['no_karis'.$id]);
		$no_npwp		=	trim($_POST['no_npwp'.$id]);
		$no_korpri		=	trim($_POST['no_korpri'.$id]);
		$tanggal_masuk	=	$_POST['tanggal_masuk'.$id];
		$tanggal_pengangkatan	=	$_POST['tanggal_pengangkatan'.$id];
		$pengalaman		=	trim($_POST['pengalaman_kerja'.$id]);

		$foto=$_POST['foto'.$id];
		$foto=$_FILES['foto'.$id];
		$tmp_name=$foto['tmp_name'];
		$namafile=$foto['name'];

		$tujuan="../assets/images/$namafile";
		copy($tmp_name,$tujuan);

		if($namafile=="")
		{
			$dataEdit = "UPDATE data_pegawai SET nip='$nip', nip_lama='$nip_lama', nama='$nama', gelar_depan='$gelar_depan', gelar_belakang='$gelar_belakang', ttl_propinsi='$ttl_propinsi', ttl_kota='$ttl_kota', ttl_tempat='$ttl_tempat', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin',
			agama='$agama', gol_darah='$gol_darah', status_pernikahan='$status_pernikahan', alamat='$alamat', rt='$rt', rw='$rw', propinsi='$propinsi', kota='$kota', kecamatan='$kecamatan', kelurahan='$kelurahan',
			kode_pos='$kode_pos', telepon='$telepon', hp1='$hp1', hp2='$hp2', tinggi_badan='$tinggi_badan', berat_badan='$berat_badan', jenis_rambut='$jenis_rambut', bentuk_wajah='$bentuk_wajah', warna_kulit='$warna_kulit', no_ktp='$no_ktp',
			no_karpeg='$no_karpeg', no_askes='$no_askes', no_taspen='$no_taspen', no_karis='$no_karis', no_npwp='$no_npwp', no_korpri='$no_korpri', tanggal_masuk='$tanggal_masuk', tanggal_pengangkatan='$tanggal_pengangkatan', pengalaman_kerja='$pengalaman' WHERE id='$id' ";
		}
		else
		{
			$dataEdit = "UPDATE data_pegawai SET nip='$nip', nip_lama='$nip_lama', nama='$nama', gelar_depan='$gelar_depan', gelar_belakang='$gelar_belakang', ttl_propinsi='$ttl_propinsi', ttl_kota='$ttl_kota', ttl_tempat='$ttl_tempat', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin',
			agama='$agama', gol_darah='$gol_darah', status_pernikahan='$status_pernikahan', alamat='$alamat', rt='$rt', rw='$rw', propinsi='$propinsi', kota='$kota', kecamatan='$kecamatan', kelurahan='$kelurahan',
			kode_pos='$kode_pos', telepon='$telepon', hp1='$hp1', hp2='$hp2', tinggi_badan='$tinggi_badan', berat_badan='$berat_badan', jenis_rambut='$jenis_rambut', bentuk_wajah='$bentuk_wajah', warna_kulit='$warna_kulit', no_ktp='$no_ktp',
			no_karpeg='$no_karpeg', no_askes='$no_askes', no_taspen='$no_taspen', no_karis='$no_karis', no_npwp='$no_npwp', no_korpri='$no_korpri', foto='$tujuan', tanggal_masuk='$tanggal_masuk', tanggal_pengangkatan='$tanggal_pengangkatan', pengalaman_kerja='$pengalaman' WHERE id='$id' ";
		}
		$dataEdit2 = mysql_query($dataEdit);
		//echo $dataEdit;
		header("location:../menu/data-pegawai.php");

	}
	else
	{

		mysql_query ("delete from data_pegawai WHERE id='$id'");

		header("location:../menu/data-pegawai.php");
	}
?>
