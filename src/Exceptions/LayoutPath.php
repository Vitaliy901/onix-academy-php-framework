<?php 
namespace Core\Exceptions;

class LayoutPath extends \Exception {

	public function __construct($message = '', $code = '404')
	{
		parent::__construct($message, $code);
	}
}
?>