<?php 
namespace Core\Exceptions;

class NotFound extends \Exception {

	public function __construct($message = '', $code = '404')
	{
		parent::__construct($message, $code);
	}
}
?>