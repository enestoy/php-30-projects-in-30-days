<?php

if (get_session('login') && get_session('login') == true) redirect('home');

if (route(0) == 'login'){

    if (isset($_POST['submit'])){
        $_SESSION['post'] = $_POST;
        $eposta = post('eposta');
        $sifre = post('sifre');

        $return = model('auth/login',['email' => $eposta, 'password' => $sifre], 'login');

        if ($return['success'] == true){
            if (isset($return['redirect'])){
                redirect($return['redirect']);
            }
        }else{
            add_session('error',[
                'message' => $return['message'] ?? '',
                'type' => $return['type'] ?? ''
            ]);

        }
    }

    view('auth/login');
}
?>