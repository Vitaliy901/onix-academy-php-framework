<?php 
namespace App\Controllers;

use Core\Controller;

class NewsController extends Controller {

	public function showAll ($var1){
		$this->layout = 'news-list';
		$this->title = 'News';
		
		return $this->render('news-content', $var1);
	}
}

?>