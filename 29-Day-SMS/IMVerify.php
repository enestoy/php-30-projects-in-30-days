<?php
Class IMVerify {
    const IM_PUBLIC_KEY = ''; // Iletimerkezi api public key, panel ustunden olusturabilirsiniz.
    const IM_SECRET_KEY = ''; // Iletimerkezi api secret key, panel ustunden olusturabilirsiniz.
    const IM_SENDER     = 'ILETI MRKZI'; // Mesajin iletilecegi baslik bilgisi.

    private function createVerificationCode() {
        $_SESSION['vcode'] = rand(100000, 999999);
        return $_SESSION['vcode'];
    }


    public function send($gsm) {

        $code   = $this->createVerificationCode();
        $text   = 'Doğrulama kodunuz: '.$code;
        $p_hash = hash_hmac('sha256', self::IM_PUBLIC_KEY, self::IM_SECRET_KEY);

        $xml = '
        <request>
            <authentication>
                <key>'.self::IM_PUBLIC_KEY.'</key>
                <hash>'.$p_hash.'</hash>
            </authentication>
            <order>
                <sender>'.self::IM_SENDER.'</sender>
                <sendDateTime></sendDateTime>
                <message>
                    <text><![CDATA['.$text.']]></text>
                    <receipents>
                        <number>'.$gsm.'</number>
                    </receipents>
                </message>
            </order>
        </request>';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://api.iletimerkezi.com/v1/send-sms');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$xml);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        $result = curl_exec($ch);

        preg_match_all('|\<code\>.*\<\/code\>|U', $result, $matches, PREG_PATTERN_ORDER);
        if(isset($matches[0])&&isset($matches[0][0])) {
            if( $matches[0][0] == '<code>200</code>' ) {
                return true;
            }
        }

        return false;
    }

    public function checkIsValid($code) {

        if($code == $_SESSION['vcode']) {
            unset($_SESSION['vcode']);
            return true;
        }

        return false;
    }
}


// Eger sessioni kendi sisteminizde baslatmadiysaniz baslatmaniz gerekir, opsiyonel.
session_start();

// Birinci adim kullanicinin telefonuna dogrulama kodunun iletilmesi.
$im  = new IMVerify();
$gsm = '5057023100'; //$_POST['telefon']; //Kullanicinin girdigi telefon numarasi -> 5050001122... vb
$im->send($gsm); // Kullanicinin telefonuna dogrulama kodunu uretir ve gonderir.


// Ikinci adim kullanicidan aldigimiz dogrulama kodu dogrumu.
$im     = new IMVerify();
$v_code = $_POST['pin']; // Kullanicinin forma yazdigi dogrulama kodu
if($im->checkIsValid($v_code)) {
    //Dogrulama basarili
} else {
    //Dogrulama basarisiz
}
