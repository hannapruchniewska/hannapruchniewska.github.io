<?php
include_once 'model/model.php';
class ArticlesModel extends Model {
	public function getAll(){
		return $this->select('articles');
	}
	public function getOne($id){
		$data = $this->select('articles','*','id='.$id);
		foreach ($data as $row){
			return $row;
		}
	}
	public function insert($data){
		$image = $this->uploadImage($_FILES['image'], 'articles');
		$image = $this->checkImage($image, 'articles');
		$ins = $this->pdo->prepare('INSERT INTO articles (title, shortcontent, longcontent, category) VALUES(:title, :shortcontent, :longcontent, :category)');
		$ins->bindValue(':title', $data['title'], PDO::PARAM_STR);
		$ins->bindValue(':shortcontent', $data['shortcontent'], PDO::PARAM_STR);
		$ins->bindValue(':longcontent', $data['longcontent'], PDO::PARAM_STR);
		$ins->bindValue(':category', $data['category'], PDO::PARAM_INT);
		$ins->execute();
	}
	public function update($data){
		$image = $this->uploadImage($_FILES['image'], 'articles');
		$image = $this->checkImage($image, 'articles');
		$up = $this->pdo->prepare('UPDATE articles SET title=:title, shortcontent=:shortcontent, longcontent=:longcontent, category=:category WHERE id=:id');
		$up->bindValue(':title', $data['title'], PDO::PARAM_STR);
		$up->bindValue(':shortcontent', $data['shortcontent'], PDO::PARAM_STR);
		$up->bindValue(':longcontent', $data['longcontent'], PDO::PARAM_STR);
		// $up->bindValue(':image', $image, PDO::PARAM_STR);
		$up->bindValue(':category', $data['category'], PDO::PARAM_INT);
		$up->bindValue(':id', $data['id'], PDO::PARAM_INT);
		$up->execute();
	}
	public function delete($id) {
        $del=$this->pdo->prepare('DELETE FROM articles WHERE id=:id');
        $del->bindValue(':id', $id, PDO::PARAM_INT);
        $del->execute();
    }
}
?>
