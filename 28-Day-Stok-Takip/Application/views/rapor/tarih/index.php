<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row">
          <div class="col-12">
          <form action="" method="GET">
            <div class="form-group">

                <div class="col-md-6">
                    <label>Başlangıç Tarihi</label>
                    <input type="date" name="firstDate" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Başlangıç Tarihi</label>
                    <input type="date" name="secondDate" class="form-control">
                </div>
                <div class="col-md-12 mt-2">
                    <button class="btn btn-success">Sorgula</button>
                </div>
            </div>
            </form>
          </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title ">Ürün Rapor Listesi</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body p-0">
                        <table class="table table-hover">
                        <tr>
                                <th>ID</th>
                                <th>Ad</th>
                                <th>Toplam Gider</th>
                                <th>Toplam Giren Ürün</th>
                                <th>Toplam Gelir</th>
                                <th>Toplam Çıkan Ürün</th>
                                <th>Fiyat Kalan</th>
                                <th>Ürün Kalan</th>
                            </tr>
                            <?php
                            if(count($params['data'])!=0)
                            {
                                foreach($params['data'] as $key => $value)
                                {
                                    $urunRow = $this->model('urunlerModel')->getData($value['urun_id']);
                                    $toplamGiren = $this->model('raporModel')->girenUrunToplam($value['urun_id']);
                                    $toplamCikan = $this->model('raporModel')->cikanUrunToplam($value['urun_id']);

                                    $toplamKalan = $toplamCikan-$toplamGiren;

                                    $girenAdet = $this->model('raporModel')->girenUrunAdet($value['urun_id']);
                                    $cikanAdet = $this->model('raporModel')->cikanUrunAdet($value['urun_id']);
                                    $toplamAdet = $girenAdet-$cikanAdet;
                                    ?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><?=$urunRow['ad'];?></td>
                                        <td>-<?=$toplamGiren;?></td>
                                        <td><?=$girenAdet;?></td>
                                        <td><?=$toplamCikan;?></td>
                                        <td><?=$cikanAdet;?></td>
                                        <td><?=$toplamKalan;?></td>
                                        <td><?=$toplamAdet;?></td>

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

