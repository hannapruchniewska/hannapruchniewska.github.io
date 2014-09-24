<?php
include_once 'model/model.php';
class MainModel extends Model {
	public function getAllFromPanel($panel){
		return $this->select('main','*','leftpanel='.$panel, 'position');
	}
	public function getOne($id){
		$data = $this->select('main', '*', 'id='.$id);
		foreach($data as $row){
			return $row;
		}
	}
	public function insert($data){
		$source = $data['source'];
		$sourceid = $data['sourceid'];
		if ($source == 'categories'){
			$model = $this->loadModel('categories');
			$cat = $model->getOne($sourceid);
			$title = $cat['name'];
		} else if ($source == 'articles'){
			$model = $this->loadModel('articles');
			$art = $model->getOne($sourceid);
			$title = $art['title'];
		}
		$leftpanel = $data['panel'] == 'left' ? 1 : 0;
		$showcontent = $data['showcontent'];
		$showlinks = $data['showlinks'];
		$position = $this->getMaxPos($data['panel']) + 1;
		if ($showcontent != 1) $showcontent = 0;
		if ($showlinks != 1) $showlinks = 0;
		
		$ins = $this->pdo->prepare('INSERT INTO main (source, sourceid,title, active, protected, leftpanel, showcontent, showlinks, position) VALUES (:source, :sourceid,:title, 1,0,:leftpanel, :showcontent, :showlinks, :position)');
		$ins->bindValue(':source', $source, PDO::PARAM_STR);
		$ins->bindValue(':title', $title, PDO::PARAM_STR);
		$ins->bindValue(':sourceid', $sourceid, PDO::PARAM_INT);
		$ins->bindValue(':leftpanel', $leftpanel, PDO::PARAM_INT);
		$ins->bindValue(':showcontent', $showcontent, PDO::PARAM_INT);
		$ins->bindValue(':showlinks', $showlinks, PDO::PARAM_INT);
		$ins->bindValue(':position', $position, PDO::PARAM_INT);
		$ins->execute();
	}
	public function delete($id){
		$one = $this->getOne($id);
		if ($one['protected'] == 0){
			$del = $this->pdo->prepare('DELETE FROM main WHERE id=:id');
			$del->bindValue(':id', $id);
			$del->execute();
			$this->fixGaps();
		}
	}
	
	public function update($data){
		$up = $this->pdo->prepare('UPDATE main SET title=:title WHERE id=:id');
		$up->bindValue(':title', $data['title'], PDO::PARAM_STR);
		$up->bindValue(':id', $data['id'], PDO::PARAM_INT);
		$up->execute();
	}
	public function changePanel($id){
		$get = $this->getOne($id);
		$panel = $get['leftpanel'];
		$protected = $get['protected'];
		if ($protected == 0){
			$panel = $panel == 1 ? 0 : 1;
			$panelName = $panel == 1 ? 'left' : 'right';
			$maxpos = $this->getMaxPos($panelName) + 1;
			$up = $this->pdo->prepare('UPDATE main SET leftpanel=:panel, position=:position WHERE id=:id');
			$up->bindValue(':panel', $panel, PDO::PARAM_INT);
			$up->bindValue(':position', $maxpos, PDO::PARAM_INT);
			$up->bindValue(':id', $id, PDO::PARAM_INT);
			$up->execute();
			$this->fixGaps();
		}
	}
	public function move($data){
		$id = $data['id'];
		$mode = $data['mode'];
		$one = $this->getOne($id);
		$position = $one['position'];
		$panel = $one['leftpanel'] == 1 ? 'left' : 'right';
		$maxpos = $this->getMaxPos($panel);
		if (!(( $position == 1 && $mode == 'up' )||( $position == $maxpos && $mode == 'down' ))){
			$u1 = $this->pdo->prepare('UPDATE main SET position=-1 WHERE position=:old AND leftpanel=:leftpanel');
			$u2 = $this->pdo->prepare('UPDATE main SET position=:old WHERE position=:new AND leftpanel=:leftpanel');
			$u3 = $this->pdo->prepare('UPDATE main SET position=:new WHERE position=-1 AND leftpanel=:leftpanel');
			$old = $position;
			if ($mode == 'up'){
				$new = $old-1;
			} else if ($mode == 'down'){
				$new = $old+1;
			}
			$u1->bindValue(':old', $old, PDO::PARAM_INT);
			$u2->bindValue(':old', $old, PDO::PARAM_INT);
			$u2->bindValue(':new', $new, PDO::PARAM_INT);
			$u3->bindValue(':new', $new, PDO::PARAM_INT);
			$u1->bindvalue(':leftpanel', $one['leftpanel'], PDO::PARAM_INT);
			$u2->bindvalue(':leftpanel', $one['leftpanel'], PDO::PARAM_INT);
			$u3->bindvalue(':leftpanel', $one['leftpanel'], PDO::PARAM_INT);
			$u1->execute();
			$u2->execute();
			$u3->execute();
		}
	}
	public function getMaxPos($panel){
		$panel = $panel == 'left' ? 1 : 0;
		$get = $this->select('main AS position', 'MAX(position)', 'leftpanel='.$panel);
		foreach($get as $row){
			return $row['MAX(position)'];
		}
	}
	public function hide($id){
		$hid = $this->pdo->prepare('UPDATE main SET active=0 WHERE id=:id');
		$hid->bindValue(':id', $id, PDO::PARAM_INT);
		$hid->execute();
	}
	public function unhide($id){
		$hid = $this->pdo->prepare('UPDATE main SET active=1 WHERE id=:id');
		$hid->bindValue(':id', $id, PDO::PARAM_INT);
		$hid->execute();
	}
	public function fixGaps(){
		$fix = $this->pdo->prepare('SET @counta = 0; UPDATE main SET position = @counta:=@counta + 1 WHERE leftpanel=1 ORDER BY position; SET @countb = 0; UPDATE main SET position = @countb:=@countb + 1 WHERE leftpanel=0 ORDER BY position');
		$fix->execute();
	}
	public function fixNewest(){
		$askm = $this->loadModel('ask');
		$newask = $askm->getNewest();
		$askid = $newask['id'];
		$newsm = $this->loadModel('news');
		$newnews = $newsm->getNewest();
		$newsid = $newnews['id'];
		$fix = $this->pdo->prepare('UPDATE main SET sourceid=:newsid WHERE source="news"; UPDATE main SET sourceid=:askid WHERE source="ask"');
		$fix->bindValue(':newsid', $newsid, PDO::PARAM_INT);
		$fix->bindValue(':askid', $askid, PDO::PARAM_INT);
		$fix->execute();
	}
	public function getConfig(){
		$conf = $this->loadModel('config');
		$data['header'] = $conf->get('header');
		$data['subheader'] = $conf->get('subheader');
		$data['email'] = $conf->get('email');
		$data['phone'] = $conf->get('phone');
		$data['content'] = $conf->get('mainContent');
		$data['shortContent'] = $conf->get('shortContent');
		return $data;
	}
	public function updateInfo($data){
		$header = $data['header'];
		$subheader = $data['subheader'];
		$email = $data['email'];
		$phone = $data['phone'];
		$content = $data['content'];
		$shortContent = $data['shortContent'];
		$conf = $this->loadModel('config');
		$conf->set('header', $header);
		$conf->set('subheader', $subheader);
		$conf->set('email', $email);
		$conf->set('phone', $phone);
		$conf->set('mainContent', $content);
		$conf->set('shortContent', $shortContent);
	}
}
?>
