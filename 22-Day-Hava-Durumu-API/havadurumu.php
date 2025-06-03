<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

$apiKey = "1e28b874fda5e7aeabf8342c3a1d0d10"; 
$city = "Istanbul";
$apiUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

// cURL başlat
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// API yanıtını al
$response = curl_exec($ch);
if(curl_errno($ch)){
    echo 'cURL Hatası: ' . curl_error($ch);
    exit;
}
curl_close($ch);

// JSON'u diziye çevir
$data = json_decode($response, true);

// HTML çıktısı (stil dahil)
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Hava Durumu - <?php echo $city; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #83a4d4, #b6fbff);
            color: #333;
            text-align: center;
            padding: 50px;
        }
        .weather-card {
            background-color: #ffffffdd;
            border-radius: 15px;
            display: inline-block;
            padding: 30px 50px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        h1 {
            margin-top: 0;
            color: #1e81b0;
        }
        p {
            font-size: 18px;
            margin: 8px 0;
        }
    </style>
</head>
<body>

<?php if(isset($data['cod']) && $data['cod'] == 200): ?>
    <div class="weather-card">
        <h1><?php echo $data['name']; ?> Hava Durumu</h1>
        <p><strong>Sıcaklık:</strong> <?php echo $data['main']['temp']; ?>°C</p>
        <p><strong>Hissedilen:</strong> <?php echo $data['main']['feels_like']; ?>°C</p>
        <p><strong>Durum:</strong> <?php echo ucfirst($data['weather'][0]['description']); ?></p>
        <p><strong>Rüzgar:</strong> <?php echo $data['wind']['speed']; ?> m/s</p>
        <p><strong>Nem:</strong> <?php echo $data['main']['humidity']; ?>%</p>
    </div>
<?php else: ?>
    <p>Veri alınamadı. API Hatası: <?php echo $data['message']; ?></p>
<?php endif; ?>

</body>
</html>
