  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-2">

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                  <?php
                    helper::flashDataView("statu");
                    ?>
                  <!-- general form elements -->
                  <div class="card card-primary">
                      <div class="card-header">
                          <h3 class="card-title">Yeni Kasa Oluştur</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form action="<?=SITE_URL;?>/kasa/send" method="post">
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Kasa Adı:</label>
                                  <input type="text" class="form-control" name="ad">
                              </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Ekle</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </section>
  </div>