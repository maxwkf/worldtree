<?php
require_once 'model/BaseModel.php';
class WtrworldtreeModel extends BaseModel {

	private $_wtr_id;
	private $_wtr_desc;
	private $_wtr_ts_create;
	private $_wtr_ts_update;
	public function __construct() {
	
	}
	public function getWtrId() {
		return $this->_wtr_id;
	}
	public function setWtrId($_wtr_id) {
		$this->_wtr_id = $_wtr_id;
		return $this;
	}
	public function getWtrDesc() {
		return $this->_wtr_desc;
	}
	public function setWtrDesc($_wtr_desc) {
		$this->_wtr_desc = $_wtr_desc;
		return $this;
	}
	public function getWtrTsCreate() {
		return $this->_wtr_ts_create;
	}
	public function setWtrTsCreate($_wtr_ts_create) {
		$this->_wtr_ts_create = $_wtr_ts_create;
		return $this;
	}
	public function getWtrTsUpdate() {
		return $this->_wtr_ts_update;
	}
	public function setWtrTsUpdate($_wtr_ts_update) {
		$this->_wtr_ts_update = $_wtr_ts_update;
		return $this;
	}
}