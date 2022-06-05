<?php 
namespace App\Controllers\Error;

use Core\Controller;

class ErrorController extends Controller {

	public function notFound () {
		$this->title = 'Страница не найдена - 404';

		return $this->render('notFound');
	}
}
?>