<?php 
namespace App\Controllers;

use Core\Controller;
use Core\Session\Request;
use Core\View\Html;
use App\Models\Article;

class ArticleController extends Controller {

	public function show (): Html {
		$articles = (new Article('articles'))->getAll();
		$articles = (new Article('articles'))->latest($articles);

		if (!$_SESSION['auth']) {
			header('location: /login');
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
	}

	public function del ($id) {
		(new Article('articles'))->delete($id);

		header('location: /admin');
	}
}

?>