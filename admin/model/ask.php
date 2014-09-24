<?php
include_once 'model/model.php';
	class AskModel extends Model {
		public function getAllAnswered(){
			return $this->select('ask','*','wait=0');
		}
		public function getNewest(){
			$data = $this->select('ask', '*',NULL, 'answered DESC',1);
			foreach ($data as $row){
				$new = $row;
			}
			return $new;
		}
		public function getAllWaiting(){
			return $this->select('ask','*','wait=1');
		}
		public function delete($id){
			$del=$this->pdo->prepare('DELETE FROM ask where id=:id');
			$del->bindValue(':id', $id, PDO::PARAM_INT);
			$del->execute();
			$main = $this->loadModel('main');
        $main->fixNewest();
		}
		public function answer($data){
			$ans=$this->pdo->prepare('UPDATE ask SET answer=:answer, answered=NOW(), wait=0 WHERE id=:id');
			$ans->bindValue(':id', $data['id'], PDO::PARAM_INT);
			$ans->bindValue(':answer', $data['answer'], PDO::PARAM_INT);
			$ans->execute();
			$main = $this->loadModel('main');
        $main->fixNewest();
		}
		public function countWaiting(){
			$count = $this->select('ask', 'COUNT(*)', 'wait=1');
			foreach ($count as $row){
				return $row[0];
			}
		}
		public function update($data){
			$up = $this->pdo->prepare('UPDATE ask SET answer=:answer, answered=NOW() WHERE id=:id');
			$up->bindValue(':id', $data['id'], PDO::PARAM_INT);
			$up->bindValue(':answer', $data['answer'], PDO::PARAM_INT);
			$up->execute();
			$main = $this->loadModel('main');
        $main->fixNewest();
		}

		// public function updateText($data){
		// 	$up = $this->pdo->prepare('UPDATE ask SET text=:text, answered=NOW() WHERE id=:id');
		// 	$up->bindValue(':id', $data['id'], PDO::PARAM_INT);
		// 	$up->bindValue(':answer', $data['answer'], PDO::PARAM_INT);
		// 	$up->execute();
		// 	$main = $this->loadModel('main');
  //       $main->fixNewest();
		// }
	}
?>
