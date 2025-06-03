<?php
require_once('tcpdf/tcpdf.php');

// MySQL bağlantısı
$pdo = new PDO("mysql:host=localhost;dbname=education;charset=utf8", "root", "");

// Verileri çek
$sorgu = $pdo->query("SELECT * FROM musteriler");
$musteriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);

// PDF başlat
$pdf = new TCPDF();

$pdf->SetMargins(15, 20, 15);
$pdf->SetFont('dejavusans', '', 10);

// 📄 1. SAYFA: Fatura Listesi
$pdf->AddPage();
$html = '<h1 style="color:black;">Fatura Listesi</h1>';
$html .= '<table cellpadding="6" cellspacing="0" border="1" style="border-collapse:collapse;">
    <thead>
        <tr style="background-color:#6a1b9a; color:white; font-weight:bold; text-align:center;">
            <th width="20%">Ad</th>
            <th width="20%">Soyad</th>
            <th width="20%">Ürün</th>
            <th width="20%">Adet</th>
            <th width="20%">Fiyat (₺)</th>
        </tr>
    </thead>
    <tbody>';

$toplamFiyat = 0;
$satirRenk = true;

foreach ($musteriler as $musteri) {
    $bgColor = $satirRenk ? '#f3e5f5' : '#ffffff';
    $html .= '<tr style="background-color:' . $bgColor . '; ">
        <td>' . htmlspecialchars($musteri['ad']) . '</td>
        <td>' . htmlspecialchars($musteri['soyad']) . '</td>
        <td>' . htmlspecialchars($musteri['urun']) . '</td>
        <td style="text-align:center;">' . $musteri['adet'] . '</td>
        <td style="text-align:right;">' . number_format($musteri['fiyat'], 2, ',', '.') . ' ₺</td>
    </tr>';
    $toplamFiyat += $musteri['fiyat'] * $musteri['adet'];
    $satirRenk = !$satirRenk;
}

$html .= '<tr style="background-color:#ede7f6; font-weight:bold;">
    <td colspan="4" style="text-align:right;">Toplam:</td>
    <td style="text-align:right;">' . number_format($toplamFiyat, 2, ',', '.') . ' ₺</td>
</tr>';

$html .= '</tbody></table>';
$pdf->writeHTML($html, true, false, true, false, '');

// 📄 2. SAYFA: Ek Bilgiler (örnek amaçlı)
$pdf->AddPage();
$pdf->writeHTML('<h2>Ek Bilgiler</h2><p>Bu sayfa tamamen örnek bilgilerle doldurulabilir. İstersen müşteri notları, açıklamalar, firma bilgileri gibi detaylar burada yer alabilir.</p>', true, false, true, false, '');

// 📄 3. SAYFA: Teşekkür Sayfası (isteğe bağlı)
$pdf->AddPage();
$pdf->writeHTML('<h2>Teşekkür Ederiz</h2><p>PDF çıktınızı incelediğiniz için teşekkür ederiz. Bizi tercih ettiğiniz için mutluyuz.</p>', true, false, true, false, '');

// PDF çıktısı
$pdf->Output('fatura_listesi.pdf', 'I');

?>
