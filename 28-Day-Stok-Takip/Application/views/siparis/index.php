<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row">
            <div class="col-12">
           
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sipariş Listesi</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body p-0">
                        <table class="table table-hover">
                        <tr>
                                <th>ID</th>
                                <th>Sipariş Numarası</th>
                                <th>Müşteri</th>
                                <th>Firma</th>
                                <th>Detay</th>
                                <th>Düzenle</th>
                                <th>Kaldır</th>
                            </tr>
                            <?php
                            if(count($params['data'])!=0)
                            {
                                foreach($params['data'] as $key => $value)
                                {
                                    $musteriRow = $this->model('musterilerModel')->getData($value['musteri_id']);
                                    ?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['no'];?></td>
                                        <td><?=$musteriRow['ad'];?> <?=$musteriRow['soyad'];?></td>
                                        <td><?=$value['firma_adi'];?></td>
                                        <th><a href="<?=SITE_URL;?>/siparis/detail/<?=$value['id'];?>">Detay</a></th>
                                        <th><a href="<?=SITE_URL;?>/siparis/edit/<?=$value['id'];?>">Düzenle</a></th>
                                        <th><a href="<?=SITE_URL;?>/siparis/delete/<?=$value['id'];?>">Sil</a></th>
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

