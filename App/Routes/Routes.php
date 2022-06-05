<?php

use App\Controllers\HomeController;

use Core\Route;
/*
	Routing...
*/
	return [
		new Route('/home', HomeController::class, 'home'),
		new Route('/news/{id}', HomeController::class, 'allNews'),
	]
?>