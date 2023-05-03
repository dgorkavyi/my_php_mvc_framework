<?php

namespace application\core;

class View
{
	public $path;
	public $route;
	public $layout = 'default';

	public function __construct($route)
	{
		$this->route = $route;
		$this->path = $route['controller'] . '/' . $route['action'];
	}

	public function render($title, $vars = [])
	{
		/**
		 *	
		 *	It is posible to change view file path in controllers if needed
		 *		
		 *		someAction(...) 
		 *		{
		 *			$this->view->path = "test/another_path";
		 *   	}
		 * 	
		 * 	$layout can be changed exactly like that, if some custom layout needed 
		 * 
		 */

		extract($vars);

		if (file_exists('application/views/' . "{$this->path}.php")) {
			ob_start();
			require 'application/views/' . "{$this->path}.php";
			$content = ob_get_clean();
			require 'application/views/layouts/' . $this->layout . '.php';
		} else {
			echo "<pre>ERROR: View {$this->path} is not found.</pre>";
		}
	}

	public static function throwError($code)
	{
		$file_path = 'application/views/errors/' . "$code.php";

		http_response_code($code);

		if (file_exists($file_path)) {
			require $file_path;
		}

		exit;
	}
	public function redirect(string $url)
	{
		header("Location: $url");
		exit;
	}
}