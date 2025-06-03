<div class="content-wrapper mt-2">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Müşteri Rapor Listesi</h3>
                    </div>
                    <!-- ./card-header -->
                    <div class="card-body p-0">
                        <table class="table table-hover">
                        <tr>
                                <th>ID</th>
                                <th>Ad Soyad</th>
                                <th>Kesilen Faturalar</th>
                                <th>Alınan Faturalar</th>
                                <th>Toplam Alınan Ürün</th>
                                <th>Toplam Satılan Ürün</th>
                                <th>Toplam Kazanılan Para</th>
                                <th>Toplam Kaybedilen Para</th>
                                <th>Kalan</th>
                            </tr>
                            <?php
                            if(count($params['data'])!=0)
                            {
                                foreach($params['data'] as $key => $value)
                                {
                                    $kesilenFaturalar = $this->model('raporModel')->faturaGelir($value['id']);
                                    $alinanFaturalar = $this->model('raporModel')->faturaGider($value['id']);

                                    $toplamAlinanUrun = $this->model('raporModel')->toplamAlinanUrun($value['id']);
                                    $toplamSatilanUrun = $this->model('raporModel')->toplamSatilanUrun($value['id']);

                                    $toplamKazanilanPara = $this->model('raporModel')->toplamKazanilanPara($value['id']);
                                    $toplamKaybedilenPara = $this->model('raporModel')->toplamKaybedilenPara($value['id']);

                                    $kalan = $toplamKazanilanPara - $toplamKaybedilenPara - $kesilenFaturalar + $alinanFaturalar;
                                    ?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['ad'];?> <?=$value['soyad'];?></td>
                                        <td><?=$kesilenFaturalar;?></td>
                                        <td><?=$alinanFaturalar;?></td>
                                        <td><?=$toplamAlinanUrun;?></td>
                                        <td><?=$toplamSatilanUrun;?></td>
                                        <td><?=$toplamKazanilanPara;?></td>
                                        <td>-<?=$toplamKaybedilenPara;?></td>
                                        <td><?=$kalan;?></td>


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
