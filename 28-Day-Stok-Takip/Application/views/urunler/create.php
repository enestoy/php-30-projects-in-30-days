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
                          <h3 class="card-title">Yeni Ürün Oluştur</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form action="<?=SITE_URL;?>/urunler/send" method="post">
                          <div class="card-body">
                          <div class="form-group">
                                <label for="exampleInputEmail1">Ürün Adı:</label>
                                <input type="text" class="form-control" name="ad">
                            </div>
                          <div class="form-group">
                                <label>Ürün Kategorisi:</label>
                                <select name="kategoriId" class="form-control" id="">
                                    <?php foreach ($params['category'] as $key => $value)
                                    {
                                        ?>
                                        <option value="<?=$value['id'];?>"><?=$value['ad'];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="display: block">Ürün Özellikleri</label>
                                <button id="yeniEkle" class="btn btn-info" type="button">Yeni Özellik Ekle</button>
                                <div id="urunOzellikAlani"></div>
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

<script src="<?=PLUGIN_PATH;?>/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var i = $(".selectOzellik").length;
        $("#yeniEkle").click(function () {
            var temp ='<div class="col-md-6"><label>Ürün Özellik Adı:</label><input  type="text" class="form-control selectOzellik" name="ozellik['+i+'][name]"></div>' +
                '<div class="col-md-6"><label>Ürün Özellik Degeri:</label><input type="text" class="form-control" name="ozellik['+i+'][value]"></div>';
            $("#urunOzellikAlani").append(temp)
            i++;
        })
    })
</script>