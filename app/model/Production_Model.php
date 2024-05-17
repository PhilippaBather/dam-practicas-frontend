<?php

namespace app\model;

use domain\Database;

class Production_Model
{

    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    public function getProductionCompanies(): false|array
    {
        return $this->db->getProductionCompanies();
    }
}