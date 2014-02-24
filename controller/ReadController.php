<?php
class ReadController extends BaseController {
	public function passageAction () {

		$playing = SessionUtils::getInstance('playing');
		$playing->set('team','testing team')->set('aaaaa','punk');
		$testing = SessionUtils::getInstance('testing');
		$testing->set('team','testing team');
		var_dump($_SESSION);
		
		
		var_dump($this->_request);
	}
}