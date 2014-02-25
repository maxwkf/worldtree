<?php
class BaseDao {

	/**
	 * @var mysqli
	 */
	private $mysqli;
	public function __construct() {
		$this->mysqli = new mysqli('localhost','root', null, 'worldtree');
		$this->mysqli->set_charset("utf8");
		
	}
	
	public function fetchModelList($query, $model) {
		
		$return = array();
		// fetch assoc
		$resultSet = $this->mysqli->query($query);
		// loop and put to model
		while($row = $resultSet->fetch_assoc()) {
			$return[] = $this->rowToModel($row, clone($model));
		}
		
		return $return;
	}
	
	public function rowToModel(array $row, BaseModel $model) {
		foreach ($row as $key => $value) {
			$func = 'set'.implode('',array_map('ucfirst',explode('_',$key)));
			$model->{$func}($value);
		}
		return $model;
	}
	public function mysqliClose() {
		$this->mysqli->close();
	}
}