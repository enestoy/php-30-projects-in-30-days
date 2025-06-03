<?php view('static/header'); ?>
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= URL.'cikis'; ?>" class="nav-link">Çıkış Yap</a>
            </li>
        </ul>
    </nav>
    <?php view('static/sidebar'); ?>
    <div class="content-wrapper p-5">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Yapılacaklar Listenize Ekleyin</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php
                            echo get_session('error')  ? '<div class="alert alert-'.$_SESSION['error']['type'].'">'.$_SESSION['error']['message'].'</div>' : null;
                            ?>

                            <form id="todo" action="" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Kategori Seçiniz</label>
                                        <select class="form-control" id="category_id">
                                            <option value="0">- Kategori Seçimi Yapınız -</option>
                                            <?php foreach ($data as $category): ?>
                                            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Başlık</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Ne yapıyorsunuz?">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Açıklama</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Ne yapıyorsunuz?">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Durum</label>
                                        <select id="status">
                                            <option value="a">Aktif</option>
                                            <option value="p">Pasif</option>
                                            <option value="s">Süreçte</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="progress">İlerleme</label>
                                        <input type="range" class="form-control" id="progress" min="0" max="100">
                                    </div>
                                    <div class="form-group">
                                        <label for="color">Renk Seçiniz</label>
                                        <input type="color" class="form-control" id="color" value="#007bff">
                                    </div>
                                    <div class="form-group">
                                        <label for="start_date">Başlangıç Tarihi</label>
                                        <div class="row">
                                            <input type="date" class="form-control col-8" id="start_date">
                                            <input type="time" class="form-control col-4" id="start_date_time">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">Bitiş Tarihi</label>
                                        <div class="row">
                                            <input type="date" class="form-control col-8" id="end_date">
                                            <input type="time" class="form-control col-4" id="end_date_time">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" value="1" class="btn btn-primary">Ekle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php view('static/footer'); ?>
</div>

<script src="<?= assets('plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?= assets('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= assets('plugins/sweetalert2/sweetalert2.all.js'); ?>"></script>
<script src="<?= assets('js/adminlte.min.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js" integrity="sha512-lTLt+W7MrmDfKam+r3D2LURu0F47a3QaW5nF0c6Hl0JDZ57ruei+ovbg7BrZ+0bjVJ5YgzsAWE+RreERbpPE1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    const todo = document.getElementById('todo');

    let progress = document.getElementById('progress');

    progress.addEventListener('change', (e) => {
        console.log(progress.value);
    })


    todo.addEventListener('submit', (e) => {

        let title = document.getElementById('title').value;
        let description = document.getElementById('description').value;
        let category_id = document.getElementById('category_id').value;
        let color = document.getElementById('color').value;
        let start_date = document.getElementById('start_date').value;
        let end_date = document.getElementById('end_date').value;
        let start_date_time = document.getElementById('start_date_time').value;
        let end_date_time = document.getElementById('end_date_time').value;
        let status = document.getElementById('status').value;
        let progress = document.getElementById('progress').value;

        let formData = new FormData();
        
        formData.append('title',title);
        formData.append('description',description);
        formData.append('category_id',category_id);
        formData.append('color',color);
        formData.append('start_date',start_date);
        formData.append('end_date',end_date);
        formData.append('start_date_time',start_date_time);
        formData.append('end_date_time',end_date_time);
        formData.append('status',status);
        formData.append('progress',progress);

        axios.post('<?= url('api/addtodo') ?>', formData).then(res => {

            if(res.data.redirect){
                window.location.href = res.data.redirect;
            }else{
                Swal.fire(
                    res.data.title,
                    res.data.msg,
                    res.data.status,
                );
            }


            console.log(res)
        }).catch(err => console.log(err))

        e.preventDefault();
    })

</script>
</body>
</html>