<?php
namespace Core;
error_reporting(AI_ALL);
ini_set('disply_errors', 'on');

spl_autoload_register(function($class) {
	$root = __DIR__;
	$ds = DIRECTORY_SEPARATOR;
	$filename = $root . $ds . str_replace('\\', $ds, $class) . '.php';

	if (file_exists($filename)) {
		require_once($filename);
	}
});
	
	$routes = require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Routes/Routes.php';
?>
<pre>
	<code>
		<?php 
		$a = '/test/1/2/';
/* 		preg_match('#\{[^\s]+?\}#', $a, $matches); */
		$stencil = '#^' . preg_replace('#\{([^\s]+?)\}#', '(?<$1>[^/]+)', $a) . '?$#';
		preg_match($stencil, '/test/1/2/', $matches);
/* 		$string;
		foreach ($matches[0] as $param) {
			$string .= trim($param, '{}') . '-';
		} */
		var_dump($matches);
		?>
	</code>
</pre>