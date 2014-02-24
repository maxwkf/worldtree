<?php

class DatabaseUtils {
	static $instance;
	
	static function getInstance() {
		
		if (isset(UtilsDatabase::$instance)) {
			// do nothing
		} else {
			UtilsDatabase::$instance = new mysqli('localhost','root');
		}
		return UtilsDatabase::$instance;
	}
}