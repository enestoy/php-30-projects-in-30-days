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
                          <h3 class="card-title">Yeni Kullanıcı Oluştur</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form action="<?=SITE_URL;?>/kullanici/send" method="post">
                          <div class="card-body">
                          <div class="form-group">
                                <label for="exampleInputEmail1">Kullanıcı Adı:</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                              
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kullanıcı Email:</label>
                                <input type="text" class="form-control" name="email">
                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Kullanıcı Şifre:</label>
                                <input type="text" class="form-control" name="password">
                            </div>

                            <div class="form-group">
                                <label>İzinler</label>
                                <br>
                                <?php foreach(PERMISSIONS as $key => $value)
                                {
                                    ?>
                                    <input type="checkbox" name="permissions[]" value="<?=$key;?>"> <?=$value;?><br>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Ekle</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </section>
  </div>