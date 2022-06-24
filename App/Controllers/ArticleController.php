<?php 
namespace App\Controllers;

use Core\Sessions\Request;
use Core\View\Html;
use App\Models\Article;

class ArticleController {

	public function show (): Html {
		$articles = (new Article)->findAll()->latest();

		if (empty($_SESSION['auth'])) {
			header('location: /login');
			die();
		}

		return new Html('article-list','article/article-list-content', 
		[
			'title' => 'Article list',
			'articles' => $articles,
		]);
	}

	public function put () {
		$request = new Request;
		$article = new Article('articles');
		$request->moveFile('img');

		$article->insert([
			'author' => $request->input('author'),
			'img' => $request->input('fileName'),
			'header' => $request->input('header'),
			'content' =>$request->input('content'),
			'created_at' => date('d.m.Y', time()),
			'updated_at' => date('d.m.Y', time()),
			'status' => 'published',
		]);

		header('location: /admin');
		die();
	}

	public function del ($id) {
		(new Article('articles'))->delOne($id);

		header('location: /admin');
		die();
	}
}

?>