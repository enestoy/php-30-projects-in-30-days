<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Üyeler Listesi</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body p-0">
                        <table class="table table-hover">
                        <tr>
                                <th>ID</th>
                                <th>Ad Soyad</th>
                                <th>Düzenle</th>
                                <th>Kaldır</th>
                            </tr>
                            <?php
                            if(count($params['data'])!=0)
                            {
                                foreach($params['data'] as $key => $value)
                                {
                                    ?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['name'];?></td>
                                        <th><a href="<?=SITE_URL;?>/kullanici/edit/<?=$value['id'];?>">Düzenle</a></th>
                                        <th><a href="<?=SITE_URL;?>/kullanici/delete/<?=$value['id'];?>">Sil</a></th>
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