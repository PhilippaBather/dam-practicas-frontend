<?php

namespace core;

class Controller
{

    protected $controller = DEFAULT_CONTROLLER;     // Home_Controller
    protected $method = DEFAULT_METHOD;     // renderView()
    protected $params = [];

    public function getView($view, $data = []): void
    {
        require_once dirname((__DIR__)) . "../app/pages/" . $view . ".php";
    }

}