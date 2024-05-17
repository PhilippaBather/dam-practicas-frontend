<?php

namespace app\model;

use domain\Database;

class Production_Model
{

    private Database $db;
    private array $errors;
    public function __construct()
    {
        $this->db = new Database();
        $this->errors = array();
    }


    public function getProductionCompanies(): false|array
    {
        return $this->db->getProductionCompanies();
    }

    public function getSelectedCompany()
    {
        $company_id = $_GET['id'];
        return $this->db->getSelectedCompany($company_id);
    }

    public function deleteCompany(): bool
    {

        // Data_Validation::unsetError(); // de-establece el array de errores

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_company'])) {
            $company_id = $_GET['id'];
            try {
                $db = new Database();
                $db->deleteSelectedCompany($company_id);
                return true;
            } catch (\Exception $e) {
                echo $e->getMessage();
                $this->errors['post_exception'] = $e->getMessage();
            }
        }
        return false;
    }
}