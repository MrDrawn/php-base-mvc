<?php

namespace App\Helpers;

class Json {

    private static $json;

    public static function jsonEncode(array $data) {
        header('Content-Type: json');

        self::$json = json_encode($data);
    }

    public static function jsonDecode(array $data) {
        header('Content-Type: json');

        self::$json = json_decode($data);
    }

    public static function send() : string
    {
        return self::$json;
    }

}