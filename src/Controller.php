<?php 
namespace Core;
/*
	Отвечает за формирование необходымой страници
	и передачу данных в эту страницу.
*/
class Controller {
	protected string $layout = 'default'; // имя файла шаблона.
	protected string $title = 'defoult'; // тайтл страницы.

	// Создает еземпляр класа Page для обьєктов view.
	protected function render(string $view = '', array $data = []): Page { 
		return new Page($this->layout, $this->title, $view, $data);
	}
}
?>