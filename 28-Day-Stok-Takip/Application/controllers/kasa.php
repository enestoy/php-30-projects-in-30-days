<?php
class kasa extends controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,4)){helper::redirect(SITE_URL); die();}
        $data = $this->model('kasaModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('kasa/index',['data'=>$data]);
        $this->render('site/footer');

    }
    public function create()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,4)){helper::redirect(SITE_URL); die();}
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('kasa/create');
        $this->render('site/footer');
    }

    public function send()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,4)){helper::redirect(SITE_URL); die();}
        if($_POST)
        {
            $ad = helper::cleaner($_POST['ad']);
            if($ad!="")
            {
                $insert = $this->model('kasaModel')->create($ad);
                if($insert)
                {
                    helper::flashData("statu","Kasa Başarı ile eklendi");
                    helper::redirect(SITE_URL."/kasa/create/");
                }
                else
                {
                    helper::flashData("statu","Kasa Eklenemedi");
                    helper::redirect(SITE_URL."/kasa/create/");
                }
            }
            else
            {
                helper::flashData("statu","Kasa adı boş bırakılamaz");
                helper::redirect(SITE_URL."/kasa/create/");
            }
        }
        else
        {
            exit("yasaklı giriş");
        }
    }

    public function edit($id)
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,4)){helper::redirect(SITE_URL); die();}
        $data = $this->model('kasaModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('kasa/edit',['data'=>$data]);
        $this->render('site/footer');
    }

    public function update($id)
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,4)){helper::redirect(SITE_URL); die();}
        if($_POST)
        {
            $ad = helper::cleaner($_POST['ad']);
            if($ad!="")
            {
                $insert = $this->model('kasaModel')->updateData($id,$ad);
                if($insert)
                {
                    helper::flashData("statu","Kasa Başarı ile Düzenlendi");
                    helper::redirect(SITE_URL."/kasa/edit/".$id);
                }
                else
                {
                    helper::flashData("statu","Kasa Düzenlenemedi");
                    helper::redirect(SITE_URL."/kasa/edit/".$id);
                }
            }
            else
            {
                helper::flashData("statu","Kasa adı boş bırakılamaz");
                helper::redirect(SITE_URL."/kasa/edit/".$id);
            }
        }
        else
        {
            exit("yasaklı giriş");
        }
    }
    public function delete($id)
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,4)){helper::redirect(SITE_URL); die();}
        $this->model('kasaModel')->getDelete($id);
        helper::redirect(SITE_URL."/kasa");
    }
}