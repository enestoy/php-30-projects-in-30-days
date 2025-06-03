<?php
function sendRequest($url, $xml) {

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/xml']);

  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 120);

  return curl_exec($ch);
}
// https://www.iletimerkezi.com/ bu bilgileri alıp işlemlerine devam edebilirsin
$api_key = '-';
$api_hash = '-';
$sender   = 'kullanıcıadi';

$xml = <<<EOS
<request>
  <authentication>
    <key>{$api_key}</key>
    <hash>{$api_hash}</hash>
  </authentication>
  <order>
    <sender>{$sender}</sender>
    <sendDateTime></sendDateTime>
    <message>
      <text><![CDATA[Test Mesaji]]></text>
      <receipents>
        <number>5073896904</number>
      </receipents>
    </message>
  </order>
</request>
EOS;


$result = sendRequest(
  'https://api.iletimerkezi.com/v1/send-sms',
  $xml
);

die('<pre>'.var_export($result,1).'</pre>');


?>