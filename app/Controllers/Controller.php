<?php

namespace App\Controllers;

use League\Plates\Engine;

abstract class Controller
{
    protected $view;

    private $extensions = ["php", "phtml", "html"];

    protected $title;
    protected $description;

    protected $router;

    public function __construct(string $folder = null, string $extensions = "phtml")
    {
        $directory = $folder ? $folder : __DIR__ . "/../Views";

        if (!in_array($extensions, $this->extensions)){
            die("Extensão não encontrada! [Controller]");
            return;
        }

        $this->view = Engine::create($directory, $extensions);
    }

    public function setOptions() : Controller
    {
        return $this;
    }

    public function title(string $title) : Controller
    {
        $this->title = $title;

        return $this;
    }

    public function description(string $description) : Controller
    {
        $this->description = $description;

        return $this;
    }
}