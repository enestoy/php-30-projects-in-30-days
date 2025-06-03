  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= SITE_URL; ?>" class="brand-link">
      <img src="<?= IMG_PATH; ?>/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SUPER WEB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= IMG_PATH; ?>/profil.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->myuserinfo['name']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php if ($this->model('uyeModel')->permission($this->myuserid, 8)) { ?>
               <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-bell"></i>
                <p>
                  SİPARİŞLER
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/siparis/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Yeni Sipariş Oluştur</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/siparis/" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sipariş Listesi</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php } ?>
          <?php if ($this->model('uyeModel')->permission($this->myuserid, 0)) { ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-clipboard"></i>
                <p>
                  KATEGORİLER
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/category/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Yeni Kategori Oluştur</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/category/" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori Listesi</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php } ?>
          <?php if ($this->model('uyeModel')->permission($this->myuserid, 1)) { ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon 	fas fa-cart-plus"></i>
                <p>
                  ÜRÜNLER
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/urunler/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Yeni Ürün Oluştur</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/urunler/" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ürün Listesi</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php } ?>
          <?php if ($this->model('uyeModel')->permission($this->myuserid, 2)) { ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-handshake"></i>
                <p>
                  Müşteriler
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/musteriler/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Müşteri Oluştur</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/musteriler/" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Müşteri Listesi</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php } ?>
          <?php if ($this->model('uyeModel')->permission($this->myuserid, 3)) { ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Stok
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/stok/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Yeni Stok İşlemi</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/stok/" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stok Listesi</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php } ?>
          <?php  if($this->model('uyeModel')->permission($this->myuserid,4)){ ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                KASA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= SITE_URL; ?>/kasa/create" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Yeni Kasa Oluştur
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= SITE_URL; ?>/kasa/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kasa Listesi</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php  if($this->model('uyeModel')->permission($this->myuserid,5)){ ?>
          <li class="nav-item">

              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-receipt"></i>
                <p>
                Faturalar
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/fatura/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Yeni Fatura Oluştur</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/fatura/" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fatura Listesi</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php } ?>



            <?php  if($this->model('uyeModel')->permission($this->myuserid,7)){ ?>
            <li class="nav-item">

              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-poll"></i>
                <p>
                RAPORLAR
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/rapor/urun" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ürün  Listesi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/rapor/musteri" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Müşteri Listesi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/rapor/KASA" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kasa Raporu</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/rapor/tarih" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tarih Bazlı Raporlama</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php } ?>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas 	fas fa-cog"></i>
              <p>
                Profil
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php  if($this->model('uyeModel')->permission($this->myuserid,6)){ ?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-key"></i>
                <p>
                Kullanıcılar
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/kullanici/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Yeni Kullanıcı Oluştur</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= SITE_URL; ?>/kullanici/" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kullanıcı Listesi</p>
                  </a>
                </li>
              </ul>
            </li>
            <?php } ?>

              <li class="nav-item">
                <a href="<?=SITE_URL;?>/logout" class="nav-link">
                  <i class="fas fa-sign-in-alt nav-icon"></i>
                  <p>
                    Çıkış Yap
                  </p>
                </a>
              </li>
            </ul>
          </li>








        
        
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>