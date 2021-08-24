<?php

namespace App\Helpers;

class XSS {

    public static function filter($string)
    {
        return htmlspecialchars($string);
    }

}