<?php

error_reporting(~E_NOTICE);

// 'Home' is the default controller
$controller = isset($_GET['c']) ? $_GET['c'] : 'Home';

// 'index' is the default method
$method = isset($_GET['m']) ? $_GET['m'] : 'index';

include_once "controllers/Controller.class.php";
include_once "controllers/$controller.class.php";

// Go!
(new $controller)->$method();

