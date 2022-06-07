<?php 
namespace Core;

/*
	Создает необходимий контроллер из данных обьекта path
	и визивает соответствующий пользовательский метод.
	В котором должен быть визван метод render на формирование
	екземпляра класа Page.
*/
class Operator {

	public function getPage(Path $path): object {
		$controller = new $path->controller;

		if (method_exists($controller, $path->action)) {
			$result = $controller->{$path->action}($path->params);

			if ($result) {
				return $result;
			} else {
				return new Page('default');
			}
		} else {
			echo 'Метод ' . $path->action . ' не существуєт в классе ' . $path->controller; die();
		}
	}
}
?>