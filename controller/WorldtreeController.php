<?php
require_once 'dao/WtrworldtreeDao.php';
require_once 'model/WtrworlldtreeModel.php';

class WorldtreeController extends BaseController {
	public function showAction() {
		$wtrworldtreeDao = new WtrworldtreeDao();
		$wtrworldtreeModelArray = $wtrworldtreeDao->fetchModelList($wtrworldtreeDao->querySelectAll(), new WtrworldtreeModel());
		
		$this->_data->wtrworldtreeModelArray = $wtrworldtreeModelArray;
	}
}