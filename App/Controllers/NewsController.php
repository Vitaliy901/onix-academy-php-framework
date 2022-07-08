<?php 
namespace App\Controllers;

use App\Models\Article;
use Core\View\Html;

class NewsController {

	public function show ($id = 'news') {
		$article = new Article;
		$news = $article->findAll('latest');

		if ($id == 'news') {
			return new Html('all-news','home/news-content', 
			[
				'title' => 'All News',
				'news' => $news
			]);
		}

		$row = $article->findOne($id);
		$relatedPosts = $article->findAll('random', $id);
		
		return new Html('article-page','home/article-page-content',
		[
			'title' => 'Article page',
			'header' => $row->header,
			'articleContent' => $row->content,
			'img' => $row->img,
			'imgSmall' => $row->imgSmall,
			'author' => $row->author,
			'created_at' => $row->created_at,
			'relatedPosts' => $relatedPosts
		]);
	}
}

?>