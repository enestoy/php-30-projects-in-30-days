<!--<
if(route(0)=='home'){




    view('home/home');
}
-->

<?php

if (route(0) == 'home' && !route(1)){

    $return = model('home', [], 'list');

    view('home/home', $return['data']);
}elseif(route(0) == 'home' && route(1) == 'calendar'){

    view('home/calendar');
}