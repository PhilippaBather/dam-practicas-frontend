<?php

namespace app\view;

class Film_View
{

    public function render(): string
    {
        return dirname((__DIR__)) .  "../pages/film_home.php";
    }
}