<?php 
namespace Core;

/*
	Отвечает за формирование вивода страницы 
	в браузер из даных объект Page. Извлекает
	параметры роута из масива передавая их в представление.
*/
class View {

	public function renderPage (Page $page): string {
		return $this->renderLayout($page, $this->renderView($page));
	}

	private function renderLayout(Page $page, $viewContent): string {
		$layoutPath = $_SERVER['DOCUMENT_ROOT'] . '/App/resources/layouts/' . $page->layout . '.php';

		if (file_exists($layoutPath)) {
			ob_start();
			$title = $page->title;
			$root = $page->root;
			include $layoutPath;
			return ob_get_clean();
		}else {
			echo "Не найден файл с лейаутом по пути $layoutPath"; die();
		}
	}

	public function renderView(Page $page): string {
		$viewPath = $_SERVER['DOCUMENT_ROOT'] . '/App/resources/views/' . $page->view . '.php';

		if (file_exists($viewPath)) {
			ob_start();
			extract($page->data);
			$root = $page->root;
			include $viewPath;
			return ob_get_clean();
		}else {
			echo "Не найден файл с представления по пути $viewPath"; die();
		}
	}
}
?>