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
        $production_companies = $this->production_model->getProductionCompanies();
        $is_added = $this->production_model->addProductionCompany();

        $isDeleted = $this->production_model->deleteCompany();

        if ($isDeleted | $is_added == 'production') {
            $this->redirect('production', null);
        }

        if (isset($_GET['method']) && $_GET['method'] == 'update-company') {
            $company = $this->production_model->getSelectedCompany();
            $this->getView("delete_company", $company);
        } else if ((isset($_GET['method']) && $_GET['method'] == 'add-company')) {
            $this->getView('register_company');
        } else {
            require_once $this->production_view->render();
        }
    }

}