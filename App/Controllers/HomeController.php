<?php 
namespace App\Controllers;

use Core\Controller;
use App\Models\News;

class HomeController extends Controller {

	public function home (){
		$news = (new News('articles'))->getAll();
		$news = (new News('articles'))->latest($news);


		setcookie('test', '', time() -1);

		$this->layout = 'index';
		$this->title = 'Home';

		$rows = [];
		for ($i=0; $i < 8; $i++) { 
			if (empty($news[$i])) {
				break;
			}
			$news[$i]->content = preg_replace('#^(.+)\b$#', '$1...', substr($news[$i]->content, 0, 145));
			$rows[] =$news[$i];
		}

		return $this->render('home/news-content', ['news' => $rows]);
	}
}

?>