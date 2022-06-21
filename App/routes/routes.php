<?php
use Core\Routing\Route;
use App\Controllers\HomeController;
use App\Controllers\ArticleController;
use App\Controllers\NewsController;
use App\Controllers\UserController;
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

	new Route('/login', UserController::class, 'login'),
	new Route('/login/result', UserController::class, 'loginResult'),
	new Route('/register', UserController::class, 'register'),
	new Route('/register/result', UserController::class, 'registerResult'),
	new Route('/logout', UserController::class, 'out')
	]
?>