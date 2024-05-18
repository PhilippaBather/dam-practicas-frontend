<?php

// general configuration
define('APP_NAME', 'Film Affinity');
define('APP_ENV', 'dev');

// database configurations
define('DB_HOST', 'localhost:3305');
define('DB_NAME', 'filmapi');
define('DB_USER', 'root');
define('DB_PASS', '');

// file paths
define('CONTROLLER_PATH', '../app/controller/');
define('CONTROLLER_CLASS_NAME', 'app\controller\\');
define('MODEL_PATH', '../app/model/');
define('MODEL_CLASS_NAME', 'app\model\\');
define('VIEW_PATH', '../app/view/');
define('VIEW_CLASS_NAME','app\model\\');

// default controller
define('DEFAULT_CONTROLLER', 'app\controller\Film_Controller');

// default method
define('DEFAULT_METHOD', 'renderView');
