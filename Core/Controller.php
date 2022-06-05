<?php 
namespace Core;
/*
	Отвечает за формирование необходымой страници
	и передачу данных в эту страницу.
*/
class Controller {
	protected string $layout = 'default'; // имя файла шаблона.
	protected string $title = 'defoult'; // тайтл страницы.
	protected string $root = '/App/resources/'; // рут для ресурсов
	// Создает еземпляр класа Page для обьєкта view.
	protected function render($view, array $data = []): object { 
		return new Page($this->layout, $this->title, $this->root, $view, $data);
	}
}
?>