<?php

require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF();

// Yazı tipi (Türkçe karakterler için)
$pdf->SetFont('dejavusans', '', 10);

$pdf->AddPage();

$html = '
<h1 style="color:navy;">Fatura</h1>
<p>Müşteri Adı: Enes Toy</p>
<table border="1" cellpadding="4">
    <tr>
        <th>Ürün</th><th>Adet</th><th>Fiyat</th>
    </tr>
    <tr>
        <td>Mouse</td><td>2</td><td>150 ₺</td>
    </tr>
</table>
';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('fatura.pdf', 'I');


?>