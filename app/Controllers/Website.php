<?php

namespace App\Controllers;

use Config\Config;

class Website extends Controller
{
    public function __construct($router)
    {
        parent::__construct(null, "phtml");

        $this->view->addData(["router" => $router]);
    }

    public function home() : void
    {
        $this->setOptions()
            ->title(Config::APP_NAME . " - Página Inicial")
            ->description("A descrição desta página.");

        echo $this->view->render("website/home", [
            "options" => [
                "title" => $this->title,
                "description" => $this->description
            ],
        ]);
    }

    public function test() : void
    {
        echo "Bem-vindo a teste!";
    }

}