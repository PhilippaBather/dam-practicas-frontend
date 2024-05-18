<?php

namespace app\model;

use domain\Database;

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

}