<?php

use CoffeeCode\Router\Router;
use Config\Config;

$router = new Router(Config::APP_ROOT);

$router->namespace('App\Controllers');

$router->get("/", "Website:home", "website.home");

$router->dispatch();

function getUrl() {
    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

if ($router->error()){
    print_r($router->error());
}
