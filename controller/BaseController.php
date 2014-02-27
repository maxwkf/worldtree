<?php
class BaseController {
	protected $_get;
	protected $_post;
	protected $_request;
	
	
	/**
	 * @desc this view only contain the view path
	 * @var String
	 */
	private $_view;
	protected $_outputType = 'phtml';
	protected $_data;
	
	
	public function __construct($view) {
		$this->_get = $_GET;
		$this->_post = $_POST;
		$this->_request = array_merge($this->_get,$this->_post);
		
		$this->_view = $view;
		$this->_data = new data();
		
		$this->init();
	}
	
	public function getGet() {
		return $this->_get;
	}
	public function setGet($_get) {
		$this->_get = $_get;
		return $this;
	}
	public function getPost() {
		return $this->_post;
	}
	public function setPost($_post) {
		$this->_post = $_post;
		return $this;
	}
	public function getRequest() {
		return $this->_request;
	}
	public function setRequest($_request) {
		$this->_request = $_request;
		return $this;
	}
	public function getView() {
		return $this->_view;
	}
	public function setView($_view) {
		$this->_view = $_view;
		return $this;
	}
	/**
	 * @desc remember to return $this when override in children
	 * @return BaseController
	 */
	public function onBeforeDispatch() {
		return $this;
	}
	/**
	 * @desc remember to return $this when override in children
	 * @return BaseController
	 */
	public function onAfterDispatch() {
		return $this;
	}
	public function dispatch($actionName) {
		
		$resultArray = $this->{$actionName} ();
		
		if ($this->_outputType == 'phtml') {
			header('Content-Type: text/html; charset=utf-8');
			include_once 'view/layout_mars.phtml';
		} else if ($this->_outputType == 'json') {
			header ( 'Content-Type: application/json; charset=utf-8' );
			json_encode($this->_data);
		}
		
		return $this;
	}
	public function run($actionName) {
		$this->onBeforeDispatch()->dispatch($actionName)->onAfterDispatch();
	}
	private function renderContent() {
		if ($this->getView() != '') {
			$viewFileName = 'view/'.$this->getView().'.phtml';
			if (file_exists($viewFileName)) {
				include($viewFileName);
			}
		
		}
	}
}

// this data class is just used for storing data for view
class data {
	
}