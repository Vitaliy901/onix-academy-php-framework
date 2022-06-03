<?php 
namespace Core;

use Core\Path;

class Router {

	public function compare(array $routes, string $uri) {

		foreach ($routes as $route) {
			$stencil = $this->createStencil($route->path);
			if (preg_match($stencil, $uri, $params)) {
				$params = $this->toClean($params);
				return new Path($route->controller, $route->action, $params);
			}
		}

		return new Path('error', 'notFound');
	}
	private function createStencil ($path) {
		return '#^' . preg_replace('#\{([^\s]+?)\}#', '(?<$1>[^/]+)', $path) . '$#';
	}
	private function toClean($params) {
		foreach ($params as $key => $value) {
			$result = [];
			if (!is_int($key)) {
				$result[$key] = $value;
			}
			return $result;
		}
	}
}
?>