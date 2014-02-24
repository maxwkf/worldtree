<?php
class SearchenginefriendlyUtils {
	static public function run() {
		// search engine friendly url
		if (! empty ( $_SERVER ['PATH_INFO'] )) {
			$paths = explode ( '/', substr ( $_SERVER ['PATH_INFO'], 1 ) );
			for($i = 2, $cnt = count ( $paths ); $i < $cnt; $i ++)
				$_GET [$paths [$i]] = @( string ) $paths [++ $i];
			
			// retrieve controller and action that is calling
			$controllerName = $paths [0] . "Controller";
			$actionName = $paths [1] . "Action";
			
			// include controller
			require_once "controller/BaseController.php";
			require_once "controller/{$controllerName}.php";
			
			// call the controller/action
			$controller = new $controllerName ();
			$controller->$actionName ();
		}
	}
}