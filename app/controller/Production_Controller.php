<?php

namespace app\controller;

use app\model\Production_Model;
use app\view\Production_View;
use core\Controller;

class Production_Controller extends Controller
{

    private Production_Model $production_model;
    private Production_View $production_view;

    public function __construct()
    {
        $this->production_model = new Production_Model();
        $this->production_view = new Production_View();
    }

    public function renderView(): void
    {
        require_once $this->production_view->render();
    }

}