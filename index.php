<?php
namespace Core;
error_reporting(E_ALL);
ini_set('disply_errors', 'on');

spl_autoload_register(function($class) {
	$root = __DIR__;
	$ds = DIRECTORY_SEPARATOR;
	$filename = $root . $ds . str_replace('\\', $ds, $class) . '.php';

	if (file_exists($filename)) {
		require_once($filename);
	}
});

require_once $_SERVER['DOCUMENT_ROOT'] . '/App/config/connection.php';
$routes = require_once $_SERVER['DOCUMENT_ROOT'] . '/App/routes/routes.php';

$path = (new Router)->compare($routes, $_SERVER['REQUEST_URI']);
$page = (new Operator)->getPage($path);

echo (new View)->renderPage($page);
?>
