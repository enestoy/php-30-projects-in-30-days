<?php
class main extends controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()) { helper::redirect(SITE_URL."/login"); die();}
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('home');
        $this->render('site/footer');
    }
}