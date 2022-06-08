<?php 
namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller {

	public function home (){
		$this->layout = 'index';
		$this->title = 'Home';

		return $this->render('home/home-content');
	}

	public function singleNews ($id){
		$this->layout = 'single-news';
		$this->title = 'News';
		
		return $this->render('home/single-nwes-content', ['id' => $id]);
	}

	public function allNews (){
		$this->layout = 'news-list';
		$this->title = 'All News';
		
		return $this->render('home/news-list-content');
	}

}

?>