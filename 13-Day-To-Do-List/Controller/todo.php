<?php

if (!get_session('login') || get_session('login') != true) redirect('login');

if (route(0) == 'categories' && !route(1)){

    /*if (isset($_POST['submit'])){
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
    }*/

    view('categories/home');
}

elseif (route(0) == 'todo' && route(1) == 'add'){
    $return = model('categories', [], 'list');
    view('todo/add', $return['data']);
}

elseif (route(0) == 'todo' && route(1) == 'list'){

    $return = model('todo', [], 'list');

    view('todo/list', $return['data']);
}

elseif (route(0) == 'todo' && route(1) == 'edit' && is_numeric(route(2))){

    $return = model('todo', ['id' => route(2)], 'getsingle');

    view('todo/edit', $return['data']);
}