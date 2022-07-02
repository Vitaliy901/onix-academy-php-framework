<?php 
namespace Core\Routing;

class Url {

	public static function urlParams (): string{
		return strstr($_SERVER['REQUEST_URI'], '?');
	}

	public static function current (): string{
		return $_SERVER['REQUEST_URI'];
	}
}
?>