<?php
require 'database.php';
?>
<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .search-container {
            max-width: 500px;
            margin-top: 100px;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .btn-search {
            padding: 10px 40px;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="search-container w-100">
            <div class="card p-4">
                <h4 class="text-center mb-4">Kelime Arama</h4>
                <form action="search.php" method="post">
                    <div class="mb-3">
                        <input type="text" name="kelime" class="form-control form-control-lg" placeholder="Bir kelime girin..." required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-search">Arama Yap</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php 
$db = null;
?>
