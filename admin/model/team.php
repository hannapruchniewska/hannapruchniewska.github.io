<?php
include_once 'model/model.php';
class TeamModel extends Model {
    public function insert($data) {
        $image = $this->uploadImage($_FILES['image'], 'team');
		$image = $this->checkImage($image, 'team');
        $in=$this->pdo->prepare('INSERT INTO team (name, image, content,email, phone) VALUES (:name, :image, :content, :email, :phone)');
        $in->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $in->bindValue(':content', $data['content'], PDO::PARAM_STR);
        $in->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $in->bindValue(':phone', $data['phone'], PDO::PARAM_STR);
        $in->bindValue(':image', $image, PDO::PARAM_STR);
        $in->execute();
    }
    public function update($data) {
		$image = $this->uploadImage($_FILES['image'], 'team');
		$image = $this->checkImage($image, 'team');
        $up=$this->pdo->prepare('UPDATE team SET name=:name, content=:content, image=:image, email=:email, phone=:phone WHERE id=:id');
        $up->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $up->bindValue(':content', $data['content'], PDO::PARAM_STR);
        $up->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $up->bindValue(':phone', $data['phone'], PDO::PARAM_STR);
        $up->bindValue(':image', $image, PDO::PARAM_STR);
        $up->bindValue(':id', $data['id'], PDO::PARAM_STR);
        $up->execute();
    }
    public function getAll() {
        return $this->select('team');
    }
    public function getOne($id){
		$data = $this->select('team', '*', 'id='.$id);
		foreach($data as $row){
			return $row;
		}
	}
    public function delete($id) {
        $del=$this->pdo->prepare('DELETE FROM team where id=:id');
        $del->bindValue(':id', $id, PDO::PARAM_INT);
        $del->execute();
    }
}
?>
