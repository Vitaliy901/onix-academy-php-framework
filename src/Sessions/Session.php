<?php 
namespace Core\Sessions;

class Session {
	private static self $instance;
	
	public function __construct(string $name)
	{
		session_name($name);
		session_start();
		session_regenerate_id(true);
	}
	
	public static function instance (string $name) {
		if (empty(self::$instance)) {
			self::$instance = new self($name);
		}

		return self::$instance;
	}

	public function put (string|int $key, $value): void {
		$_SESSION[$key] = $value;
	}

	public function get (string|int $key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
		return null;
	}
	
	public function forget (string|int $key) {
		if (isset($_SESSION[$key])) {
			unset($_SESSION[$key]);
		}
	}
}
?>