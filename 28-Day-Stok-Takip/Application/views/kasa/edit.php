  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

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
                          <h3 class="card-title">"<?=$params['data']['ad'];?>" Düzenle</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form action="<?=SITE_URL;?>/kasa/update/<?=$params['data']['id'];?>" method="post">
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Kasa Adı:</label>
                                  <input type="text" class="form-control" name="ad" value="<?=$params['data']['ad'];?>">
                              </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Düzenle</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </section>
  </div>