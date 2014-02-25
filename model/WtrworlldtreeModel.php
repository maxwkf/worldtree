<?php
require_once 'model/BaseModel.php';
class WtrworldtreeModel extends BaseModel {

	private $wtr_id;
	private $wtr_desc;
	private $wtr_ts_create;
	private $wtr_ts_update;
	public function __construct() {
	
	}
	public function getWtrId() {
		return $this->wtr_id;
	}
	public function setWtrId($wtr_id) {
		$this->wtr_id = $wtr_id;
		return $this;
	}
	public function getWtrDesc() {
		return $this->wtr_desc;
	}
	public function setWtrDesc($wtr_desc) {
		$this->wtr_desc = $wtr_desc;
		return $this;
	}
	public function getWtrTsCreate() {
		return $this->wtr_ts_create;
	}
	public function setWtrTsCreate($wtr_ts_create) {
		$this->wtr_ts_create = $wtr_ts_create;
		return $this;
	}
	public function getWtrTsUpdate() {
		return $this->wtr_ts_update;
	}
	public function setWtrTsUpdate($wtr_ts_update) {
		$this->wtr_ts_update = $wtr_ts_update;
		return $this;
	}
}