<?php
require_once 'dao/WtrworldtreeDao.php';
require_once 'model/WtrworlldtreeModel.php';

class WorldtreeController {
	public function showAction() {
		$wtrworldtreeDao = new WtrworldtreeDao();
		$wtrworldtreeModelArray = $wtrworldtreeDao->fetchModelList($wtrworldtreeDao->querySelectAll(), new WtrworldtreeModel());
		var_dump($wtrworldtreeModelArray);
	}
}