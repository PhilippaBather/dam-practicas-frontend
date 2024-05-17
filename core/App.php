<?php

namespace core;

use utils\Data_Validation;

class App
{
    protected $controller = DEFAULT_CONTROLLER;     // Film_Controller
    protected $method = DEFAULT_METHOD;     // renderView()
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if (!empty($url)) {
            $this->controller = ucfirst($url[0]) . "_Controller";

            if (file_exists(CONTROLLER_PATH . $this->controller . '.php')) {
                $this->controller = CONTROLLER_CLASS_NAME . $this->controller;
                unset($url[0]);
            }
        }

        require_once "../" . $this->controller . '.php';
        $this->controller = new $this->controller;

        $this->params = $url ? array_values($url) : [];

        Data_Validation::unsetError();
        // callback function to invoke the controller and required method
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    /**
     * Parse the URL and return the specified action
     * @return array|null
     */
    private function parseUrl(): ?array
    {

        if (isset($_GET['action'])) {
            return (explode('/', trim(filter_var(rtrim($_GET['action'], '/')), FILTER_SANITIZE_URL)));
        }
        return null;
    }
}