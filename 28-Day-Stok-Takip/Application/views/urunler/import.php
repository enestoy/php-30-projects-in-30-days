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
                          <h3 class="card-title">Ürün İmport</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form role="form" enctype="multipart/form-data" action="<?=SITE_URL;?>/excel/import" method="post">
                          <div class="card-body">
                          <div class="form-group">
                                <label for="exampleInputEmail1">Ürün Xls:</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Yükle</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </section>
  </div>