<?php
use Core\Route;
use App\Controllers\HomeController;
use App\Controllers\ArticleController;
use App\Controllers\NewsController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
/*
	Routing...
	{dynamic parameter};
	Need to follow the sequence of writing!
*/
return [
	new Route('/', HomeController::class, 'home'),

	new Route('/news', NewsController::class, 'all'),
	new Route('/news/{id}', NewsController::class, 'one'),

	new Route('/admin', ArticleController::class, 'show'),
	new Route('/add', ArticleController::class, 'put'),
	new Route('/del/{id}', ArticleController::class, 'del'),

	new Route('/login', LoginController::class, 'show'),
	new Route('/login/result', LoginController::class, 'result'),
	new Route('/logout', LoginController::class, 'out'),
	new Route('/register', RegisterController::class, 'show'),
	new Route('/register/result', RegisterController::class, 'result'),
	]
?>