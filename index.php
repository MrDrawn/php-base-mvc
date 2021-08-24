<?php

@session_start();

require_once __DIR__."/vendor/autoload.php";
require __DIR__ . "/app/Libraries/Routes.php";

use config\Config;

const APP_NAME = Config::APP_NAME;
const APP_DOMAIN = Config::APP_DOMAIN;
const APP_ROOT = Config::APP_ROOT;