<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Faturalar Listesi</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body p-0">
                        <table class="table table-hover">
                        <tr>
                                <th>ID</th>
                                <th>Fatura no</th>
                                <th>Müşteri</th>
                                <th>Tutar</th>
                                <th>Düzenle</th>
                                <th>Kaldır</th>
                            </tr>
                            <?php
                            if(count($params['data'])!=0)
                            {
                                foreach($params['data'] as $key => $value)
                                {
                                    $musteriRow = $this->model('musterilerModel')->getData($value['musteriid']);
                                    ?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['fatura_no'];?></td>
                                        <td><?=$musteriRow['ad'];?> <?=$musteriRow['soyad'];?></td>
                                        <td><?=$value['tutar'];?></td>
                                        <th><a href="<?=SITE_URL;?>/fatura/edit/<?=$value['id'];?>">Düzenle</a></th>
                                        <th><a href="<?=SITE_URL;?>/fatura/delete/<?=$value['id'];?>">Sil</a></th>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>



                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </section>
</div>

