<?php 
namespace Core\Exceptions;

class ViewPath extends \Exception {

	public function __construct($message = '', $code = '404')
	{
		parent::__construct($message, $code);
	}
}
?>