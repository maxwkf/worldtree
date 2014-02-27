<?php
class BaseModel {
	private $_relatingStuff;
	public function setRelatingStuff(array $elements) {
		$this->_relatingStaff = $elements;
		return $this;
	}
	
	public function getRelatingStuff() {
		return $this->_relatingStaff;
	}
	
	public function getRelatingStuffByName($name) {
		return $this->_relatingStaff[$name];
	}
	
	public function addRelatingStuff($name, $element) {
		$this->_relatingStaff[$name] = $element;
		return $this;
	}
}