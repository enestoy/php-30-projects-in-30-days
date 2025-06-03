<?php

class urunler extends controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,1)){helper::redirect(SITE_URL); die();}
        $data = $this->model('urunlerModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('urunler/index',['data'=>$data]);
        $this->render('site/footer');
    }


    public function create()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,1)){helper::redirect(SITE_URL); die();}
        $category = $this->model('categoryModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('urunler/create',['category'=>$category]);
        $this->render('site/footer');
    }


    public function send()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,1)){helper::redirect(SITE_URL); die();}
        if($_POST)
        {
            $ad = helper::cleaner($_POST['ad']);
            $kategoriId = intval($_POST['kategoriId']);
            $ozellikler = json_encode($_POST['ozellik']);
            if($ad!="")
            {
                $insert = $this->model('urunlerModel')->create($ad,$kategoriId,$ozellikler);
                if($insert)
                {
                    helper::flashData("statu","Ürün Başarı ile eklendi");
                    helper::redirect(SITE_URL."/urunler/create");
                }
                else
                {
                    helper::flashData("statu","Ürün Eklenemedi");
                    helper::redirect(SITE_URL."/urunler/create");
                }
            }
            else
            {
                helper::flashData("statu","Ürün adı boş bırakılamaz");
                helper::redirect(SITE_URL."/urunler/create");
            }


        }
        else
        {
            exit("yasaklı giriş");
        }
    }

    public function edit($id)
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,1)){helper::redirect(SITE_URL); die();}
        $category = $this->model('categoryModel')->listview();
        $data = $this->model('urunlerModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('urunler/edit',['category'=>$category,'data'=>$data]);
        $this->render('site/footer');
    }



    public function update($id)
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,1)){helper::redirect(SITE_URL); die();}
        if($_POST)
        {
            $ad = helper::cleaner($_POST['ad']);
            $kategoriId = intval($_POST['kategoriId']);
            $ozellikler = json_encode($_POST['ozellik']);
            if($ad!="")
            {
                $insert = $this->model('urunlerModel')->updateData($id,$ad,$kategoriId,$ozellikler);
                if($insert)
                {
                    helper::flashData("statu","Ürün Başarı ile Düzenlendi");
                    helper::redirect(SITE_URL."/urunler/edit/".$id);
                }
                else
                {
                    helper::flashData("statu","Ürün Eklenemedi");
                    helper::redirect(SITE_URL."/urunler/edit/".$id);
                }
            }
            else
            {
                helper::flashData("statu","Ürün adı boş bırakılamaz");
                helper::redirect(SITE_URL."/urunler/edit/".$id);
            }


        }
        else
        {
            exit("yasaklı giriş");
        }
    }

    public function delete($id)
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL); die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,1)){helper::redirect(SITE_URL); die();}
        $this->model('urunlerModel')->getDelete($id);
        helper::redirect(SITE_URL."/urunler");
    }



}