<?php
class Application {
	
	/**
	 * @var SessionUtils
	 */
	private $_applicationSession;
	
	public function __construct() {
		$this->_searchEngineFriendlySetting();
	}
	
	public function run() {
		$this->onBeforeDispatch()->dispatch()->onAfterDispatch();
	}
	
	private function _searchEngineFriendlySetting() {
		
		// search engine friendly url
		if (! empty ( $_SERVER ['PATH_INFO'] )) {
			$paths = explode ( '/', substr ( $_SERVER ['PATH_INFO'], 1 ) );
			for($i = 2, $cnt = count ( $paths ); $i < $cnt; $i ++)
				$_GET [$paths [$i]] = @( string ) $paths [++ $i];
			
			// retrieve controller and action that is calling to session
			$this->_applicationSession = SessionUtils::getInstance(__CLASS__);
			$this->_applicationSession
				->set('controllerPath', $paths[0])
				->set('actionPath', $paths[1])
				->set('controllerName', $paths[0].'Controller')
				->set('actionName', $paths[1].'Action')
			;
			
		}
		return $this;
	}
	
	public function onBeforeDispatch() {
		return $this;
	}
	
	public function onAfterDispatch() {
		return $this;
	}
	
	public function dispatch() {
		$controllerName = $this->_applicationSession->get('controllerName');
		$actionName = $this->_applicationSession->get('actionName');
		$controllerPath = $this->_applicationSession->get('controllerPath');
		$actionPath = $this->_applicationSession->get('actionPath');
		
		// include controller
		RequireUtils::once(array(
			"controller/BaseController.php",
			"controller/{$controllerName}.php"
		));
		
		// call the controller/action with corresponding view path
		$controller = new $controllerName("{$controllerPath}/{$actionPath}");
		$controller->run($actionName);
		
		return $this;
	}
}