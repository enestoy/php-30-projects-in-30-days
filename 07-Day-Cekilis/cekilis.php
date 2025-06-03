<?php date_default_timezone_set("Europe/Istanbul"); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Çekiliş</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .cekilis-kapsayici {
            margin-top: 10%;
            padding: 2rem;
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .divider {
            border-top: 1px dashed #ccc;
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 cekilis-kapsayici">

        <?php 
        $isimlerkap = [];
        $file = fopen("isimler.txt",'r'); 
        while(!feof($file)){  
            $satir = trim(fgets($file)); 
            if (!empty($satir)) $isimlerkap[] = $satir;
        } 
        fclose($file);

        @$islem = $_GET["islem"];
        switch ($islem):
            case "sonuc":
                @$buton = $_POST["buton"];
                @$kisi = $_POST["kisi"];

                $random = array_rand($isimlerkap, $kisi);
                
                echo '<div class="text-center mb-4">
                        <h3 class="text-success">Kazanan Kişiler</h3>
                      </div>';
                echo '<div class="list-group mb-3">';
                foreach ((array)$random as $deger) {
                    echo '<div class="list-group-item">' . htmlspecialchars($isimlerkap[$deger]) . '</div>';
                }
                echo '</div>';
                echo '<div class="text-center">
                        <a href="cekilis.php" class="btn btn-outline-primary">Yeni Çekiliş</a>
                      </div>';
                break;

            default:
        ?>

        <form action="cekilis.php?islem=sonuc" method="post">
            <div class="mb-3 row">
                <label class="col-sm-6 col-form-label text-primary">Toplam Katılımcı</label>
                <div class="col-sm-6">
                    <span class="text-danger fw-bold"><?php echo count($isimlerkap); ?></span>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-6 col-form-label text-primary">Tarih ve Saat</label>
                <div class="col-sm-6">
                    <span class="text-danger fw-bold"><?php echo date("d/m/Y - H:i:s"); ?></span>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-6 col-form-label text-primary">Kaç kişi seçilsin?</label>
                <div class="col-sm-6">
                    <select name="kisi" class="form-select">
                        <?php for ($i=1; $i<=min(10, count($isimlerkap)); $i++): ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" name="buton" class="btn btn-success">ÇEK GELSİN</button>
            </div>
        </form>

        <?php endswitch; ?>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
