<?php

namespace App\Helpers;

class XSRF
{

    public function getTokenID()
    {
        if(isset($_SESSION['token_id']))
        {
            return $_SESSION['token_id'];
        }

        $token_id = $this->random();
        $_SESSION['token_id'] = $token_id;

        return $token_id;
    }

    public function getToken()
    {
        if(isset($_SESSION['token_value']))
        {
            return $_SESSION['token_value'];
        }

        $token = hash('sha256', $this->random(256));
        $_SESSION['token_value'] = $token;

        return $token;
    }

    public function check($method) {
        if(isset($method[$this->getTokenID()]) && ($method[$this->getTokenID()] == $this->getToken())) {
            return true;
        }
        return false;
    }

    public function inputs($names, $regenerate) {

        $values = [];

        foreach ($names as $n) {

            if($regenerate == true) {
                unset($_SESSION['input-'.$n]);
            }

            $s = isset($_SESSION['input-'.$n]) ? $_SESSION['input-'.$n] : $this->random();

            $_SESSION['input-'.$n] = $s;
            $values['input-'.$n] = $this->protectMySQL($s);
        }

        return $values;
    }

    public function clear()
    {
        unset($_SESSION['token_id']);
        unset($_SESSION['token_value']);

        foreach ($_SESSION as $key => $value)
        {
            if(strpos($key, 'input-') !== false)
                unset($_SESSION[$key]);
        }
    }

    public function getInputs()
    {
        $inputs = [];

        foreach ($_SESSION as $key => $value)
        {
            if(strpos($key, 'input-') !== false)
                $inputs[$key] = $value;
        }

        return $inputs;
    }

    private function random($size = 10)
    {
        $lettersMin = 'abcdefghijklmnopqrstuvwxyz';
        $lettersMax = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '1234567890';
        $symbols = '!@#$%*-';

        $callback = '';

        $words = '';
        $words .= $lettersMin;
        $words .= $lettersMax;
        $words .= $numbers;
        $words .= $symbols;

        $length = strlen($words);
        for ($n = 1; $n <= $size ; $n++) {

            $rand = mt_rand(1, $length);
            $callback .= $words[$rand-1];

        }

        return $callback;
    }

    private function protectMySQL($str)
    {
        return addslashes(strip_tags($str));
    }

}