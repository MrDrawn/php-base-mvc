<?php

namespace App\Helpers;

class SQLi
{

    public static function filterString($string)
    {
        return preg_replace('/[^[:alpha:]_]/', '', $string);
    }

    public static function filterPassword($password)
    {
        return preg_replace('/[^[:alnum:]_]/', '', $password);
    }

}