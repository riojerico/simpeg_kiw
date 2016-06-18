

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak Data Riwayat hidup</title>
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
		th, td {text-align: left; padding: 0px; }
		tr:nth-child(even){background-color: #f2f2f2}
		th { background-color: #fff; color: black;}
  	</style>
</head>

<body>
<?php
$id=$_GET['id'];



?>
	<h2 align="center" class="l1">KOMPOSISI JABATAN</h2>
	<hr class="l2">`
	<h3 align="center"></h3>

	<table border="1" align="center">
		<thead>
			<tr>

				<th width="15" align="center" rowspan="2"><strong>No</strong></th>
				<th width="50" align="center" rowspan="2"><strong>Status</strong></th>
				<th width="30" align="center" rowspan="2"><strong>Jumlah</strong></th>
				<th width="90" align="center" colspan="4"><strong>Pendidikan</strong></th>
				<th width="120" align="center" colspan="6"><strong>Usia</strong></th>
				
			</tr>
		</thead>
		
			<tr>
				<th align="center" width="15">S2</td>
				<th align="center" width="15">S1</td>
				<th align="center" width="15">D3</td>
				<th align="center" width="15">&lt; SLTA</td>
				<th align="center"> &lt; 30 </td>
				<th align="center"> 30-34 </td>
				<th align="center"> 35-39 </td>
				<th align="center"> 40-44 </td>
				<th align="center">45-50</td>
				<th align="center"> > 51 </td>
			</tr>

			<?php
			$q=mysql_query("select * from jenis_jabatan");
			while($data=mysql_fetch_array($q)){
			$no++;

			$idj=$data['id'];

			$qs3=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '9' and jabatan = '$idj' "));

			$qs2=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '8' and jabatan = '$idj' "));

			$qs1=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '7' or tingkat = '6' and jabatan = '$idj' "));

			$qd3=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat = '5' and jabatan = '$idj' "));

			$qslta=mysql_fetch_array(mysql_query("SELECT count(id) from view_datapegawai_pendidikan where tingkat <=5 and jabatan = '$idj' "));



			//jumlah
			$qjumlah=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where jabatan = '$idj' "));

			//< 30
			$umur1=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur <30 and jabatan = '$idj' "));

			//30 - 34
			$umur2=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur between 30 and 34 and jabatan = '$idj' "));

			//30 - 34
			$umur3=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur between 35 and 39 and jabatan = '$idj' "));

			//30 - 34
			$umur4=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur between 40 and 44 and jabatan = '$idj' "));

			//30 - 34
			$umur5=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur between 45 and 50 and jabatan = '$idj' "));

			//< 30
			$umur6=mysql_fetch_array(mysql_query("SELECT count(jabatan) from view_datapegawai_update where umur >=51 and jabatan = '$idj' "));

			?>
			<tr>
				<td align="center"><?php echo $no ?></td>
				<td align="left"><?php echo $data['jenis_jabatan'] ?></td>
				<td align="center"><?php echo $qjumlah[0] ?></td>
				<td align="center"><?php if($qs2[0]==0) echo '-'; else echo $qs2[0]; ?></td>
				<td align="center"><?php if($qs1[0]==0) echo '-'; else echo $qs1[0]; ?></td>
				<td align="center"><?php if($qd3[0]==0) echo '-'; else echo $qd3[0]; ?></td>
				<td align="center"><?php if($qslta[0]==0) echo '-'; else echo $qslta[0]; ?></td>
				<td align="center"><?php if($umur1[0]==0) echo '-'; else echo $umur1[0]; ?></td>
				<td align="center"><?php if($umur2[0]==0) echo '-'; else echo $umur2[0]; ?></td>
				<td align="center"><?php if($umur3[0]==0) echo '-'; else echo $umur3[0]; ?></td>
				<td align="center"><?php if($umur4[0]==0) echo '-'; else echo $umur4[0]; ?></td>
				<td align="center"><?php if($umur5[0]==0) echo '-'; else echo $umur5[0]; ?></td>
				<td align="center"><?php if($umur6[0]==0) echo '-'; else echo $umur6[0]; ?></td>
			</tr>	

		<?php
		}
		?>	
	</table>	
		
<!-- 	<div id="comment"><p>Printed on <?php date_default_timezone_set('Asia/Jakarta'); echo date("d M Y : h i s") ?> | Generated by SIMPEG @RodjoLand.com at <?php ?></p>
	<div id="footer">
    	<p class="page"></p>
  	</div> -->

</body>

</html>