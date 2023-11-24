<?php
require_once './vendor/autoload.php';

use Dompdf\Dompdf;
ob_start();
include 'pindex.html';

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml(ob_get_clean());

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>