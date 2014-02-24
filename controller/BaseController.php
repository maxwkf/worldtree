<?php
class BaseController {
	var $_get;
	var $_post;
	var $_request;
	var $_view;
	public function __construct() {
		$this->_get = $_GET;
		$this->_post = $_POST;
		$this->_request = array_merge($this->_get,$this->_post);
		
	}
}