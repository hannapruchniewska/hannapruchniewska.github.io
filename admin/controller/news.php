<?php
include_once 'controller/controller.php';
 
class NewsController extends Controller{
    public function index() {
        $model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('news');
			$view->index();
		} else {
			session_start();
			$_SESSION['url'] = 'news';
			$this->redirect($domain.'/login');
		}
    }
    public function add() {
        $model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('news');
			$view->add();
		} else {
			session_start();
			$_SESSION['url'] = 'news/add';
			$this->redirect($domain.'/login');
		}
    }
    public function edit(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('news');
			$view->edit();
		} else {
			session_start();
			$_SESSION['url'] = 'news/edit';
			$this->redirect($domain.'/login');
		}
	}
    public function insert() {
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model=$this->loadModel('news');
			$model->insert($_POST);
			$this->redirect($domain.'/news');
		} else {
			session_start();
			$_SESSION['url'] = 'news';
			$this->redirect($domain.'/login');
		}
    }
    public function update(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('news');
			$model->update($_POST);
			$this->redirect($domain.'/news');
		} else {
			session_start();
			$_SESSION['url'] = 'news';
			$this->redirect($domain.'/login');
		}
	}
    public function hide(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model=$this->loadModel('news');
			$url = $model->parseUrl();
			$model->hide($url[3]);
			$this->redirect($domain.'/news');
		} else {
			session_start();
			$_SESSION['url'] = 'news';
			$this->redirect($domain.'/login');
		}
	}
	public function unhide(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model=$this->loadModel('news');
			$url = $model->parseUrl();
			$model->unhide($url[3]);
			$this->redirect($domain.'/news');
		} else {
			session_start();
			$_SESSION['url'] = 'news';
			$this->redirect($domain.'/login');
		}
	}
    public function delete() {
        $model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model=$this->loadModel('news');
			$url = $model->parseUrl();
			$model->delete($url[3]);;
			$this->redirect($domain.'/news');
		} else {
			session_start();
			$_SESSION['url'] = 'news';
			$this->redirect($domain.'/login');
		}
    }
}
?>
