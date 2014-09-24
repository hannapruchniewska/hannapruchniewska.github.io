<?php
include_once 'view/view.php';
class ContactView extends View {
	public function index(){
		$model = $this->loadModel('contact');
		$url = $model->parseUrl();
		$this->set('domain', $model->domain());
		$info = $model->getInfo();
		$this->set('contactData', $info);
		$this->set('siteTitle', 'Zarządzanie kontaktem');
		$model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
		$this->render('contactIndex');
	}
}
?>
