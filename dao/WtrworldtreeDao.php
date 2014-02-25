<?php
require_once 'dao/BaseDao.php';
class WtrworldtreeDao extends BaseDao {
	public function querySelectAll() {
		return 'select * from wtr_worldtree';
	}
}