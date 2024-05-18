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

    public function getProductionCompanies(): false|array
    {
        $conn = $this->getConnection();
        $sql_get_production_companies =
            "SELECT * FROM production_companies;";

        $stmt = $conn->prepare($sql_get_production_companies);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSelectedCompany($company_id)
    {
        $conn = $this->getConnection();
        $sql_get_company =
            "SELECT * FROM production_companies
             WHERE id = :company_id;";

        $stmt = $conn->prepare($sql_get_company);
        $stmt->bindParam(':company_id', $company_id);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, ProductionCompany::class);

        $conn = null;

        return $stmt->fetch();

    }

    public function deleteSelectedCompany($company_id): void
    {
        $conn = $this->getConnection();
        $sql_delete_company =
            "DELETE FROM production_companies
            WHERE id = :company_id;";

        $stmt = $conn->prepare($sql_delete_company);
        $stmt->bindParam(':company_id', $company_id);
        $stmt->execute();
    }

    public function getDirectorById(mixed $director_id)
    {
        $conn = $this->getConnection();
        $sql_get_director =
            "SELECT * FROM directors
             WHERE id = :director_id;";

        $stmt = $conn->prepare($sql_get_director);
        $stmt->bindParam(':director_id', $director_id);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, Director::class);

        $conn = null;

        return $stmt->fetch();

    }

    public function deleteDirectorById($director_id): void
    {
        $conn = $this->getConnection();
        $sql_delete_director =
            "DELETE FROM directors
            WHERE id = :director_id;";

        $stmt = $conn->prepare($sql_delete_director);
        $stmt->bindParam(':director_id', $director_id);
        $stmt->execute();
    }

    public function getFilmById(mixed $film_id)
    {
        $conn = $this->getConnection();
        $sql_get_film =
            "SELECT * FROM films
             WHERE id = :film_id;";

        $stmt = $conn->prepare($sql_get_film);
        $stmt->bindParam(':film_id', $film_id);

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, Film::class);

        $conn = null;

        return $stmt->fetch();
    }

    public function deleteFilmById($film_id): void
    {
        $conn = $this->getConnection();
        $sql_delete_film =
            "DELETE FROM films
            WHERE id = :film_id;";

        $stmt = $conn->prepare($sql_delete_film);
        $stmt->bindParam(':film_id', $film_id);
        $stmt->execute();
    }
}