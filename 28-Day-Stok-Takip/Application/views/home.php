  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-center">STOK TAKİP SİSTEMİ</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $this->model('raporModel')->toplamGelir(); ?></h3>

                <p>Toplam Gelir</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Detaylı Bilgi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $this->model('raporModel')->toplamGider(); ?></h3>

                <p>Toplam Gider</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Detaylı Bilgi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $this->model('raporModel')->toplamGelir() - $this->model('raporModel')->toplamGider(); ?></h3>

                <p>Kalan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Detaylı Bilgi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-12  mt-3 connectedSortable">
            <h3 class="text-center"><b class="text-primary">Süper Web Yazılım</b> yanınızdaysa
              <b class="text-danger">stok takibi</b> çok daha kârlı
            </h3>
            <p class="lead text-center">Stoklarınızı tek ekrandan bir bakışta görün, maliyetleri düşürürken kârınızı yükseltin.</p>
            <!-- /.card -->
          </div>
                <div class="col-md-8 offset-md-2">
                    <form action="" method="post">
                        <div class="input-group input-group-lg">
                            <input type="search" name="ad" class="form-control form-control-lg" placeholder="Hızlı Ürün Ara" >
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">

                                
                                <?php
                                if($_POST)
                                {
                                   $data = $this->model('urunlerModel')->ara($_POST['ad']);
                                   if(count($data)!=0)
                                   {?>
                                        <table class="table table-hover table-primary">
                                            <tr>
                                                <th>ID</th>
                                                <th>Ad</th>
                                                <th>Stok Giriş</th>
                                                <th>Stok Çıkış</th>
                                                <th>Stok Kalan</th>
                                            </tr>
                                       <?php
                                       foreach($data as $key => $value)
                                       {
                                           $girenAdet = $this->model('raporModel')->girenUrunAdet($value['id']);
                                           $cikanAdet = $this->model('raporModel')->cikanUrunAdet($value['id']);
                                           ?>
                                            <tr>
                                                <td><?=$value['id'];?></td>
                                                <td><?=$value['ad'];?></td>
                                                <td><?=$girenAdet;?></td>
                                                <td><?=$cikanAdet;?></td>
                                                <td><?=$girenAdet-$cikanAdet;?></td>
                                            </tr>

                                    <?php
                                       }
                                       ?>
                                        </table>
                                   <?php
                                   }
                                }
                            ?>

                </div>
            </div>
        </div>
    </section>
  </div>

  </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->