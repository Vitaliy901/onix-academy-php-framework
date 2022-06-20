<?php 
namespace App\Controllers;

use Core\Controller;
use App\Models\News;
use Core\View\Html;

class HomeController extends Controller {

	public function home (): Html {
		$news = (new News('articles'))->getAll();
		$news = (new News('articles'))->latest($news);

		$rows = [];
		for ($i=0; $i < 8; $i++) { 
			if (empty($news[$i])) {
				break;
			}
			$news[$i]->content = preg_replace('#^(.+)\b$#', '$1...', substr($news[$i]->content, 0, 145));
			$rows[] =$news[$i];
		}
		return new Html('index','home/news-content',
		[
			'title' => 'Home',
			'news' => $rows,
		]);
	}
}

?>