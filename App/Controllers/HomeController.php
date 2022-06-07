<?php 
namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller {

	public function home ($params){
		$this->layout = 'index';
		$this->title = 'Home';

		return $this->render('home/home-content', $params);
	}

	public function singleNews ($params){
		$this->layout = 'single-news';
		$this->title = 'News';
		
		return $this->render('home/single-nwes-content', $params);
	}

	public function allNews ($params){
		$this->layout = 'news-list';
		$this->title = 'All News';
		
		return $this->render('home/news-list-content', $params);
	}

}

?>