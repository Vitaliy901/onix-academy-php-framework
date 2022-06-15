<?php 
namespace App\Controllers;

use Core\Controller;
use App\Models\News;

class HomeController extends Controller {

	public function home (){

		$news = (new News('articles'))->getAll();

		$news = (new News('articles'))->latest($news);

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

/* 	public function singleNews ($id){
		$this->layout = 'single-news';
		$this->title = 'News';
		
		return $this->render('home/single-nwes-content', ['id' => $id]);
	}

	public function allNews (){
		$this->layout = 'news-all';
		$this->title = 'All News';
		
		return $this->render('home/news-list-content');
	} */
}

?>