<?php
class rapor extends controller
{
    public function urun()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,7)){helper::redirect(SITE_URL); die();}
        $data = $this->model('urunlerModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('rapor/urun/index',['data'=>$data]);
        $this->render('site/footer');
    }


    public function musteri()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,7)){helper::redirect(SITE_URL); die();}
        $data = $this->model('musterilerModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('rapor/musteri/index',['data'=>$data]);
        $this->render('site/footer');
    }

    public function tarih()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,7)){helper::redirect(SITE_URL); die();}
        if(isset($_GET['firstDate']) and isset($_GET['secondDate']))
        {
            $data = $this->model('raporModel')->filtrele($_GET['firstDate'],$_GET['secondDate']);
        }
        else
        {
            $data = $this->model('raporModel')->filtrele(date("Y-m-01"),date("Y-m-d"));
        }


        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('rapor/tarih/index',['data'=>$data]);
        $this->render('site/footer');
    }
    public function kasa()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,7)){helper::redirect(SITE_URL); die();}
        $data = $this->model('kasaModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('rapor/kasa/index',['data'=>$data]);
        $this->render('site/footer');
    }
}