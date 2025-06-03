<?php
class logout extends controller
{
    public function index()
    {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        helper::redirect(SITE_URL);
    }
}