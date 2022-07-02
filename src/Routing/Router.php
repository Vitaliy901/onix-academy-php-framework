<?php 
namespace Core\Routing;

use Core\Exceptions\NotFound;
use Core\Path;
/*
	Проверяет существование соответствующего 
	роута для запрашиваемого URL. Преобразует
	строку с параметрами в масив.
	Возвращает путь к необходимому контроллру 
	или в случае его отсутствия вернет стандартний.
*/
class Router {

	public function compare(array $routes, string $uri): Path{

		foreach ($routes as $route) {

			$stencil = $this->createStencil($route->path);

			if (preg_match($stencil, $uri, $params)) {
				$params = $this->toClean($params);

				return new Path($route->controller, $route->action, $params);
			}
		}

		throw new NotFound('Controller not found for this URL request: App/routes/', 404);
	}

	private function createStencil ($path): string{

		$result = preg_replace_callback('#\{([^\s/?]+)\??\}#', function ($match){
			if (preg_match('#\{[^\s/?]+\}#',$match[0])) { // required
				return "(?<$match[1]>[^\s/]+)";
			}
			if (preg_match('#\{[^\s/]+\?\}#',$match[0])) { // optional

				return "{0,}\b/{0,}(?<$match[1]>[^\s/]{0,})";
			}
		},$path);

		$getParams = preg_replace('#(\++?)#','\\\$1',Url::urlParams());
		if (!empty($_GET['search'])) {
			return '#^' . $result . '\\' . $getParams . '$#';
		}
		return '#^' . $result . '$#';
	}

	private function toClean($params): array{
		$result = [];

		foreach ($params as $key => $value) {
			if (!is_int($key)) {
				$result[$key] = $value;
			}
		}
		return array_filter($result);
	}
}
?>