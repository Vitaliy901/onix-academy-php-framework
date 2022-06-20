<?php 
namespace Core\View;

use Core\Exceptions\LayoutPath;

/*
	Отвечает за формирование вивода страницы 
	в браузер. Извлекает параметры роута из масива
	передавая их в представление.
*/
class Html implements ViewInterface{

	public function __construct(
		private string $layout, // Имя файла шаблона.
		private string $content, // Имя файла представления.
		private ?array $data = [] // Масив с параметрами роута.
	)
	{
		
	}
	public function render (): bool|string {
		header('Content-Type: text/html; charset=utf-8;');
		return $this->renderLayout($this->renderContent());
	}

	private function renderLayout($content): bool|string {
		$layoutPath = LAYOUTS_PATH . DS . $this->layout . '.php';

		if (file_exists($layoutPath)) {
			ob_start();
			extract($this->data);
			include $layoutPath;
			return ob_get_clean();
		}

		throw new LayoutPath('File layout not found on path ' . $layoutPath);
	}

	public function renderContent(): bool|string {
		$viewPath = VIEWS_PATH . DS . $this->content . '.php';

		if (file_exists($viewPath)) {
			ob_start();
			extract($this->data);
			include $viewPath;
			return ob_get_clean();
		}
		
		throw new LayoutPath('File layout not found on path ' . $viewPath);
	}
}
?>