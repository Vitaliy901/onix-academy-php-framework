<?php

use App\Controllers\HomeController;

use Core\Route;
/*
	Routing...
	{dynamic parameter}
*/
	return [
		new Route('/home', HomeController::class, 'home'),
		new Route('/news/{id}', HomeController::class, 'allNews'),
	]
?>