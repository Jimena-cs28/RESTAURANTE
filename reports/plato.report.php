<?php

require_once '../vendor/autoload.php';
require_once '../model/reporte.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
  //instanciar clase 
  $listar = new Listar();
  $datos = $listar->listarVenta1($_GET['plato']);

  ob_start();

  //hoJa de estilos
  include './estilos.report.html';
  //archivo con datos(estaticos/dinamicoa)
  include './plato.data.php';

  $content = ob_get_clean();

  $html2pdf = new Html2Pdf('P', 'A4', 'es');
  $html2pdf->writeHTML($content);
  $html2pdf->output('Restaurante.pdf');

} catch (Html2PdfException $e) {
  $html2pdf->clean();

  $formatter = new ExceptionFormatter($e);
  echo $formatter->getHtmlMessage();
}