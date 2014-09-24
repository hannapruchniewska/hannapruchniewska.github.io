<?php
include_once 'view/view.php';
class LoginView extends View {
	public function index(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$this->set('siteTitle', 'Logowanie');
		$this->set('domain', $domain);
		$this->set('logged', $model->check());
		$this->render('loginIndex');
	}
}
?>
