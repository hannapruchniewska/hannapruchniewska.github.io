<?php
include_once 'model/model.php';
class ConfigModel extends Model {
	public function generate(){
		$data = $this->select('config','*');
		$infos = array();
		foreach((array)$data as $row){
			$infos[$row['name']] = $row['val'];
		}
		return $infos;
	}
	public function get(){
		$data = $this->select('config','*');
		$infos = array();
		foreach((array)$data as $row){
			$infos[$row['name']] = $row['val'];
		}
		return $infos;
	}
}
?>
