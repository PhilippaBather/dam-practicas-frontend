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

        if ($isDirectorDeleted | $isFilmDeleted) {
            $this->redirect('film', null);
        }

        if (isset($_GET['method']) && $_GET['method'] == 'delete-director') {
            $director = $this->film_model->getDirectorById();
            $this->getView("delete_director", $director);
        } else if (isset($_GET['method']) && $_GET['method'] == 'delete-film') {
            $film = $this->film_model->getFilmById();
            $this->getView('delete_film', $film);
        } else {
            require_once $this->film_view->render();
        }
    }


}