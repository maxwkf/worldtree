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
		
		$resultSet = $this->getResultSet($query);
		
		// fetch and loop and put to model
		$return = array();
		while($row = $resultSet->fetch_assoc) {
			$return[] = $this->rowToModel($row, clone($model));
		}
		
		return $return;
	}
	
	/**
	 * @desc return an array result like array(1,2,3,4...)
	 * 			in which you select only one field from the query
	 * 			e.g. select id from table;
	 * @param String $query
	 * @return array
	 */
	public function fetchSingleArray($query) {
		
		$resultSet = $this->getResultSet($query);
		
		$return = array();
		while($row = $resultSet->fetch_row()) {
			$return[] = $row[0];
		}
		
		return $return;
	}
	
	/**
	 * @param String $query
	 * @return mysqli_result
	 */
	public function getResultSet($query) {
		
		// get result
		$resultSet = $this->mysqli->query($query);
		$resultSet instanceof mysqli_result;
		return $resultSet;
	}
	
	public function fetchAssoc($resultSet) {
		
		$resultSet = $this->getResultSet($query);
		
		$return = array();
		while($row = $resultSet->fetch_assoc()) {
			$return[] = $row;
		}
		
		return $return;
	}
	
	public function rowToModel(array $row, BaseModel $model) {
		foreach ($row as $key => $value) {
			$method = 'set'.implode('',array_map('ucfirst',explode('_',$key)));
			if (method_exists($model, $method)) {
				$model->{$method}($value);
			}
		}
		return $model;
	}
	
	public function mysqliClose() {
		$this->mysqli->close();
	}
}