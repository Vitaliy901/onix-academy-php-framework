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

	public function compare(array $routes, string $uri): Path {

		foreach ($routes as $route) {
			$stencil = $this->createStencil($route->path);
			
			if (preg_match($stencil, $uri, $params)) {
				$params = $this->toClean($params);

				return new Path($route->controller, $route->action, $params);
			}
		}
		
		throw new NotFound('Controller not found for this URL request: App/routes/', '404');
	}

	private function createStencil ($path): string{
		return '#^' . preg_replace('#\{([^\s]+?)\}#', '/{0,}(?<$1>[^/]+)/{0,}', $path) . '$#';
	}
	private function toClean($params): array{
		$result = [];
		foreach ($params as $key => $value) {
			if (!is_int($key)) {
				$result[$key] = $value;
			}
		}
		return $result;
	}
}
?>