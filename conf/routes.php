<?php

function call($controller, $action) {
    // require the file that matches the controller name
    require_once('controller/' . $controller . '_controller.php');

    // create a new instance of the needed controller
    switch ($controller) {
        case 'pages':
            require_once('model/password.php');
            $controller = new PagesController();
            break;
    }

    // call the action
    $controller->{ $action }();
}

//Existing and allowed controllers and page addresses
$controllers = array('pages' => ['home', 'error']);

//manage 
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
