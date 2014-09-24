<?php
include_once 'controller/controller.php';
class ContactController extends Controller {
	public function index (){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('contact');
			$view->index();
		} else {
			session_start();
			$_SESSION['url'] = 'contact';
			$this->redirect($domain.'/login');
		}
	}
	public function update(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('contact');
			$model->update($_POST);
			$this->redirect($domain.'/contact');
		} else {
			session_start();
			$_SESSION['url'] = 'contact';
			$this->redirect($domain.'/login');
		}
	}
}
?>
