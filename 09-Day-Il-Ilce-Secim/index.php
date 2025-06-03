<?php
include_once("yardimci.php");
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>İl - İlçe Seçimi</title>

    <!-- Bootstrap ve jQuery -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 100px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        h3 {
            font-weight: 600;
            color: #343a40;
        }

        #artiksonuc {
            font-weight: 500;
            font-size: 1.1rem;
            color:rgb(16, 63, 134);
        }
    </style>

    <script>
        $(document).ready(function () {

            $('#iki').attr("disabled", true).html('<option value="0">Seçin..</option>');

            var veri = [];
            let secilenIl = "";

            $('#bir').on('change', function () {
                var secilendeger = $(this).val();
                secilenIl = $("#bir option:selected").text();

                $.post("yardimci.php?islem=getir", {
                    "deger": secilendeger
                }, function (donen) {
                    veri = donen;
                    $('#iki').attr("disabled", false);
                    $('#iki').html(veri);
                });
            });

            $('#iki').on('change', function () {
                var secilenIlce = $(this).val();
                $('#artiksonuc').html("İl: <strong>" + secilenIl + "</strong><br>İlçe: <strong>" + secilenIlce + "</strong>");
            });

        });
    </script>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-4">
                    <h3 class="text-center mb-4">İl ve İlçe Seçimi</h3>

                    <div class="mb-3">
                        <label for="bir" class="form-label">İl Seçin:</label>
                        <select class="form-select" name="birdeger" id="bir">
                            <?php ilgetir($baglanti); ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="iki" class="form-label">İlçe Seçin:</label>
                        <select class="form-select" name="ikideger" id="iki">
                        </select>
                    </div>

                    <div class="alert alert-light" id="artiksonuc" role="alert">
                        Henüz seçim yapılmadı.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
