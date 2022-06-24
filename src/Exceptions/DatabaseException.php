<?php 
namespace Core\Exceptions;

class DatabaseException extends \Exception {

	public function __construct($message = '', $code = 500)
	{
		parent::__construct($message, $code);
	}
}
?>