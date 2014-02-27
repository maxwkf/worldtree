<?php
require_once 'dao/WtrworldtreeDao.php';
require_once 'dao/TrkTrunkDao.php';
// require_once 'dao/LefleafDao.php';

require_once 'model/WtrworldtreeModel.php';
require_once 'model/TrkTrunkModel.php';
require_once 'model/LefleafModel.php';

class WorldtreeController extends BaseController {
	
	private $_wtrworldtreeDao;
	private $_trktrunkDao;
	
	public function init() {
		$this->_wtrworldtreeDao = new WtrworldtreeDao();
		$this->_trktrunkDao = new TrktrunkDao();
	}
	
	public function showAction() {
		
		$wtrworldtreeModelArray = $this->_wtrworldtreeDao->fetchModelList($this->_wtrworldtreeDao->querySelectAll(), new WtrworldtreeModel);
		
		$this->_data->wtrworldtreeModelArray = $wtrworldtreeModelArray;
	}
	
	public function passageAction() {

		
		
		$lastTrunkId = $this->_get['trkId'];
		
		$trktrunkAncestorArray = array_filter($this->_trktrunkDao->fetchSingleArray($this->_trktrunkDao->querySelectAncestor($lastTrunkId)));
		array_unshift($trktrunkAncestorArray, $lastTrunkId);
		
		
// 		$trktrunkModelArray = $this->_trktrunkDao->fetchModelList($this->_trktrunkDao->querySelectByTrkIdsWithSymbol($trktrunkAncestorArray), new TrktrunkModel());
		
		
		$resultSet = $this->_trktrunkDao->getResultSet($this->_trktrunkDao->querySelectByTrkIdsWithSymbol($trktrunkAncestorArray));
		while($row = $resultSet->fetch_assoc()) {
			$trktrunkModel = new TrktrunkModel();
			$lefleafModel = new LefleafModel();
			$this->_trktrunkDao->rowToModel($row, $trktrunkModel);
			$this->_trktrunkDao->rowToModel($row, $lefleafModel);
			
			$trktrunkModel->setRelatingStuff(array('lefleafModel',$lefleafModel));
			
			
			var_dump($trktrunkModel);
			
// 			$row->setRelatingStuff('symbol', );
		}
		echo 1;
		var_dump($row);die;
		
		
		$this->_data->_trktrunkModelArray = $trktrunkModelArray;
	}
	
	
}