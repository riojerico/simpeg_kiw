

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
	
	<style>
		* {font-family: sans-serif; font-size: 13px;}
	    @page { margin: 50px 50px; }
	    #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; background-color: #fff; text-align: center; }
	    #footer { position: fixed; left: 710px; bottom: -160px; right: 0px; height: 150px; background-color: #fff; }
	    #comment{ position: fixed; left: -10px; bottom: -160px; right: 0px; height: 150px; background-color: #fff; font-size: 8;}
	    #footer .page:after { content: counter(page, upper-roman); }
	    .l1{margin-top: 0;}
	    .l2{margin-top: 20; margin-bottom: 20;}

	    table {width: 100%; margin-top: 0; margin-bottom: 5; margin-left: 130;table-layout: relative; }
		th, td {text-align: left; padding: 5px; }
		tr:nth-child(even){background-color: #f2f2f2}
		th { background-color: #fff; color: black;}
  	</style>
</head>

<body>
<?php
$id=$_GET['id'];
// $query=mysql_query("select * from data_pegawai where id='$id'");
// $query2=mysql_fetch_array($query);

// //ttl_propinsi
// $getTtl_propinsi=$query2['propinsi'];
// $getTtl_propinsi2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi = '$getTtl_propinsi'");
// $getTtl_propinsi3=mysql_fetch_array($getTtl_propinsi2);

// //ttl_kota
// $getTtlPropinsi=$query2['propinsi'];
// $getTtlKota=$query2['kota'];
// $getTtlKota2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getTtlPropinsi' and lokasi_kabupatenkota='$getTtlKota' ");
// $getTtlKota3=mysql_fetch_array($getTtlKota2);
// $pattern = '/[^ ]*$/';
// preg_match($pattern, $getTtlKota3[0], $resultsKota);
// $getTtlKota4=ucfirst(strtolower($resultsKota[0]));

// //ttl_kecamatan
// $getTtlKecamatan=$query2['kecamatan'];
// $getTtlKecamatan2=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getTtlPropinsi' and lokasi_kabupatenkota = '$getTtlKota' and lokasi_kecamatan = '$getTtlKecamatan' ");
// $getTtlKecamatan3=mysql_fetch_array($getTtlKecamatan2); 
// $getTtlKecamatan4=ucfirst(strtolower($getTtlKecamatan3[0]));

// //ttl_kelurahan
// $getTtlKelurahan=explode(".", $query2['kelurahan']);
// $getTtlKelurahan2=$getTtlKelurahan[3];
// $getTtlKelurahan3=mysql_query("select lokasi_nama from inf_lokasi where lokasi_propinsi='$getTtlPropinsi' and lokasi_kabupatenkota = '$getTtlKota' and lokasi_kecamatan = '$getTtlKecamatan' and lokasi_kelurahan='$getTtlKelurahan2' ");
// $getTtlKelurahan4=mysql_fetch_array($getTtlKelurahan3);
// $getTtlKelurahan5=ucfirst(strtolower($getTtlKelurahan4[0]));



// //jenis_kelamin
// $getJkel = $query2['jenis_kelamin'];
// $getJkel2=mysql_query("select jenis_kelamin from jenis_kelamin where id='$getJkel'");
// $getJkel3=mysql_fetch_array($getJkel2);

// //agama
// $getAgama=$query2['agama'];
// $getAgama2=mysql_query("select agama from agama where id='$getAgama'");
// $getAgama3=mysql_fetch_array($getAgama2);

// //status_pernikahan
// $getStatus = $query2['status_pernikahan'];
// $getStatus2=mysql_query("select status_pernikahan from status_pernikahan where id='$getStatus'");
// $getStatus3=mysql_fetch_array($getStatus2);


?>
	<h2 align="center" class="l1">DAFTAR PEGAWAI</h2>
	<hr class="l2">
	<?php
	if($id==0)
		$NmJabatan="PENSIUN";
	else
		$NmJabatan="AKTIF";
	?>
	<h3 align="center"><?php echo $NmJabatan ?></h3>

	<table border="1" align="center">
		<thead>
			<tr>
				<th width="20" align="center"><strong>No</strong></th>
				<th width="100" align="center"><strong>Nip</strong></th>
				<th width="100" align="center"><strong>Nama</strong></th>
				<th width="100" align="center"><strong>Jabatan</strong></th>
				<th width="100" align="center"><center>Status</center></th>
				<th width="50" align="center"><strong>Umur</strong></th>
			</tr>
		</thead>
		<?php
            $getpensiun=mysql_fetch_array(mysql_query("select usia from usia_pensiun"));
            $getpensiun2=$getpensiun[0]-1;
            $q=mysql_query("select * from view_datapegawai_update where umur >='$getpensiun2' ");
        
    		$no	= 1;
            if($id==1)
              $data_jabatan = mysql_query("select * from view_datapegawai_update where umur < '$getpensiun2'");
            else if($id==0)
			  $data_jabatan	=	mysql_query("select * from view_datapegawai_update where umur >='$getpensiun2'");
			while($data_jabatan2	=	mysql_fetch_array($data_jabatan)){

    		$getJabatan=$data_jabatan2['jabatan'];
            $getJabatan2=mysql_query("select jenis_jabatan from jenis_jabatan where id='$getJabatan'");
            $getJabatan3=mysql_fetch_array($getJabatan2);

            $status=$data_jabatan2['status_peg'];
            $status2=mysql_fetch_array(mysql_query("select status_pegawai from master_statuspegawai where id='$status' "));
          ?>     
              <tr>
                <td width="30"><center><?php echo $no; ?></center></td>
                <td width="100"><center><?php echo $data_jabatan2['nip']; ?></center></td>
                <td width="100"><center><?php echo $data_jabatan2['nama']; ?></center></td>
                <td width="100"><center><?php echo $getJabatan3[0] ?></center></td>
                <td width="100"><center><?php echo $status2[0] ?></center></td>
                <td width="50" ><center><?php echo $data_jabatan2['umur'] ?></center></td>
              </tr>
    			<?php
    				$no++;
    				}
    			?>
	</table>	
		
<!-- 	<div id="comment"><p>Printed on <?php date_default_timezone_set('Asia/Jakarta'); echo date("d M Y : h i s") ?> | Generated by SIMPEG @RodjoLand.com at <?php ?></p>
	<div id="footer">
    	<p class="page"></p>
  	</div> -->

</body>

</html>