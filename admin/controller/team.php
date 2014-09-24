<?php
include_once 'controller/controller.php';
class TeamController extends Controller {
    public function index() {
        $model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('team');
			$view->index();
		} else {
			session_start();
			$_SESSION['url'] = 'team';
			$this->redirect($domain.'/login');
		}
    }
    public function add() {
        $model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('team');
			$view->add();
		} else {
			session_start();
			$_SESSION['url'] = 'team/add';
			$this->redirect($domain.'/login');
		}
    }
    public function edit(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('team');
			$view->edit();
		} else {
			session_start();
			$_SESSION['url'] = 'team/edit';
			$this->redirect($domain.'/login');
		}
	}
    public function insert() {
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model=$this->loadModel('team');
			$model->insert($_POST);
			$this->redirect($domain.'/team');
		} else {
			session_start();
			$_SESSION['url'] = 'team';
			$this->redirect($domain.'/login');
		}
    }
    public function update(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('team');
			$model->update($_POST);
			$this->redirect($domain.'/team');
		} else {
			session_start();
			$_SESSION['url'] = 'team';
			$this->redirect($domain.'/login');
		}
	}
    public function delete() {
        $model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model=$this->loadModel('team');
			$url = $model->parseUrl();
			$model->delete($url[3]);;
			$this->redirect($domain.'/team');
		} else {
			session_start();
			$_SESSION['url'] = 'team';
			$this->redirect($domain.'/login');
		}
    }
}
?>
