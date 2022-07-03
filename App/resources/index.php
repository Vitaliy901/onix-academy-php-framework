<?php

use Core\Error\ErrorHandler;
use Core\Routing\Router;
use Core\Operator;
use Core\Routing\Url;
use Core\Sessions\Session;

require_once '../config/constants.php';
require_once ROOT . DS . 'vendor/autoload.php';
require_once ROOT . DS . 'vendor/lib/functions.php';
$routes = require_once ROOT_APP . DS . 'routes/routes.php';

new ErrorHandler;

Session::start(SESSNAME);

$path = (new Router)->compare($routes, Url::current());
(new Operator)->renderPage($path);

?>
