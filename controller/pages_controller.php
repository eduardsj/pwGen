<?php

class PagesController {
    
    public function home() {
        $list = Password::generatePassword();
        require_once('views/pages/home.php');
    }

    public function error() {
        require_once('views/pages/error.php');
    }

}
