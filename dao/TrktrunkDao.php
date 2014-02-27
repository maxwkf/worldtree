<?php
require_once 'dao/BaseDao.php';
class TrktrunkDao extends BaseDao {
	public function querySelectAncestor($trkId) {
		return "select  @id :=
		        (
		        select  trk_parent_id
		        from    trk_trunk
		        where   trk_id = @id
		        ) as id
		from    (
		        select  @id := {$trkId}
		        ) vars
		straight_join
		        trk_trunk
		where   @id is not null";
	}
	
	
	public function querySelectAll() {
		return "select * from trk_trunk";
	}
	
	public function querySelectByTrkIds($trkIds) {
		$str = $this->querySelectAll() . " where trk_id in (" . implode(",",$trkIds) . ")";
		return $str;
	}
	
	public function querySelectByTrkIdsWithSymbol($trkIds) {
		$str = $this->querySelectAll() 
			. " left join lef_leaf on trk_id_lef = lef_id
				where trk_id  in (" . implode(",",$trkIds) . ")";
		return $str;
	}
}