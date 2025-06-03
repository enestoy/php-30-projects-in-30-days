<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>İletişim Formu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            font-family: 'Segoe UI', sans-serif;
        }

        .contact-form {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            padding: 40px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .icon {
            color: #0d6efd;
            margin-right: 10px;
        }
    </style>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="ajax.js"></script>

</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">


                <div id="mesajsonuc" class="text-center text-success bg-light lead"></div>
                <div id="formtutucu">
                    <div id="mailform" class="php-email-form">
                        <h2 class="mb-4 text-center">İletişim Formu</h2>
                      
                        
                            <div class="mb-3">
                                <label class="form-label"><i class="fa-solid fa-user icon"></i>Ad Soyad</label>
                                <input type="text" name="isim" id="isim" class="form-control" placeholder="Adınızı ve soyadınızı yazınız" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fa-solid fa-envelope icon"></i>Email</label>
                                <input type="email" name="mail" id="mail" class="form-control" placeholder="E-posta adresiniz" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fa-solid fa-pen icon"></i>Konu</label>
                                <input type="text" name="konu" id="konu" class="form-control" placeholder="Mesaj konusu" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><i class="fa-solid fa-message icon"></i>Mesajınız</label>
                                <textarea name="mesaj" class="form-control" rows="5" placeholder="Mesajınızı buraya yazınız" required></textarea>
                            </div>
                            <button class="btn btn-primary w-100" type="submit" id="gonderbtn">Gönder</button>
                            
                      
                            
                    </div>
                </div>


            </div>
        </div>
    </div>

</body>

</html>