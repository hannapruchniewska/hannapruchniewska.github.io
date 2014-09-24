<?php
include_once 'model/model.php';
 
class CategoriesModel extends Model{
 
    public function insert($data) {
        $in=$this->pdo->prepare('INSERT INTO categories (name, content) VALUES (:name, :content)');
        $in->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $in->bindValue(':content', $data['content'], PDO::PARAM_STR);
        $in->execute();
    }
    public function update($data) {
        $up=$this->pdo->prepare('UPDATE categories SET name=:name, content=:content WHERE id=:id');
        $up->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $up->bindValue(':content', $data['content'], PDO::PARAM_STR);
        $up->bindValue(':id', $data['id'], PDO::PARAM_STR);
        $up->execute();
    }
    public function getAll() {
        return $this->select('categories');
    }
    public function getOne($id){
		$data = $this->select('categories', '*', 'id='.$id);
		foreach($data as $row){
			return $row;
		}
	}
    public function delete($id, $mode) {
        if ($mode == 1){
			$art = $this->pdo->prepare('DELETE FROM articles WHERE category=:id');
			$art->bindValue(':id', $id, PDO::PARAM_INT);
			$art->execute();
		} elseif ($mode == 2){
			$art = $this->pdo->prepare('UPDATE articles SET category=0 WHERE category=:id');
			$art->bindValue(':id', $id, PDO::PARAM_INT);
			$art->execute();
		}
        if($mode == 1 || $mode == 2){
			$del=$this->pdo->prepare('DELETE FROM categories WHERE id=:id');
			$del->bindValue(':id', $id, PDO::PARAM_INT);
			$del->execute();
		}
    }
}
