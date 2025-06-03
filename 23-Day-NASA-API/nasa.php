<?php

/* 

$oturum = curl_init("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY");
curl_setopt($oturum, CURLOPT_RETURNTRANSFER, true);
curl_setopt($oturum, CURLOPT_SSL_VERIFYPEER, false);
$cikti = curl_exec($oturum);
curl_close($oturum);

$al= json_decode($cikti,true);

// Kontrol etmek için dizi yapısını yazdır:
echo "<pre>";
print_r($al);
echo "</pre>";

// Daha güvenli bir şekilde döngü:
foreach ($al as $anahtar => $deger) {
    if (is_array($deger)) {
        echo "<strong>$anahtar</strong>:<br>";
        foreach ($deger as $altAnahtar => $altDeger) {
            echo "&nbsp;&nbsp;$altAnahtar => $altDeger<br>";
        }
    } else {
        echo "<strong>$anahtar</strong>: $deger<br>";
    }
}

echo "<br><br>";
echo $al["title"]."<br><br>";
echo $al["explanation"];

*/

$oturum = curl_init("https://api.nasa.gov/DONKI/WSAEnlilSimulations?startDate=2011-09-19&endDate=2011-09-20&api_key=DEMO_KEY");
curl_setopt($oturum, CURLOPT_RETURNTRANSFER, true);
curl_setopt($oturum, CURLOPT_SSL_VERIFYPEER, false);
$cikti = curl_exec($oturum);
curl_close($oturum);

$al = json_decode($cikti, true);

/* 
echo "<pre>";
		foreach ($al as $anahtar => $deger):
			foreach ($deger as $anahtar2 => $deger2):	
			if (is_array($deger2)):
			
					foreach ($deger2 as $anahtar3 => $deger3):
					echo $anahtar3."=";
					print_r($deger3);
					echo "<br>";
					endforeach;				
			else:			
					echo $anahtar2."=";
					print_r($deger2);
					echo "<br>";		
			endif;
			endforeach;
			echo "<hr>";
		endforeach;
echo "</pre>";
*/

echo "<pre>";

foreach ($al as $anahtar => $deger):

	echo $deger["simulationID"] . "<br>";
	echo $deger["modelCompletionTime"] . "<br>";
	echo $deger["au"] . "<br>";


	foreach ($deger["cmeInputs"] as $anahtar2 => $deger2):

		$cme = $deger["cmeInputs"][$anahtar2];

		echo $cme["cmeStartTime"] . "<br>";
		echo $cme["latitude"] . "<br>";
		echo $cme["longitude"] . "<br>";
		echo $cme["speed"] . "<br>";
		echo $cme["halfAngle"] . "<br>";
		echo $cme["time21_5"] . "<br>";
		echo $cme["isMostAccurate"] . "<br>";
		echo $cme["levelOfData"] . "<br>";

		if (count($deger["cmeInputs"][$anahtar2]["ipsList"]) > 0):
			echo "---" . $cme["ipsList"][0]["catalog"] . "<br>";
			echo "---" . $cme["ipsList"][0]["activityID"] . "<br>";
			echo "---" . $cme["ipsList"][0]["location"] . "<br>";
			echo "---" . $cme["ipsList"][0]["eventTime"] . "<br>";

			foreach ($deger["cmeInputs"][$anahtar2]["ipsList"][0]["instruments"] as $anahtar3 => $deger3):
				$id = isset($deger3["id"]) ? $deger3["id"] : "YOK";
				$displayName = isset($deger3["displayName"]) ? $deger3["displayName"] : "YOK";

				echo "--- İd : $id<br>";
				echo "--- displayName : $displayName<br>";
			endforeach;
		endif;



		echo $cme["cmeid"] . "<br>";
	endforeach;
	echo "<hr>";

endforeach;
echo "</pre>";

