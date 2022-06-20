<?php 
namespace Core\Sessions;

class Request {
	private string $csrf;

	public function input (string $name): ?string {
		return $_REQUEST[$name];
	}

	public function all (): array {
		return $_REQUEST;
	}

	public function moveFile (string $storage) {
		if (!empty($_FILES['uploadedFile'] && $_FILES['uploadedFile']['error'] == UPLOAD_ERR_OK)) {
			$tmp_path = $_FILES['uploadedFile']['tmp_name'];
			$this->request['fileName'] = DS . $storage . DS . $_FILES['uploadedFile']['name'];
			move_uploaded_file($tmp_path, SERVER_ROOT . DS . $this->request['fileName']);
		}
	}

	public function token (): string {
		$this->csrf = md5(uniqid(mt_rand(), true));
		$_SESSION['csrf'] = $this->csrf;
		return $this->csrf;
	}
}
?>