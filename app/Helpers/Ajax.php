<?php

namespace App\Helpers;

use Config\Config;

class Ajax
{

    public static function check()
    {
        return strpos($_SERVER['HTTP_REFERER'], Config::APP_DOMAIN);
    }

}