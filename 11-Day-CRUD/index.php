
<?php 

if (isset($_GET['success'])): ?>
  <div class="alert alert-success">Kullanıcı başarıyla eklendi.</div>
<?php endif; 

if (isset($_GET['deleted'])): ?>
  <div class="alert alert-danger">Kullanıcı silindi.</div>
<?php endif; 


?>



<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kullanıcı Yönetimi - CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="mb-4">Kullanıcı Ekle</h2>
  <form action="create.php" method="POST" class="row g-3">
    <div class="col-md-4">
      <input type="text" name="name" class="form-control" placeholder="Ad Soyad" required>
    </div>
    <div class="col-md-4">
      <input type="email" name="email" class="form-control" placeholder="E-Posta" required>
    </div>
    <div class="col-md-4">
      <input type="password" name="password" class="form-control" placeholder="Şifre" required>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Ekle</button>
    </div>
  </form>

  <hr class="my-5">

  <h2 class="mb-4">Kullanıcı Listesi</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Ad Soyad</th>
        <th>E-Posta</th>
        <th>Kayıt Tarihi</th>
        <th>İşlemler</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // db bağlantısı
      $conn = new mysqli("localhost", "root", "", "php_crud");
      $query = "SELECT * FROM users ORDER BY id ASC";
      $result = $conn->query($query);
      if ($result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
      ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= $row['created_at'] ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Düzenle</a>
          <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Silmek istediğine emin misin?')" class="btn btn-sm btn-danger">Sil</a>
        </td>
      </tr>
      <?php endwhile; else: ?>
      <tr><td colspan="5" class="text-center">Kayıt bulunamadı.</td></tr>
      <?php endif; $conn->close(); ?>
    </tbody>
  </table>
</div>
</body>
</html>
