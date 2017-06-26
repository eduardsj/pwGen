<?php

class Password {

    public static function generatePassword() {
        $letters = 'qwertyuiopasdfghjklzxcvbnm';
        $capitalLetters = strtoupper($letters);
        $numbers = '1234567890';
        $chars = '';
        $password = '';
        $desiredLength = htmlentities($_POST['passwordLenght']);
        $numberOption = htmlentities($_POST['number']);
        $lettersCapitalOption = htmlentities($_POST['lettersCapital']);
        $lettersOption = htmlentities($_POST['letters']);
        if (!empty($desiredLength)) {
            
            //add options requuired symbols sets
            if (!empty($numberOption) && $numberOption === 'number') {
                $chars .= $numbers;
            }
            if (!empty($lettersCapitalOption) && $lettersCapitalOption === 'lettersCapital') {
                $chars .= $capitalLetters;
            }
            if (!empty($lettersOption) && $lettersOption === 'letters') {
                $chars .= $numbers;
            }
            
            $chars = str_shuffle($chars);
            
            $charLenght = strlen($chars);
            
            //Pick random string from all available symbols
            for ($i = 0; $i < $desiredLength; $i++) {
                $randomElPos = mt_rand(0, $charLenght - 1);
                $password .= substr($chars, $randomElPos, 1);
                $chars = substr_replace($chars, '', $randomElPos, 1);
            }            
            
            //Force password string contain user picked option related characters if didnt contain
            if (!empty($numberOption) && $numberOption === 'number' && strpbrk($password, $numbers) === false){
                $password = substr_replace($password, substr($numbers, mt_rand(0, sizeof($numbers) - 1), 1) , 0, 1);
            }
            if (!empty($lettersCapitalOption) && $lettersCapitalOption === 'lettersCapital' && strpbrk($password, $capitalLetters) === false){                
                $password = substr_replace($password, substr($capitalLetters, mt_rand(0, sizeof($capitalLetters) - 1), 1) , 1, 1);
            }
            if (!empty($lettersOption) && $lettersOption === 'letters' && strpbrk($password, $letters) === false){  
                $password = substr_replace($password, substr($letters, mt_rand(0, sizeof($letters) - 1), 1) , 2, 1);
            }
            
            //final string shufling 
            $password = str_shuffle($password);


            return '<div class="password">' . $password . '</div><div class="status">Password generated!</div>';
        }
    }

}
