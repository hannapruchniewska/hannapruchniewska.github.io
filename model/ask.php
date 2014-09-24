<?php
include_once 'model/model.php';
	class AskModel extends Model {
		public function getAll(){
			return $this->select('ask');
		}
		public function getOne($id){
			$all = $this->select('ask', '*', 'id='.$id);
			foreach((array)$all as $one) return $one;
		}
		public function getAllAnswered(){
			return $this->select('ask','*','wait=0');
		}
		public function insert($data){
			$in=$this->pdo->prepare('INSERT INTO ask (name, ip, created, answered, question, answer, wait) VALUES (:name, :ip, NOW(), NULL, :question, NULL, 1)');
			$in->bindValue(':name', $data['name'], PDO::PARAM_STR);		
			$in->bindValue(':ip', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);		
			$in->bindValue(':question', $data['question'], PDO::PARAM_STR);		
			$in->execute();
		}
	}
?>
