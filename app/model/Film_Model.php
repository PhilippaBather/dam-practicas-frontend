<?php

namespace app\model;

use domain\Database;

class Film_Model
{
    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getFilms(): false|array
    {
        return $this->db->getFilms();
    }

    public function getDirectors(): false|array
    {
        return $this->db->getDirectors();
    }

}