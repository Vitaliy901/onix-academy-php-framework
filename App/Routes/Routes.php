<?php

use App\Controllers\HomeController;

use Core\Route;
/*
	Routing...
	{dynamic parameter};
	Need to follow the sequence of writing!
*/
	return [
		new Route('/home', HomeController::class, 'home'),
		new Route('/news/all', HomeController::class, 'allNews'),
		new Route('/news/{id}', HomeController::class, 'singleNews'),
	]
?>