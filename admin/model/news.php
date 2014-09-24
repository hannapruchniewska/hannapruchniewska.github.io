<?php
include_once 'model/model.php';
 
class NewsModel extends Model{
 
    public function insert($data) {
        $image = $this->uploadImage($_FILES['image'], 'news');
		$image = $this->checkImage($image, 'news');
        $in=$this->pdo->prepare('INSERT INTO news (title, shortcontent, longcontent,image, created, active) VALUES (:title, :shortcontent, :longcontent,:image, NOW(), 1)');
        $in->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $in->bindValue(':shortcontent', $data['shortcontent'], PDO::PARAM_STR);
        $in->bindValue(':longcontent', $data['longcontent'], PDO::PARAM_STR);
        $in->bindValue(':image', $image, PDO::PARAM_STR);
        $in->execute();
        $main = $this->loadModel('main');
        $main->fixNewest();
    }
    public function getNewest(){
			$data = $this->select('news', '*', 'active=1', 'created DESC',1);
			foreach ($data as $row){
				$new = $row;
			}
			return $new;
		}
    public function update($data) {
		$image = $this->uploadImage($_FILES['image'], 'news');
		$image = $this->checkImage($image, 'news');
        $up=$this->pdo->prepare('UPDATE news SET title=:title, shortcontent=:shortcontent, longcontent=:longcontent, image=:image WHERE id=:id');
        $up->bindValue(':title', $data['title'], PDO::PARAM_STR);
        $up->bindValue(':shortcontent', $data['shortcontent'], PDO::PARAM_STR);
        $up->bindValue(':longcontent', $data['longcontent'], PDO::PARAM_STR);
        $up->bindValue(':image', $image, PDO::PARAM_STR);
        $up->bindValue(':id', $data['id'], PDO::PARAM_STR);
        $up->execute();
        $main = $this->loadModel('main');
        $main->fixNewest();
    }
    public function getAll() {
        return $this->select('news');
    }
    public function getOne($id){
		$data = $this->select('news', '*', 'id='.$id);
		foreach($data as $row){
			return $row;
		}
	}
    public function delete($id) {
        $del=$this->pdo->prepare('DELETE FROM news where id=:id');
        $del->bindValue(':id', $id, PDO::PARAM_INT);
        $del->execute();
        $main = $this->loadModel('main');
        $main->fixNewest();
    }
    public function hide($id){
		$hid=$this->pdo->prepare('UPDATE news SET active=0 where id=:id');
        $hid->bindValue(':id', $id, PDO::PARAM_INT);
        $hid->execute();		
        $main = $this->loadModel('main');
        $main->fixNewest();
	}
	public function unhide($id){
		$unh=$this->pdo->prepare('UPDATE news SET active=1 where id=:id');
        $unh->bindValue(':id', $id, PDO::PARAM_INT);
        $unh->execute();		
        $main = $this->loadModel('main');
        $main->fixNewest();
	}
}
