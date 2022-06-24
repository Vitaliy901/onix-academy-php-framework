<?php 
namespace App\Controllers;

use App\Models\Article;
use Core\View\Html;

class HomeController {

	public function home () {
		$news = (new Article)->findAll()->latest();

		$rows = [];
		for ($i=0; $i < 8; $i++) { 
			if (empty($news[$i])) {
				break;
			}
			$news[$i]->content = preg_replace('#^(.+)\b$#', '$1...', substr($news[$i]->content, 0, 145));
			$rows[] = $news[$i];
		}
		return new Html('index','home/news-content',
		[
			'title' => 'Home',
			'news' => $rows,
		]);
	}
}

?>