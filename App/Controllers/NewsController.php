<?php 
namespace App\Controllers;

use Core\Controller;
use App\Models\News;

class NewsController extends Controller {

	public function all () {
		$news = (new News('articles'))->getAll();
		$news = (new News('articles'))->latest($news);
		$this->layout = 'all-news';
		$this->title = 'All News';

		return $this->render('home/news-content', ['news' => $news]);
	}

	public function one ($id) {
		$row = (new News('articles'))->getById($id);
		$this->layout = 'article-page';
		$this->title = 'Article page';

		return $this->render('home/article-page-content', [
			'id' => $row->created_at,
		]);
	}
}

?>