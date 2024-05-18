<?php

namespace domain;

use PDO;

class Database
{
    public function getConnection()
    {
        $db_host = DB_HOST;
        $db_name = DB_NAME;
        $db_user = DB_USER;
        $db_password = DB_PASS;

        $dsn = "mysql:host=" . $db_host . ";dbname=" . $db_name . ";charset=utf8";

        try {
            $dbh = new PDO($dsn, $db_user, $db_password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            exit;
        }

        return $dbh;
    }

    public function getFilms(): false|array
    {
        $conn = $this->getConnection();
        $sql_get_films =
            "SELECT * FROM films;";

        $stmt = $conn->prepare($sql_get_films);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDirectors(): false|array
    {
        $conn = $this->getConnection();
        $sql_get_directors =
            "SELECT * FROM directors;";

        $stmt = $conn->prepare($sql_get_directors);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductionCompanies()
    {
        $conn = $this->getConnection();
        $sql_get_production_companies =
            "SELECT * FROM production_companies;";

        $stmt = $conn->prepare($sql_get_production_companies);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}