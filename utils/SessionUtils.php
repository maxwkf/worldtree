<?php
class SessionUtils {
	public $namespace;
	
	static $sessionUtils;
	
	public function __construct($namespace) {
		$this->namespace = $namespace;
		
		$_SESSION[$namespace] = array();
	}
	
	
	static public function getInstance($namespace) {
		
		if (isset($_SESSION[$namespace])) {
			// do nothing
		} else {
			self::$sessionUtils = new SessionUtils($namespace);
		}
		return self::$sessionUtils;
		
	}
	
	public function set($field,$value) {
		$_SESSION[$this->namespace][$field] = $value;
		return $this;
	}
	
	public function get($field) {
		return $this->sessionUtils[$field];
	}
}
