<?php 
namespace App\Controllers;

use Core\Sessions\Request;
use Core\View\Html;
use App\Models\Article;
use Core\ImageManager;

class ArticleController {

	public function show (): Html {
		$article = new Article;
		$articles = $article->findAll('sort')->latest();
		$request = new Request;

		if (empty($_SESSION['auth'])) {
			redirect('/login');
		}
		if (!empty($request->input('search'))) {
			$articles = $article->search($request->input('search'));
		}

		return new Html('article-list','article/article-list-content',
		[
			'title' => 'Article list',
			'articles' => $articles,
			'search' => $request->input('search'),
		]);
	}

	public function put () {
		$request = new Request;
		$article = new Article;
		$request->moveFile('img');

		$text = strip_tags($request->input('content'));
		$text = preg_replace('#"(.+)?"#',"\r\n<blockquote>“ $1 ”</blockquote>", $text);

		$abridgement = strip_tags(substr($text , 0, 150));
		$abridgement = preg_replace('#^(.+)\b$#', '$1...', $abridgement);

		$chunks = array_filter(explode("\r\n", $text));
		$content= '';
		foreach ($chunks as $chunk) {
			$content .= (str_contains($chunk,'<blockquote>')) ? $chunk : '<p>' . $chunk . '</p>';
		}
		// resize image
		if (!empty($request->input('filePath'))) {
			$image = new ImageManager(SERVER_ROOT . $request->input('filePath'));
			$image->resize(840, 700, SERVER_ROOT . DS . 'img'. DS . date('d.m.Y', time()) . '-840x700' . $request->input('fileName'), 80);
		}
		
		$article->insert([
			'header' => strip_tags($request->input('header')),
			'abridgement' => $abridgement,
			'content' => $content,
			'author' => strip_tags($request->input('author')),
			'img' => $request->input('filePath'),
			'imgSmall' => DS . 'img'. DS . date('d.m.Y', time()) . '-840x700' . $request->input('fileName'),
			'created_at' => date('d.m.Y', time()),
			'updated_at' => date('d.m.Y', time()),
			'status' => 'published',
			'users_id' => $_SESSION['id'],
		]);

		redirect('/admin');
	}

	public function del ($id) {
		(new Article)->delOne($id);

		redirect('/admin');
	}
}

?>