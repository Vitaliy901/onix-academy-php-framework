<?php 
namespace Core\Error;

use Core\Error\ExceptionReport;
use Core\View\Html;

class ErrorHandler {
	use ExceptionReport;

	public function __construct()
	{
		if (DEBUG) {
			error_reporting(E_ALL);
			ini_set('display_errors', 'on');
		} else {
			error_reporting(0);
		}
		set_error_handler([$this, 'errorHandler']);
		ob_start();
		register_shutdown_function([$this, 'fatalErrorHandler']);
		set_exception_handler([$this, 'exceptionErrorHandler']);
	}

	public function errorHandler (int $errno,string $errstr,string $errfile,int $errline) {
		$this->displayError($this->exceptions[$errno],$errstr,$errfile, $errline);

		return true;
	}
	protected function displayError (string $errno,string $errstr,string $errfile,int $errline, $response = 500) {
		error_log(date('Y.m.d H:i:s', time()) . "\nType: $errno\nMessage: $errstr\nFile: $errfile\nLine: $errline\n==========\n", 3, DEBUG_FILE);
		http_response_code($response);
		if (DEBUG) {
			echo (new Html('errors/dev','errors/dev-cont', 
			[
				'title' => 'Error',
				'errno' => $errno,
				'errstr' => $errstr, 
				'errfile' => $errfile, 
				'errline' => $errline
			]))->render();
		} else {
			echo (new Html('errors/' . $response, 'errors/' . $response . '-cont', ['title' => 'Error',]))->render();
		}
		die();
	}

	public function fatalErrorHandler () {
		$error = error_get_last();

		if (!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
			ob_end_clean();
			$this->displayError($error['type'],$error['message'], $error['file'], $error['line']);
		} else {
			ob_get_flush();
		}
	}

	public function exceptionErrorHandler (\Throwable $ex) {
		$this->displayError('Exception', $ex->getMessage(), $ex->getFile(), $ex->getLine(), $ex->getCode());
	}

}
?>