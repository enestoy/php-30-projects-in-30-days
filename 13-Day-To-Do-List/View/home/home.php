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
    <div class="content-wrapper p-2">
        <div class="content">
            <div class="container-fluid">
                <h5 class="mt-4 mb-2">Güncel Durumunuz <code><?= date('Y-m-d'); ?></code></h5>
                <div class="row">
                    <?php foreach ($data['istatistik'] as $row): ?>
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box bg-<?= status($row['status'])['color'] ?>">
                            <span class="info-box-icon"><i class="<?= status($row['status'])['icon'] ?>"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><?= status($row['status'])['title'] ?></span>
                                <span class="info-box-number"><?= $row['toplam'] ?></span>

                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description">
                  <?= number_format($row['yuzde'],2) ?>
                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- The time line -->
                        <div class="timeline">
                            <!-- timeline time label -->

                            <?php foreach ($data['surec'] as $todo): ?>
                            
                            <div class="time-label">
                                <span class="bg-red"><?= date('d/m/Y', strtotime($todo['start_date'])) ?></span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="fa fa-check"  style="background: <?= $todo['color'] ?>"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> <?= date('H:i', strtotime($todo['start_date'])) ?></span>
                                    <h3 class="timeline-header"><span class="badge bg-success"><?= $todo['category_title']; ?></span> <?= $todo['title'] ?></h3>

                                    <div class="timeline-body"><?= $todo['description'] ?><br>
                                        <?= $todo['progress']; ?>%
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: <?= $todo['progress']; ?>%"></div>
                                        </div>
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="<?= url('todo/edit/'.$todo['id']) ?>" class="btn btn-primary btn-sm">Git</a>
                                    </div>
                                </div>
                            </div>
                            <!-- END timeline item -->
                            <?php endforeach; ?>
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                            </div>
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