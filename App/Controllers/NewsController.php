<?php 
namespace App\Controllers;

use App\Models\Article;
use Core\View\Html;

class NewsController {

	public function show ($id = 'news') {
		$news = (new Article)->findAll()->latest();

		if ($id == 'news') {
			return new Html('all-news','home/news-content', 
			[
				'title' => 'All News',
				'news' => $news
			]);
		}

		$row = (new Article)->findOne($id);
		return new Html('article-page','home/article-page-content',
		[
			'title' => 'Article page',
			'id' => $row->created_at,
		]);
	}
}

?>