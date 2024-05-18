<?php

namespace app\model;

use domain\Database;
use exception\RegistrationExceptionError;
use utils\Data_Validation;

class Film_Model
{
    private Database $db;
    private array $errors;

    public function __construct()
    {
        $this->db = new Database();
        $this->errors = array();
    }

    public function getFilms(): false|array
    {
        return $this->db->getFilms();
    }

    public function getDirectors(): false|array
    {
        return $this->db->getDirectors();
    }

    public function getDirectorById()
    {
        $director_id = $_GET['id'];
        return $this->db->getDirectorById($director_id);
    }

    public function deleteDirector(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_director'])) {
            $director_id = $_GET['id'];
            try {
                $this->db->deleteDirectorById($director_id);
                return true;
            } catch (\Exception $e) {
                echo $e->getMessage();
                $this->errors['post_exception'] = $e->getMessage();
            }
        }
        return false;
    }

    public function getFilmById()
    {
        $film_id = $_GET['id'];
        return $this->db->getFilmById($film_id);
    }

    public function deleteFilm(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_film'])) {
            $film_id = $_GET['id'];
            try {
                $this->db->deleteFilmById($film_id);
                return true;
            } catch (\Exception $e) {
                echo $e->getMessage();
                $this->errors['post_exception'] = $e->getMessage();
            }
        }
        return false;
    }

    public function addDirector()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_director'])) {
            $name = Data_Validation::cleanData($_POST['director-name']);
            $surname = Data_Validation::cleanData($_POST['director-surname']);
            $dob = Data_Validation::cleanData($_POST['director-dob']);
            $accolades = Data_Validation::cleanData($_POST['director-accolades']);
            $oscar = $this->handleRadioBtnInput();

            $this->validateInput($name, $surname, $dob, $accolades);

            if (empty($this->errors)) {
                try {
                    $is_added = $this->db->addDirector($name, $surname, $dob, $accolades, $oscar);
                    Data_Validation::unsetError();

                    if (!$is_added) {
                        throw new RegistrationExceptionError(": internal server error.");

                    } else {
                        return "film";
                    }

                } catch (\Exception $e) {
                    echo $e->getMessage();
                    $this->errors['reg_exception'] = $e->getMessage();
                }
            } else {
                $_SESSION['error'] = $this->errors;
            }
        }
        return "register_director";
    }

    private function handleRadioBtnInput(): int
    {
        if ($_POST['director-oscar'] == 'oscar-true') {
            return 1;
        }
        return 0;
    }

    private function validateInput(string $name, string $surname, string $dob, string $accolades)
    {
        if (strlen($name) < 2) {
            $this->errors["name"] = "Name must be 2 or more characters.";
        }

        if (strlen($surname) < 2) {
            $this->errors["surname"] = "Surname must be 2 or more characters.";
        }

        if (empty($dob)) {
            $this->errors["dob"] = "Valid birthdate is required.";
        } else if (!Data_Validation::validateDate($dob)) {
            $this->errors["dob"] = "A future birthdate is not valid.";
        }

        if (!is_numeric($accolades)) {
            $this->errors["accolades"] = "A valid number is required";
        }
    }

}