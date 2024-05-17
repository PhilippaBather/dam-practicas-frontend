<?php

namespace core;

class Controller
{

    protected $controller = DEFAULT_CONTROLLER;     // Home_Controller
    protected $method = DEFAULT_METHOD;     // renderView()
    protected $params = [];

    const SUBFOLDER = "/dam-practicas-frontend/public/";

    public function getView($view, $data = []): void
    {
        require_once dirname((__DIR__)) . "../app/pages/" . $view . ".php";
    }

    public function redirect($action, $extraParams = ""): void
    {
        if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] != "off") {
            $protocol = "https";
        } else {
            $protocol = "http";
        }
        header("Location: $protocol://" . $_SERVER["HTTP_HOST"] . Controller::SUBFOLDER . "index.php?action=". $action . $extraParams);
    }

}