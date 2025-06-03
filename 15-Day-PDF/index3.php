<?php
require_once('tcpdf/tcpdf.php');

// PDF nesnesi oluştur
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Başlıklar
$pdf->SetCreator('Benim Scriptim');
$pdf->SetAuthor('Enes Toy');
$pdf->SetTitle('PDF Örneği');
$pdf->SetSubject('TCPDF ile PDF');

// Header / Footer kapatma
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Yazı tipi (Türkçe karakterler için)
$pdf->SetFont('dejavusans', '', 10);

// Sayfa ekle
$pdf->AddPage();

// İçerik ekle
$pdf->Write(0, 'Merhaba Dünya! Bu TCPDF ile oluşturulmuş bir PDF dosyasıdır.');

// PDF'i çıktıla (tarayıcıda göster)
$pdf->Output('ornek.pdf', 'I'); // I = inline, D = download, F = file, S = string
?>
