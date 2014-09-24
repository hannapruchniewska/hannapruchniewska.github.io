<?php
include_once 'controller/controller.php';
class LoginController extends Controller {
	public function index(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$this->redirect($domain.'/news');
		} else {
			$view = $this->loadView('login');
			$view->index();
		}
	}
	public function login(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$this->redirect($domain.'/news');
		} else {
			$model->login($_POST);
			$domain = $model->domain();
			$url = $_SESSION['url'];
			if ($url == NULL) $url = 'news';
			$this->redirect($domain.'/'.$url);
		}
	}
	public function logout(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model->logout();
			$domain = $model->domain();
			$this->redirect($domain.'/');
		} else {
			$this->redirect($domain.'/news');
		}
	}
}
?>
