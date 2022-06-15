<?php 
namespace App\Controllers;

use Core\Controller;
use Core\Request;
use App\Models\Article;

class ArticleController extends Controller {

	public function show () {
		$articles = (new Article('articles'))->getAll();
		$articles = (new Article('articles'))->latest($articles);
		$this->layout = 'article-list';
		$this->title = 'Article list';

		session_start();
		if (!$_SESSION['auth']) {
			header('location: /login');
		}
		return $this->render('article/article-list-content', ['articles' => $articles]);
	}

	public function put () {
		$article = new Article('articles');
		$request = new Request;
		$request->moveFile($this->root . 'img');

		$article->insert([
			'author' => $request->input('author'),
			'img' => $request->input('file'),
			'header' => $request->input('header'),
			'content' =>$request->input('content'),
			'created_at' => date('d.m.Y', time()),
			'updated_at' => date('d.m.Y', time()),
			'status' => 'published',
		]);

		header('location: /admin');
	}

	public function del ($id) {
		$articles = new Article('articles');
		$articles->delete($id);

		header('location: /admin');
	}
}

?>