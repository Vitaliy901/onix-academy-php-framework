<?php 
namespace Core\View;

class Json implements ViewInterface {
	private array $data;

	public function __construct(array $data)
	{
		$this->data = $data;
	}
	
	public function render(): bool|string
	{
		header('Content-Type: application/json');
		return json_encode($this->data);
	}
}
?>