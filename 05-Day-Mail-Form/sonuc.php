<?php
header("Content-Type:text/html; charset=UTF-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function Filtrele($Deger)
{
    $IslemBir    = trim($Deger);
    $IslemIki    = strip_tags($IslemBir);
    $IslemUc    = htmlspecialchars($IslemIki, ENT_QUOTES);
    return $IslemUc;
}


$isim        = Filtrele($_POST["isim"]);
$mail        = Filtrele($_POST["mail"]);
$konu        = Filtrele($_POST["konu"]);
$mesaj       = Filtrele($_POST["mesaj"]);



$MailGonder = new PHPMailer(true);
try {
    //Sunucu ayarları
    $MailGonder->SMTPDebug      = 0;
    $MailGonder->isSMTP();
    $MailGonder->Host        = "mail.test.com";
    $MailGonder->SMTPAuth    = true;
    $MailGonder->CharSet     = 'UTF-8';
    $MailGonder->Username    = 'info@test.com';
    $MailGonder->Password    = 'sifretest';
    $MailGonder->SMTPSecure  = "tls";
    $MailGonder->Port        = 587;
    $MailGonder->SMTPOptions = array(
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ],
    );
    $MailGonder->setFrom($mail, $isim);
    $MailGonder->addAddress('info@test.com', 'Firma İsmi');
    $MailGonder->addReplyTo($mail, $isim);
    $MailGonder->isHTML(true);
    $MailGonder->Subject      = $konu;
    $MailGonder->MsgHTML($mesaj);
    //    $MailGonder->Body      = 'Mailin Gövdesi';
    //    $MailGonder->AltBody   = 'Mailin Gövdesi (HTML mail kabul etmeyen sunucular için)';
    $MailGonder->send();
    echo '<div class="alert alert-success text-center mx-auto">Mesaj başarıyla alındı.<br>TEŞEKKÜR EDERİZ</div>';
} catch (Exception $e) {
    echo "Mail Gönderim Hatası<br> Hata Açıklaması: " . $MailGonder->ErrorInfo;
}
?>