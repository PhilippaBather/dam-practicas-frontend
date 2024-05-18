<?php

namespace app\controller;

use core\Controller;
use app\model\Film_Model;
use app\view\Film_View;

class Film_Controller extends Controller
{

    private Film_View $film_view;
    private Film_Model $film_model;


    public function __construct()
    {
        $this->film_view = new Film_View();
        $this->film_model = new Film_Model();
    }


    public function renderView(): void
    {
        $films = $this->film_model->getFilms();
        $directors = $this->film_model->getDirectors();

        $isDirectorDeleted = $this->film_model->deleteDirector();
        $isFilmDeleted = $this->film_model->deleteFilm();

        $is_director_added = $this->film_model->addDirector();
        $is_film_added = $this->film_model->addFilm();

        if ($isDirectorDeleted | $isFilmDeleted | $is_director_added == 'film' | $is_film_added == 'film') {
            $this->redirect('film', null);
        }

        if (isset($_GET['method']) && $_GET['method'] == 'delete-director') {
            $director = $this->film_model->getDirectorById();
            $this->getView("delete_director", $director);
        } else if (isset($_GET['method']) && $_GET['method'] == 'delete-film') {
            $film = $this->film_model->getFilmById();
            $this->getView('delete_film', $film);
        } else if (isset($_GET['method']) && $_GET['method'] == 'add-director') {
            $this->getView('register_director');
        } else if (isset($_GET['method']) && $_GET['method'] == 'add-film') {
            $this->getView('register_film');
        } else {
            require_once $this->film_view->render();
        }
    }


}