<?php

namespace app\model;

use domain\Database;
use exception\RegistrationExceptionError;
use utils\Data_Validation;

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

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_company'])) {
            $company_id = $_GET['id'];
            try {
                $db = new Database();
                $db->deleteSelectedCompany($company_id);
                return true;
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
        return false;
    }

    public function addProductionCompany(): string
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_company'])) {
            $name = Data_Validation::cleanData($_POST['production-name']);
            $location = Data_Validation::cleanData($_POST['production-location']);
            $revenue = Data_Validation::cleanData($_POST['production-revenue']);
            $established = Data_Validation::cleanData($_POST['production-est']);
            $active = $this->handleRadioBtnInput();

            $this->validateInput($name, $location, $revenue, $established);

            if (empty($this->errors)) {
                try {
                    $is_added = $this->db->addProductionCompany($name, $location, $revenue, $established, $active);
                    Data_Validation::unsetError();

                    if (!$is_added) {
                        throw new RegistrationExceptionError(": internal server error.");

                    } else {
                        return "production";
                    }

                } catch (\Exception $e) {
                    echo $e->getMessage();
                    $this->errors['reg_exception'] = $e->getMessage();
                }
            } else {
                $_SESSION['error'] = $this->errors;
            }
        }
        return "register_company";
    }

    private function handleRadioBtnInput(): bool
    {
        if ($_POST['production-active'] == 'active-true') {
            return 1;
        }

        return 0;
    }


    private function validateInput(string $name, string $location, string $revenue, string $established): void
    {
        if (strlen($name) < 2) {
            $this->errors["name"] = "Name must be 2 or more characters.";
        }

        if (strlen($location) < 2) {
            $this->errors["location"] = "Location must be 2 or more characters.";
        } else if (ctype_alpha($location)) {
            $this->errors["location"] = "Location must consist of characters not numbers.";
        }

        if (!is_numeric($revenue)) {
            $this->errors["revenue"] = "Revenue must consist of numbers only.";
        } else if (empty($revenue)) {
            $this->errors["revenue"] = "Revenue must be entered.";
        }

        if (empty($established)) {
            $this->errors["established"] = "Valid date is required.";
        } else if (!Data_Validation::validateDate($established)) {
            $this->errors["established"] = "A future date is not valid.";
        }

    }
}