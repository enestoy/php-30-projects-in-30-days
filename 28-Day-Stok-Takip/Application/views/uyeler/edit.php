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
                          <h3 class="card-title">Kullanıcı Düzenle</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form action="<?= SITE_URL; ?>/kullanici/update/<?= $params['data']['id']; ?>" method="post">
                          <div class="card-body">

                              <div class="form-group">
                                  <label for="exampleInputEmail1">Kullanıcı Adı:</label>
                                  <input type="text" class="form-control" name="name" value="<?= $params['data']['name']; ?>">
                              </div>



                              <div class="form-group">
                                  <label for="exampleInputEmail1">Kullanıcı Email:</label>
                                  <input type="text" class="form-control" name="email" value="<?= $params['data']['email']; ?>">
                              </div>




                              <div class="form-group">
                                  <label for="exampleInputEmail1">Kullanıcı Şifre:</label>
                                  <input type="text" class="form-control" name="password">
                              </div>


                              <div class="form-group">
                                  <label>İzinler</label>
                                  <br>
                                  <?php foreach (PERMISSIONS as $key => $value) {
                                    ?>
                                      <input type="checkbox" <?php if (in_array($key, explode(',', $params['data']['permission']))) {
                                                                    echo 'checked';
                                                                } ?> name="permissions[]" value="<?= $key; ?>"> <?= $value; ?><br>
                                  <?php
                                    }
                                    ?>
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