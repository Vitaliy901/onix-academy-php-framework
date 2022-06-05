<?php 
namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller {

	public function home ($params){
		$this->layout = 'home-index';
		$this->title = 'Home';

		return $this->render('home/home-content', $params);
	}

	public function allNews ($params){
		$this->layout = 'news-list';
		$this->title = 'News';
		
		return $this->render('home/all-news', $params);
	}
}

?>