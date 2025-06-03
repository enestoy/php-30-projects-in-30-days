<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hesap Makinesi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
    }
    .calculator-card {
      border: none;
      border-radius: 2rem;
      background-color: white;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      transition: transform 0.3s ease;
    }
    .calculator-card:hover {
      transform: translateY(-5px);
    }
    .form-control, .form-select {
      border-radius: 1rem;
    }
    .btn-primary {
      border-radius: 1rem;
      padding: 0.75rem;
      font-size: 1.1rem;
    }
    .alert {
      border-radius: 1rem;
      font-size: 1.2rem;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="calculator-card">
        <h2 class="text-center mb-4 fw-bold text-primary">Hesap Makinesi</h2>
        <form method="post">
          <div class="mb-3">
            <label for="sayi1" class="form-label">1. Sayı</label>
            <input type="number" step="any" class="form-control" id="sayi1" name="sayi1" required>
          </div>
          <div class="mb-3">
            <label for="sayi2" class="form-label">2. Sayı</label>
            <input type="number" step="any" class="form-control" id="sayi2" name="sayi2" required>
          </div>
          <div class="mb-4">
            <label for="islem" class="form-label">İşlem</label>
            <select class="form-select" name="islem" id="islem" required>
              <option value="topla">Topla</option>
              <option value="cikar">Çıkar</option>
              <option value="carp">Çarp</option>
              <option value="bol">Böl</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary w-100">Hesapla</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sayi1 = floatval($_POST["sayi1"]);
            $sayi2 = floatval($_POST["sayi2"]);
            $islem = $_POST["islem"];
            $sonuc = null;

            switch ($islem) {
                case "topla":
                    $sonuc = $sayi1 + $sayi2;
                    break;
                case "cikar":
                    $sonuc = $sayi1 - $sayi2;
                    break;
                case "carp":
                    $sonuc = $sayi1 * $sayi2;
                    break;
                case "bol":
                    $sonuc = ($sayi2 != 0) ? ($sayi1 / $sayi2) : "Hata: 0'a bölünemez!";
                    break;
                default:
                    $sonuc = "Geçersiz işlem";
            }

            echo "<div class='alert alert-info mt-4 text-center'>Sonuç: <strong>$sonuc</strong></div>";
        }
        ?>
      </div>
    </div>
  </div>
</div>

</body>
</html>
