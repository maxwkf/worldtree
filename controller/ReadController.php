<?php
class ReadController extends BaseController {
	public function testsessionAction() {
		$playing = SessionUtils::getInstance ( 'playing' );
		$playing->set ( 'team', 'testing team' )->set ( 'aaaaa', 'punk' );
		$testing = SessionUtils::getInstance ( 'testing' );
		$testing->set ( 'team', 'testing team' );
		header ( 'Content-Type: application/json; charset=utf-8' );
		echo json_encode ( $_SESSION );
	}
	public function readtrunkAction() {
		
	}
}