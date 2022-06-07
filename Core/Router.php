<?php 
namespace Core;

use App\Controllers\Error\ErrorController;
use Core\Path;
/*
	Проверяет существование соответствующего 
	роута для запрашиваемого URL. Преобразует
	строку с параметрами в масив.
	Возвращает путь к необходимому контроллру 
	или в случае его отсутствия вернет стандартний.
*/
class Router {

	public function compare(array $routes, string $uri): object {

		foreach ($routes as $route) {
			$stencil = $this->createStencil($route->path);
			
			if (preg_match($stencil, $uri, $params)) {
				$params = $this->toClean($params);

				return new Path($route->controller, $route->action, $params);
			}
		}

		return new Path(ErrorController::class, 'notFound');
	}

	private function createStencil ($path): string{
		return '#^' . preg_replace('#\{([^\s]+?)\}#', '(?<$1>[^/]+)', $path) . '$#';
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