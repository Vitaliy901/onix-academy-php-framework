<?php 
	namespace Core;

	class Path {
		private string $controller; // имя контроллера;
		private string $action; // метод контролерра;
		private array $params; // масив с параметрами роута.
		
		public function __construct(string $controller, string $action, array $params = [])
		{
			$this->controller = $controller;
			$this->action = $action;
			$this->params = $params;
		}
		public function __get($property)
		{
			return $this->$property;
		}
	}
?>