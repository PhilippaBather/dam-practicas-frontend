<?php

// call back functions to automatically load the required classes
spl_autoload_register(function ($class) {
    if (file_exists(dirname(__DIR__) . "/" . $class . '.php')) {
        require dirname(__DIR__) . "/" . $class . '.php';
    }
});