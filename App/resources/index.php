<?php

use Core\Error\ErrorHandler;
use Core\Routing\Router;
use Core\Operator;
use Core\Sessions\Session;

require_once '../config/constants.php';
require_once '../../vendor/autoload.php';
$routes = require_once '../routes/routes.php';

new ErrorHandler;
Session::start(SESSNAME);

$path = (new Router)->compare($routes, $_SERVER['REQUEST_URI']);
(new Operator)->renderPage($path);

?>
