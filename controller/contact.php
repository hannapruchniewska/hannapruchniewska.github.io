<?php
include_once 'controller/controller.php';
class ContactController extends Controller {
	public function index(){
		$view = $this->loadView('contact');
		$view->index();
	}
	public function send(){
		$model = $this->loadModel('contact');
		$model->send($_POST);
		$domain = $model->domain();
		$this->redirect($domain.'/');
	}
}
?>
