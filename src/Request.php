<?php 
namespace Core;

class Request {
	private array $request = [];

	public function __construct()
	{
		$this->request = $_REQUEST;
		// CSRF token.
		$token = Session::token();
		$this->request['token'] = $token;
		$_SESSION['token'] = $token;
	}
	public function input (string $name) {
		return 	$this->request[$name];
	}
	public function all (): array {
		return 	$this->request;
	}
	public function moveFile (string $project_storage) {
		if (!empty($_FILES['uploadedFile'] && $_FILES['uploadedFile']['error'] == UPLOAD_ERR_OK)) {
			$tmp_path = $_FILES['uploadedFile']['tmp_name'];
			$this->request['fileName'] = DS . $project_storage . DS . $_FILES['uploadedFile']['name'];
			move_uploaded_file($tmp_path, SERVER_ROOT . DS . $this->request['fileName']);
		}
	}
}
?>