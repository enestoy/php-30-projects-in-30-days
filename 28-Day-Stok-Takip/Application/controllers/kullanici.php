<?php
class kullanici extends controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,6)){helper::redirect(SITE_URL); die();}
        $data = $this->model('uyeModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('uyeler/index',['data'=>$data]);
        $this->render('site/footer');
    }

    public function create()
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,6)){helper::redirect(SITE_URL); die();}
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('uyeler/create');
        $this->render('site/footer');
    }

    public function send()
    {
        if($_POST)
        {
            if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
            if(!$this->model('uyeModel')->permission($this->myuserid,6)){helper::redirect(SITE_URL); die();}
            $name = helper::cleaner($_POST['name']);
            $email = helper::cleaner($_POST['email']);
            $password = helper::cleaner($_POST['password']);
            $permissions = $_POST['permissions'];
            if($name!="" and $email!="" and $password!="")
            {

                $insert = $this->model('uyeModel')->create($name,$email,md5($password),implode(',',$permissions));
                if($insert)
                {
                    helper::flashData("statu","Kullanıcı Eklendi");
                    helper::redirect(SITE_URL."/kullanici/create/");
                }
                else
                {
                    helper::flashData("statu","Kullanıcı Eklenemedi");
                    helper::redirect(SITE_URL."/kullanici/create/");
                }

            }
            else
            {
                helper::flashData("statu","Gerekli Alanları doldurunuz");
                helper::redirect(SITE_URL."/kullanici/create/");
            }

        }
        else
        {
            exit("Yasaklı Giriş");
        }
    }

    public function edit($id)
    {
        if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
        if(!$this->model('uyeModel')->permission($this->myuserid,6)){helper::redirect(SITE_URL); die();}
        $data = $this->model('uyeModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('uyeler/edit',['data'=>$data]);
        $this->render('site/footer');
    }

    public function update($id)
    {
        if($_POST)
        {
            if(!$this->sessionManager->isLogged()){helper::redirect(SITE_URL);die();}
            if(!$this->model('uyeModel')->permission($this->myuserid,6)){helper::redirect(SITE_URL); die();}
            $name = helper::cleaner($_POST['name']);
            $email = helper::cleaner($_POST['email']);
            $password = $_POST['password'];
            $permissions = $_POST['permissions'];
            if($name!="" and $email!="")
            {
                if($password == "")
                {
                    $data = $this->model('uyeModel')->getData($id);
                    $password = $data['password'];
                }
                else
                {
                    $password = md5($password);
                }


                $insert = $this->model('uyeModel')->updateData($id,$name,$email,$password,implode(',',$permissions));
                if($insert)
                {
                    helper::flashData("statu","Kullanıcı düzenlendi");
                    helper::redirect(SITE_URL."/kullanici/edit/".$id);
                }
                else
                {
                    helper::flashData("statu","Kullanıcı düzenlendi");
                    helper::redirect(SITE_URL."/kullanici/edit/".$id);
                }


            }
            else
            {
                helper::flashData("statu","Gerekli Alanları doldurunuz");
                helper::redirect(SITE_URL."/kullanici/edit/".$id);
            }

        }
        else
        {
            exit("Yasaklı Giriş");
        }
    }

    public function delete($id)
    {
        if(!$this->model('uyeModel')->permission($this->myuserid,6)){helper::redirect(SITE_URL); die();}
        $delete = $this->model('uyeModel')->getDelete($id);

        helper::redirect(SITE_URL."/kullanici");
    }
}