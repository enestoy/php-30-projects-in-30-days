<?php view('static/header'); ?>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= URL.'cikis'; ?>" class="nav-link">Çıkış Yap</a>
            </li>
        </ul>
    </nav>
    <?php view('static/sidebar'); ?>
    <div class="content-wrapper p-5">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Kategori Ekle</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php
                            
                            echo get_session('error')  ? '<div class="alert alert-'.$_SESSION['error']['type'].'">'.$_SESSION['error']['message'].'</div>' : null;
                            ?>
                            <form action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Kategori Başlığı</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?= $data['title']; ?>" placeholder="Kategori adı giriniz...">
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $data['id']; ?>">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" value="1" class="btn btn-primary">Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php view('static/footer'); ?>
</div>

<script src="<?= assets('plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= assets('js/adminlte.min.js'); ?>"></script>
</body>
</html>