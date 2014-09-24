<?php
include_once 'model/model.php';
class CategoriesModel extends Model {
	public function getAll(){
		return $this->select('categories');
	}
	public function getOne($id){
		$data = $this->select('categories','*','id='.$id);
		foreach ($data as $row){
			return $row;
		}
	}
}
?>
