<?php 
namespace Core;

use Core\Exceptions\ControllerAction;
use Core\Exceptions\NotViewInterface;
use Core\View\ViewInterface;

/*
	Создает необходимий контроллер из данных обьекта path.
*/
class Operator {

	public function renderPage(Path $path) {
		$controller = new $path->controller;
	
		if (method_exists($controller, $path->action)) {
			$result = $controller->{$path->action}(...$path->params);

			if ($result) {
				echo $result->render();
			} else {
				throw new NotViewInterface
				($path->controller . ' method <b>' . $path->action . '</b>, returned not instance of the class <b>ViewInterface</b>');
			}
		} else {
			throw new ControllerAction
			('Method <b>' . $path->action . '</b>, is not exists in this class: ' . $path->controller);
		}
	}
}
?>