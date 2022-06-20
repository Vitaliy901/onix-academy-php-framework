<?php 
namespace Core\Sessions;

class Session {
	
	public static function start(string $name)
	{
		session_name($name);
		session_start();
		session_regenerate_id(true);
	}
	
}
?>