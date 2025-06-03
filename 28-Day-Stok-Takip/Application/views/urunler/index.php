<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row">
            <div class="col-12">
            <a href="<?=SITE_URL;?>/excel/export" class="btn btn-info mb-3 mt-2">Excel Olarak indir</a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ürün Listesi</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body p-0">
                        <table class="table table-hover">
                            <tr>
                            <tr>
                                <th>ID</th>
                                <th>Ad</th>
                                <th>Kategori</th>
                                <th>Düzenle</th>
                                <th>Kaldır</th>
                            </tr>
                            </tr>
                            <?php
                            if(count($params['data'])!=0)
                            {
                                foreach($params['data'] as $key => $value)
                                {
                                    $categoryInfo = $this->model('categoryModel')->getData($value['kategoriId']);
                                    ?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['ad'];?></td>
                                        <td><?=$categoryInfo['ad'];?></td>
                                        <th><a href="<?=SITE_URL;?>/urunler/edit/<?=$value['id'];?>">Düzenle</a></th>
                                        <th><a href="<?=SITE_URL;?>/urunler/delete/<?=$value['id'];?>">Sil</a></th>
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




