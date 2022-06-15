<?php 
namespace Core;

class Request {
	private array $request = [];

	public function __construct()
	{
		$this->request = $_REQUEST;
		$token = md5(uniqid(mt_rand(), true));
		$this->request['token'] = $token;
		session_start();
		$_SESSION['token'] = $token;
	}
	public function input (string $name) {
		return 	$this->request[$name];
	}
	public function all (): array {
		return 	$this->request;
	}
	public function moveFile (string $project_root) {
		if (!empty($_FILES['uploadedFile'] && $_FILES['uploadedFile']['error'] == UPLOAD_ERR_OK)) {
			$tmp_path = $_FILES['uploadedFile']['tmp_name'];
			$this->request['file'] = $project_root . '/' . $_FILES['uploadedFile']['name'];
			move_uploaded_file($tmp_path, SERVER_ROOT . $this->request['file']);
		}
	}
}
?>