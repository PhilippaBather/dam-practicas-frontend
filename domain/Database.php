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

    public function getCompanyById($company_id)
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

    public function deleteCompanyById($company_id): void
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

    public function addProductionCompany($name, $location, $revenue, $established, $active): bool
    {
        $conn = $this->getConnection();
        $established = date("y-m-d");
        $sql =
            "INSERT INTO production_companies (active, established, location, name, revenue)
            VALUES (:active, :established, :location, :name, :revenue)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":active", $active);
        $stmt->bindValue(":established", $established);
        $stmt->bindValue(":location", $location);
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":revenue", $revenue);

        $conn = null;

        return $stmt->execute();
    }

    public function addDirector($name, $surname, $dob, $accolades, $oscar): bool
    {
        $conn = $this->getConnection();
        $dob = date("y-m-d");
        $sql =
            "INSERT INTO directors (accolades, birthdate, name, oscar, surname)
            VALUES (:accolades, :birthdate, :name, :oscar, :surname)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":accolades", $accolades);
        $stmt->bindValue(":birthdate", $dob);
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":oscar", $oscar);
        $stmt->bindValue(":surname", $surname);

        $conn = null;

        return $stmt->execute();
    }

    public function addFilm($title, $genre, $revenue, $release_date, $family_friendly, $director_id, $production_id): bool
    {
        $conn = $this->getConnection();
        $release_date = date("y-m-d");
        $sql =
            "INSERT INTO films (family_friendly, genre, release_date, revenue, title, director_id, production_company_id)
            VALUES (:family_friendly, :genre, :release_date, :revenue, :title, :director_id, :production_company_id)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":family_friendly", $family_friendly);
        $stmt->bindValue(":genre", $genre);
        $stmt->bindValue(":release_date", $release_date);
        $stmt->bindValue(":revenue", $revenue);
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":director_id", $director_id);
        $stmt->bindValue(":production_company_id", $production_id);

        $conn = null;

        return $stmt->execute();
    }
}