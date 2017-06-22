<?php

class Password {

    public static function generatePassword() {
        $alpha = "abcdefghijkmnpqrstuvwxyz";
        $chars = $alpha . strtoupper($alpha) . 'L';
        $charLenght = strlen($chars);
        $password = '';
        $desiredLength = htmlentities($_POST['passwordLenght']);
        $numberOption = htmlentities($_POST['number']);
        $lettersOption = htmlentities($_POST['letter']);
        $lLetter = htmlentities($_POST['exclude']);
        if (!empty($desiredLength)) {
            
            //add user picked symbols
            if (!empty($numberOption)) {
                $chars .= '10';
            }
            if (!empty($lettersOption)) {
                $chars .= 'oO';
            }
            if (!empty($lLetter)) {
                $chars .= 'l';
            }
            
            //Pick random string from all available symbols
            for ($i = 0; $i < $desiredLength; $i++) {
                $randomElPos = mt_rand(0, $charLenght - 1);
                $password .= substr($chars, $randomElPos, 1);
                $chars = substr_replace($chars, '', $randomElPos, 1);
            }
            
            //force user picked letter input if not selected before
            if (!empty($numberOption) && !stripos($password, '1')) {
                $password = substr_replace($password, 1, 0, 1);
            }
            if (!empty($numberOption) && !stripos($password, '0')) {
                $password = substr_replace($password, 0, 0, 1);
            }
            if (!empty($lettersOption) && !stripos($password, 'o')) {
                $password = substr_replace($password, 'o', 1, 1);
            }
            if (!empty($lettersOption) && !stripos($password, 'O')) {
                $password = substr_replace($password, 'o', 1, 1);
            }
            if (!empty($lLetter) && !stripos($password, 'l')) {
                $password = substr_replace($password, 'l', 2, 1);
            }
            
            //final string shufling 
            $password = str_shuffle($password);


            return '<div class="password">' . $password . '</div><div class="status">Password generated!</div>';
        }
    }

}
