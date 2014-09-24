<?php
include_once 'controller/controller.php';
 
class CategoriesController extends Controller{
    public function index() {
        $model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('categories');
			$view->index();
		} else {
			session_start();
			$_SESSION['url'] = 'categories';
			$this->redirect($domain.'/login');
		}
    }
    public function add() {
        $model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('categories');
			$view->add();
		} else {
			session_start();
			$_SESSION['url'] = 'categories/add';
			$this->redirect($domain.'/login');
		}
    }
    public function edit(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('categories');
			$view->edit();
		} else {
			session_start();
			$_SESSION['url'] = 'categories/edit';
			$this->redirect($domain.'/login');
		}
	}
    public function insert() {
        $model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model=$this->loadModel('categories');
			$model->insert($_POST);
			$this->redirect($domain.'/categories');
		} else {
			session_start();
			$_SESSION['url'] = 'categories';
			$this->redirect($domain.'/login');
		}
    }
    public function update(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('categories');
			$model->update($_POST);
			$this->redirect($domain.'/categories');
		} else {
			session_start();
			$_SESSION['url'] = 'categories';
			$this->redirect($domain.'/login');
		}
	}
    public function delete() {
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model=$this->loadModel('categories');
			$url = $model->parseUrl();
			$model->delete($url[3], $url[4]);;
			$this->redirect($domain.'/categories');
		} else {
			session_start();
			$_SESSION['url'] = 'categories';
			$this->redirect($domain.'/login');
		}
    }
}
?>
