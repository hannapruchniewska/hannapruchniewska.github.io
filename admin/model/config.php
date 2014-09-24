<?php
include_once 'model/model.php';
class ConfigModel extends Model {
	public function get($name){
		$all = $this->select('config', '*', 'name="'.$name.'"');
		foreach($all as $one){
			return $one['val'];;
		}
	}
	public function set($name, $val){
		$s = $this->pdo->prepare('UPDATE config SET val=:val WHERE name=:name');
		$s->bindValue(':val', $val, PDO::PARAM_STR);
		$s->bindValue(':name', $name, PDO::PARAM_STR);
		$s->execute();
	}
}
?>
