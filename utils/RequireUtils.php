<?php
class RequireUtils {
	static function once(array $filePaths) {
		foreach($filePaths as $path) {
			require_once($path);
		}
	}
}