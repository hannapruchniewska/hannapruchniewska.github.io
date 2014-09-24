<?php
include_once 'model/model.php';

class ArticlesModel extends Model {
	public function getAllFromCategory($id){
		return $this->select('articles', '*', 'category='.$id);
	}
	public function getOne($id){
		$data = $this->select('articles', '*', 'id='.$id);
		foreach($data as $row){
			return $row;
		}
	}
}
?>
