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

    public function addDirector(): string
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_director'])) {
            $name = Data_Validation::cleanData($_POST['director-name']);
            $surname = Data_Validation::cleanData($_POST['director-surname']);
            $dob = Data_Validation::cleanData($_POST['director-dob']);
            $accolades = Data_Validation::cleanData($_POST['director-accolades']);
            $oscar = $this->handleDirectorRadioBtnInput();

            $this->validateDirectorInput($name, $surname, $dob, $accolades);

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

    public function addFilm(): string
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_film'])) {
            $title = Data_Validation::cleanData($_POST['film-title']);
            $genre = Data_Validation::cleanData($_POST['film-genre']);
            $revenue = Data_Validation::cleanData($_POST['film-revenue']);
            $release_date = Data_Validation::cleanData($_POST['film-release-date']);
            $director_id = Data_Validation::cleanData($_POST['film-director-id']);
            $company_id = Data_Validation::cleanData($_POST['film-company-id']);
            $family_friendly = $this->handleFilmRadioBtnInput();

            $this->validateFilmInput($title, $genre, $revenue, $release_date, $director_id, $company_id);

            $this->checkDirectorExists($director_id);
            $this->checkCompanyExists($company_id);

            if (empty($this->errors)) {
                try {
                    $is_added = $this->db->addFilm($title, $genre, $revenue, $release_date, $family_friendly, $director_id, $company_id);
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
        return "register_film";
    }

    private function handleDirectorRadioBtnInput(): int
    {
        if ($_POST['director-oscar'] == 'oscar-true') {
            return 1;
        }
        return 0;
    }

    private function handleFilmRadioBtnInput(): int
    {
        if ($_POST['film-family-friendly'] == 'friendly-true') {
            return 1;
        }
        return 0;
    }

    private function validateDirectorInput(string $name, string $surname, string $dob, string $accolades): void
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

    private function validateFilmInput(string $title, string $genre, string $revenue, string $release_date, string $director_id, string $company_id): void
    {
        if (strlen($title) < 2) {
            $this->errors["title"] = "Title must be 2 or more characters.";
        }

        if (strlen($genre) < 2) {
            $this->errors["genre"] = "A genre must be 2 or more characters.";
        }

        if (empty($revenue)){
            $this->errors["revenue"] = "Revenue must be entered.";
        } else if (!is_numeric($revenue)) {
            $this->errors["revenue"] = "A valid number is required";
        }

        if (empty($release_date)) {
            $this->errors["release"] = "Valid release date is required.";
        } else if (!Data_Validation::validateDate($release_date)) {
            $this->errors["release"] = "A future release date is not valid.";
        }

        if (empty($director_id)) {
            $this->errors['director-id'] = "A Director ID is required.";
        } else if (!is_numeric($director_id)) {
            $this->errors['director-id'] = "The Director's ID must be a number.";
        }

        if (empty($company_id)) {
            $this->errors['company-id'] = "A Production Company ID is required.";
        } else if (!is_numeric($director_id)) {
            $this->errors['company-id'] = "The Production Company's ID must be a number.";
        }

    }

    private function checkDirectorExists($id): void
    {
        $director = $this->db->getDirectorById($id);
        if ($director == null) {
            $this->errors['director-id'] = "Director ID not valid";
        }
    }

    private function checkCompanyExists($id): void
    {
        $company = $this->db->getCompanyById($id);
        if ($company == null) {
            $this->errors['company-id'] = "Production Company ID not valid";
        }
    }

}