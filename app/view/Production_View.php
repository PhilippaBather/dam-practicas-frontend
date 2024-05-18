<?php

namespace app\view;

class Production_View
{
    public function render(): string
    {
        return dirname((__DIR__)) .  "../pages/production_companies.php";
    }
}