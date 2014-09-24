<?php
include_once 'model/model.php';
 
class NewsModel extends Model{

    public function getAll() {
        return $this->select('news');
    }
    public function getAllActive(){
		return $this->select('news', '*', 'active=1');
	}
	public function getOne($id){
		$data = $this->select('news', '*', 'id='.$id);
		foreach((array)$data as $row){
			return $row;
		}
	}
}
