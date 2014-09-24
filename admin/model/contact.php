<?php
include_once 'model/model.php';
class ContactModel extends Model {
	public function getInfo(){
		$conf = $this->loadModel('config');
		$info['content'] = $conf->get('contactContent');
		$info['email'] = $conf->get('email');
		$info['phone'] = $conf->get('phone');
		return $info;
	}
	public function update($data){
		$conf = $this->loadModel('config');
		$conf->set('contactContent', $data['content']);
		$conf->set('email', $data['email']);
		$conf->set('phone', $data['phone']);
	}
}
?>
