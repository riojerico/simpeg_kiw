<?php
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	include "../koneksi/koneksi.php";
	if (isset($_GET['input']))
	{
		$input = $_GET['input'];
		$query = mysql_query("SELECT nip, nama, id FROM data_pegawai WHERE nama LIKE '%$input%'"); //query mencari hasil search
		$hasil = mysql_num_rows($query);
//echo "ada yang error: ".mysql_error();
	if ($hasil > 0)
	{
		while ($data = mysql_fetch_row($query))
		{
?>
			<div>
			<a href="javascript:autoInsert('<?=$data[0]?>','<?=$data[1]?>','<?=$data[2]?>');" class="searchlink">
				<?=$data[1]?></a> <!–- hasil search -–>
			</div>	
<?php
		}
	}
	else
	{
		echo "Data tidak ditemukan";
	}}
	else if(isset($_GET['nis']))
	{
//echo "NIP : ".$info[0]."<BR>Nama : ".$info[1]."<BR>Bidang : ".$info[2];
	}

	//echo $input;

?>