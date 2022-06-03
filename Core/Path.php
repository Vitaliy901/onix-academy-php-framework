<?php 
	namespace Core;

	class Path {
		private string $controller;
		private string $action;
		private array $params;
		
		public function __construct(string $controller, string $action, array $params = [])
		{
			$this->controller = $controller;
			$this->action = $action;
			$this->params = $params;
		}
		public function __get($name)
		{
			return $this->$name;
		}
	}
?>