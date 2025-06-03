<?php
class siparis extends controller
{
    public function index()
    {
        //if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL); die();}
        $data = $this->model('siparisModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('siparis/index',['data'=>$data]);
        $this->render('site/footer');
    }


    public function create()
    {
        //if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL); die();}
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('siparis/create');
        $this->render('site/footer');
    }

    public function send()
    {
        if($_POST) {
            //if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
            if(!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL); die();}

            $musteri_id = intval($_POST['musteri_id']);
            $firma_adi = helper::cleaner($_POST['firma_adi']);
            $tarih = $_POST['tarih'];
            $fiyat = $_POST['fiyat'];
            $urun = $_POST['urun'];
            $urun = json_encode($urun);
            $no = $_POST['no'];
            $create = $this->model('siparisModel')->create($musteri_id,$firma_adi,$this->myuserid,$tarih,$fiyat,$urun,$no);
            if($create)
            {
                helper::flashData("statu","Sipariş Eklendi");
                helper::redirect(SITE_URL."/siparis/create");
            }
            else
            {
                helper::flashData("statu","Sipariş Eklenemedi");
                helper::redirect(SITE_URL."/siparis/create");
            }
        }
        else
        {
            exit("yasaklı giriş");
        }

    }

    public function edit($id)
    {
        //if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL); die();}
        $data = $this->model('siparisModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('siparis/edit',['data'=>$data]);
        $this->render('site/footer');
    }


    public function update($id)
    {
        if($_POST) {
            //if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
            if(!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL); die();}

            $musteri_id = intval($_POST['musteri_id']);
            $firma_adi = helper::cleaner($_POST['firma_adi']);
            $tarih = $_POST['tarih'];
            $fiyat = $_POST['fiyat'];
            $urun = $_POST['urun'];
            $urun = json_encode($urun);
            $no = $_POST['no'];
            $create = $this->model('siparisModel')->updateData($id,$musteri_id,$firma_adi,$tarih,$fiyat,$urun,$no);
            if($create)
            {
                helper::flashData("statu","Sipariş düzenlendi");
                helper::redirect(SITE_URL."/siparis/edit/".$id);
            }
            else
            {
                helper::flashData("statu","Sipariş Düzenlenemedi");
                helper::redirect(SITE_URL."/siparis/edit/".$id);
            }
        }
        else
        {
            exit("yasaklı giriş");
        }
    }

    public function delete($id)
    {
/*         if (!$this->sessionManager->isLogged()) {
            helper::redirect(SITE_URL);
            die();
        } */
        if(!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL); die();}
        $delete = $this->model('siparisModel')->deleteData($id);
        helper::redirect(SITE_URL . "/siparis");

    }

    public function getUrunList()
    {
        $x = $this->model('urunlerModel')->listview();
        echo json_encode($x);
    }

    public function detail($id)
    {
        //if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,0)){helper::redirect(SITE_URL); die();}
        $data = $this->model('siparisModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $musteriRow = $this->model('musterilerModel')->getData($data['musteri_id']);
        $this->render('siparis/detail',['data'=>$data,'musteri'=>$musteriRow]);
        $this->render('site/footer');
    }
}