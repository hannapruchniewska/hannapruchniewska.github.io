<?php
include_once 'controller/controller.php';
class ArticlesController extends Controller {
	public function index(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('articles');
			$view->index();
		} else {
			session_start();
			$_SESSION['url'] = 'articles';
			$this->redirect($domain.'/login');
		}
	}
	public function add(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('articles');
			$view->add();
		} else {
			session_start();
			$_SESSION['url'] = 'articles/add';
			$this->redirect($domain.'/login');
		}
	}
	public function edit(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('articles');
			$view->edit();
		} else {
			session_start();
			$_SESSION['url'] = 'articles/edit';
			$this->redirect($domain.'/login');
		}
	}
	public function delete(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('articles');
			$url = $model->parseUrl();
			$model->delete($url[3]);
			$this->redirect($domain.'/articles');
		} else {
			session_start();
			$_SESSION['url'] = 'articles';
			$this->redirect($domain.'/login');
		}
	}
	public function insert(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('articles');
			$model->insert($_POST);
			$this->redirect($domain.'/articles');
		} else {
			session_start();
			$_SESSION['url'] = 'articles';
			$this->redirect($domain.'/login');
		}
	}
	public function update(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('articles');
			$model->update($_POST);
			$this->redirect($domain.'/articles');
		} else {
			session_start();
			$_SESSION['url'] = 'articles';
			$this->redirect($domain.'/login');
		}
	}
}
?>
