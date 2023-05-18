<?php

require '../vendor/autoload.php';
require '../config/config.php';
require '../helper/helper.php';

use App\Route\Route;

$route = new Route;
$route->run();