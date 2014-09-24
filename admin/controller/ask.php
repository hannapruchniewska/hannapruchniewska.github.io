<?php
include_once 'controller/controller.php';

class AskController extends Controller {
	public function index(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('ask');
			$view->index();
		} else {
			session_start();
			$_SESSION['url'] = 'ask';
			$this->redirect($domain.'/login');
		}
	}
	public function answer(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('ask');
			$model->answer($_POST);
			$this->redirect($domain.'/ask');
		} else {
			session_start();
			$_SESSION['url'] = 'ask';
			$this->redirect($domain.'/login');
		}
	}
	public function delete(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('ask');
			$url = $model->parseUrl();
			$model->delete($url[3]);
			$this->redirect($domain.'/ask');
		} else {
			session_start();
			$_SESSION['url'] = 'ask';
			$this->redirect($domain.'/login');
		}
	}
	public function update(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('ask');
			$model->update($_POST);
			$this->redirect($domain.'/ask');
		} else {
			session_start();
			$_SESSION['url'] = 'ask';
			$this->redirect($domain.'/login');
		}
	}
}
?>
