<?php
class LefleafModel extends BaseModel {
	private $_lef_id;
	private $_lef_symbol;
	private $_lef_ts_create;
	private $_lef_ts_update;
	public function getLefId() {
		return $this->_lef_id;
	}
	public function setLefId($_lef_id) {
		$this->_lef_id = $_lef_id;
		return $this;
	}
	public function getLefSymbol() {
		return $this->_lef_symbol;
	}
	public function setLefSymbol($_lef_symbol) {
		$this->_lef_symbol = $_lef_symbol;
		return $this;
	}
	public function getLefTsCreate() {
		return $this->_lef_ts_create;
	}
	public function setLefTsCreate($_lef_ts_create) {
		$this->_lef_ts_create = $_lef_ts_create;
		return $this;
	}
	public function getLefTsUpdate() {
		return $this->_lef_ts_update;
	}
	public function setLefTsUpdate($_lef_ts_update) {
		$this->_lef_ts_update = $_lef_ts_update;
		return $this;
	}
	
	
	
}