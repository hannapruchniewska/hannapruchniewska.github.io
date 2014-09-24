<?php
include_once 'model/model.php';
 class TeamModel extends Model{

    public function getAll() {
        return $this->select('team');
    }
	public function getOne($id){
		$data = $this->select('team', '*', 'id='.$id);
		foreach((array)$data as $row){
			return $row;
		}
	}
}
