<?php
include("fonk.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FAKE HABERLER</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-0" style="min-height:150px; top:0">
        <div class="container">
            <a class="navbar-brand" href="index.php">FAKE HABERLER</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?katid=1">SPOR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?katid=2">SİYASET</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?katid=3">MAGAZİN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <h1 class="my-4">
            <?php
            if (@isset($_GET["katid"]) && !empty($_GET["katid"])):
                if ($_GET["katid"] == 1) :
                    echo "SPOR HABERLERİ";

                elseif ($_GET["katid"] == 2) :
                    echo "SİYASET HABERLERİ";

                elseif ($_GET["katid"] == 3) :
                    echo "MAGAZİN HABERLERİ";

                endif;
            else:
                echo "KARIŞIK HABERLER";
            endif;
            ?>
        </h1>
        <div class="row">
            <div class="col-lg-9">
                <div class="row" id="karisikhaber">
                    <?php
                    @$katid = $_GET["katid"];
                    switch ($katid):

                        case "1":
                            katidgore($db, $katid);
                            break;

                        case "2":
                            katidgore($db, $katid);
                            break;

                        case "3":
                            katidgore($db, $katid);
                            break;
                        default:
                            haberler($db);
                    endswitch;
                    ?>
                    <!-- Haberler bitti-->
                </div>
            </div>

            <div class="col-lg-3 border border-light">
                <div class="row">
                    <div class="col-lg-12 bg-dark text-warning p-2">
                        SON EKLENENLER</div>
                    <?php
                    yenieklenen($db);
                    ?>
                    <!-- son eklenen bitti -->
                    <div class="col-lg-12 bg-dark text-warning p-2">
                        SON DAKİKA</div>

                    <?php
                    sondakika($db);
                    ?>
                    <!-- son dakika bitti -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>