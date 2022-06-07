<?php 
namespace Core;

class Page {
	private string $layout; // Имя файла шаблона.
	private string $title; // Тайтл страницы.
	private string $root; // Корень ресурса.
	private string $view; // Имя файла представления.
	private array $data; // Масив с параметрами роута.

	public function __construct(string $layout, string $title = '', string $root = '', ?string $view = null, array $data = [])
	{
		$this->layout = $layout;
		$this->title = $title;
		$this->root = $root;
		$this->view = $view;
		$this->data = $data;
	}

	public function __get($property)
	{
		return $this->$property;
	}
}
?>