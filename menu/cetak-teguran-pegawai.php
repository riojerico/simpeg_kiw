<?php
include "../koneksi/koneksi.php";
if($_POST["excel"]) {


header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan urut kepangkatan.xls");

$id=$_GET['id'];

$id_peg=$_POST['id_peg'];
$id_peg2=mysql_fetch_array(mysql_query("select nip, nama, gelar_depan, gelar_belakang from data_pegawai where id='$id_peg'"));

?>
	<h2 align="center" class="l1">LAPORAN TEGURAN</h2>
	<hr class="l2">
	<h3 align="center"></h3>

	<h4><?php echo $id_peg2['gelar_depan']; echo '  '; echo $id_peg2['nama']; echo ', '; echo $id_peg2['gelar_belakang']; ?></h4>
	</h4></h4>

	<table border="1" align="center">
		<thead>
			<tr>

				<th width="15" align="center" ><strong>No</strong></th>
				<th width="30" align="center" ><strong>No Surat</strong></th>
				<th width="50" align="center" ><strong>Tanggal Surat</strong></th>
				<th width="50" align="center" ><strong>Jenis Teguran</strong></th>
				<th width="70" align="center" ><strong>Alasan Teguran</strong></th>
				
			</tr>
		</thead>
			<?php
			$q=mysql_query("select * from rwt_teguran where id_peg='$id_peg' ");
			while($data=mysql_fetch_array($q)){
			$no++;

			$teguran=$data['nama_teguran'];
			$teguran2=mysql_fetch_array(mysql_query("select teguran from master_teguran where id='$teguran' "));

			?>
			<tr>
				<td align="center"><?php echo $no ?></td>
				<td align="center"><?php echo $data['no_surat'] ?></td>
				<td align="center"><?php echo date("d M Y", strtotime($data['tanggal'])) ?></td>
				<td align="center"><?php echo $teguran2[0] ?></td>
				<td align="center"><?php echo $data['alasan'] ?></td>
			</tr>	

		<?php
		}
		?>	
	</table>
<?php	
}else{

include "../koneksi/koneksi.php";
// Composer's auto-loading functionality
require "../assets/dompdf/vendor/autoload.php";

// inhibit DOMPDF's auto-loader
define('DOMPDF_ENABLE_AUTOLOAD', false);

//include the DOMPDF config file (required)
require '../assets/dompdf/vendor/dompdf/dompdf/dompdf_config.inc.php';

//if you get errors about missing classes please also add:
require_once('../assets/dompdf/vendor/dompdf/dompdf/include/autoload.inc.php');



ob_start();


include "cetak/teguran-pegawai.php";

$html = ob_get_clean();

//generate some PDFs!
$dompdf = new DOMPDF();     //if you use namespaces you may use new \DOMPDF()
$dompdf->load_html($html);
$dompdf->set_base_path("");
$dompdf->render();
$dompdf->stream("sample.pdf", array("Attachment"=>0));

}

?>