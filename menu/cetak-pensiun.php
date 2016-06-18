<?php
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


include "cetak/pensiun.php";

$html = ob_get_clean();

//generate some PDFs!
$dompdf = new DOMPDF();     //if you use namespaces you may use new \DOMPDF()
$dompdf->load_html($html);
$dompdf->set_base_path("");
$dompdf->render();
$dompdf->stream("sample.pdf", array("Attachment"=>0));


?>