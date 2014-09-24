<?php
include_once 'model/model.php';
class MenuModel extends Model {
	public function getAll(){
		$data = $this->select('menu','*',NULL,'position');
		return $data;
	}
	public function update($data){
		$up = $this->pdo->prepare('UPDATE menu SET name=:name WHERE id=:id');
		$up->bindValue(':name', $data['name'], PDO::PARAM_STR);
		$up->bindValue(':id', $data['id'], PDO::PARAM_INT);
		$up->execute();
	}
	public function move($data){
		$max = $this->pdo->query('SELECT MAX(position) AS position FROM menu');
		foreach($max as $row){
			$maxpos = $row['position'];
		}
		$max->closeCursor();
		if (!(( $data['position'] == 1 && $data['mode'] == 'up' )||( $data['position'] == $maxpos && $data['mode'] == 'down' ))){
			$u1 = $this->pdo->prepare('UPDATE menu SET position=-1 WHERE position=:old');
			$u2 = $this->pdo->prepare('UPDATE menu SET position=:old WHERE position=:new');
			$u3 = $this->pdo->prepare('UPDATE menu SET position=:new WHERE position=-1');
			$old = $data['position'];
			if ($data['mode'] == 'up'){
				$new = $old-1;
			} else if ($data['mode'] == 'down'){
				$new = $old+1;
			}
			$u1->bindValue(':old', $old, PDO::PARAM_INT);
			$u2->bindValue(':old', $old, PDO::PARAM_INT);
			$u2->bindValue(':new', $new, PDO::PARAM_INT);
			$u3->bindValue(':new', $new, PDO::PARAM_INT);
			$u1->execute();
			$u2->execute();
			$u3->execute();
		}
	}
	public function insert($data){
		$max = $this->pdo->query('SELECT MAX(position) AS position FROM menu');
		foreach($max as $row){
			$maxpos = $row['position'];
		}
		$max->closeCursor();
		if ($data['menuAdd'] == 'article'){
			$art = $this->pdo->query('SELECT * FROM articles WHERE id='.$data['id']);
			foreach($art as $row){
				$title = $row['title'];
			}
			$art->closeCursor();
			$url = 'articles/one/'.$data['id'];
			$ins = $this->pdo->prepare('INSERT INTO menu (url, name,active, position, protected, submenu) VALUES (:url, :name,1, :position, 0, 0)');
			$ins->bindValue(':url', $url, PDO::PARAM_STR);
			$ins->bindValue(':name', $title, PDO::PARAM_STR);
			$ins->bindValue(':position', $maxpos+1, PDO::PARAM_INT);
			$ins->execute();
		} else if ($data['menuAdd'] == 'categorie'){
			$cat = $this->pdo->query('SELECT * FROM categories WHERE id='.$data['id']);
			foreach($cat as $row){
				$name = $row['name'];
			}
			$url = 'categories/one/'.$data['id'];
			$submenu = $data['submenu'] == 1 ? $data['id'] : 0;
			$ins = $this->pdo->prepare('INSERT INTO menu (url, name,active, position, protected, submenu) VALUES (:url, :name,1, :position, 0, :submenu)');
			$ins->bindValue(':url', $url, PDO::PARAM_STR);
			$ins->bindValue(':submenu', $submenu, PDO::PARAM_INT);
			$ins->bindValue(':name', $name, PDO::PARAM_STR);
			$ins->bindValue(':position', $maxpos+1, PDO::PARAM_INT);
			$ins->execute();
		}
	}
	public function hide($id){
		$hid = $this->pdo->prepare('UPDATE menu SET active=0 WHERE id=:id');
		$hid->bindValue(':id', $id, PDO::PARAM_INT);
		$hid->execute();
	}
	public function unhide($id){
		$unh = $this->pdo->prepare('UPDATE menu SET active=1 WHERE id=:id');
		$unh->bindValue(':id', $id, PDO::PARAM_INT);
		$unh->execute();
	}
	public function delete($id){
		$del = $this->pdo->prepare('DELETE FROM menu WHERE id=:id');
		$del->bindValue(':id', $id, PDO::PARAM_INT);
		$del->execute();
		$this->fixGaps();
	}
	public function fixGaps(){
		$fix = $this->pdo->prepare('SET @count = 0; UPDATE menu SET position = @count:=@count + 1 ORDER BY position');
		$fix->execute();
	}
}
?>
