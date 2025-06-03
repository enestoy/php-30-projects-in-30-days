<?php session_start(); @$kod=$_SESSION["kod"]; ?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Güvenlik Doğrulama</title>
  <style>
    body {
      background: #f0f4f8;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }
    h2 {
      color: #333;
      margin-bottom: 24px;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin: 12px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }
    input[type="submit"],
    .btn {
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      margin: 8px;
      text-decoration: none;
      display: inline-block;
      transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover,
    .btn:hover {
      background-color: #0056b3;
    }
    .captcha {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .captcha img {
      height: 40px;
      margin-left: 10px;
      border-radius: 4px;
    }
    .message {
      margin-top: 20px;
      font-weight: bold;
      color: #d9534f;
    }
    .message.success {
      color: green;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Güvenlik Doğrulama</h2>
    <?php 
      if ($_POST) :
          $guvenlik = htmlspecialchars(strip_tags($_POST["guven"]));
          $ad = htmlspecialchars(strip_tags($_POST["ad"]));
          
          if ($guvenlik != $kod) :
              echo '<div class="message">Girilen kod hatalı.</div>';
              echo '<a href="index.php" class="btn">Tekrar Dene</a>';
              
          else:
              echo '<div class="message success">Kod doğru<br>Hoş geldiniz, ' . $ad . '!</div>';
              echo '<a href="index.php" class="btn">Anasayfaya Dön</a>';
          endif;
      else:
    ?>
      <form action="index.php" method="post">
        <input name="ad" type="text" placeholder="Adınız"><br>
        <div class="captcha">
          <input name="guven" type="text" placeholder="Güvenlik kodu">
          <img src="guvenlik.php" alt="Güvenlik Kodu">
        </div><br>
        <input type="submit" value="Gönder">
      </form>
    <?php endif; ?>
  </div>
</body>
</html>
