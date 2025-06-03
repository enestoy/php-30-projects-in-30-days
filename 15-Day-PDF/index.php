<?php
require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF();

// Sayfa ekle
$pdf->AddPage();

// Başlık yaz
$pdf->SetFont('dejavusans', '', 14);
$pdf->Write(0, 'Merhaba Dünya! Bu benim ilk PDF dosyam.');

// PDF'i çıktıla (browser'da göster)
$pdf->Output('ornek.pdf', 'I'); // 'I' = inline, 'D' = download, 'F' = file olarak kaydet

?>