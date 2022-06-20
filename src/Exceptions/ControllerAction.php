<?php 
namespace Core\Exceptions;

class ControllerAction extends \Exception {

	public function __construct($message = '', $code = '500')
	{
		parent::__construct($message, $code);
	}
}
?>