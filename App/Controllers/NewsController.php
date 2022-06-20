<?php 
namespace App\Controllers;

use Core\Controller;
use Core\View\Html;
use App\Models\News;

class NewsController extends Controller {

	public function all () {
		$news = (new News('articles'))->getAll();
		$news = (new News('articles'))->latest($news);

		return new Html('all-news','home/news-content', 
		[
			'title' => 'All News',
			'news' => $news
		]);
	}

	public function one (int $id) {
		$row = (new News('articles'))->getById($id);

		if (is_object($row)) {
			return new Html('article-page','home/article-page-content',
			[
				'title' => 'Article page',
				'id' => $row->created_at,
			]);
		}
	}
}

?>