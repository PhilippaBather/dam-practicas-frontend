<?php

namespace app\controller;

use core\Controller;
use app\model\Film_Model;
use app\view\Film_View;

class Film_Controller extends Controller
{

    private Film_View $film_view;
    private Film_Model $film_model;


    public function __construct()
    {
        $this->film_view = new Film_View();
        $this->film_model = new Film_Model();
    }


    public function renderView(): void
    {
        require_once $this->film_view->render();
    }


}