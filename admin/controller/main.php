<?php
include_once 'controller/controller.php';
class MainController extends Controller {
	public function index(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('main');
			$view->index();
		} else {
			session_start();
			$_SESSION['url'] = 'main';
			$this->redirect($domain.'/login');
		}
	}
	public function add(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('main');
			$view->add();
		} else {
			session_start();
			$_SESSION['url'] = 'main/add';
			$this->redirect($domain.'/login');
		}
	}
	public function insert(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('main');
			$model->insert($_POST);
			$this->redirect($domain.'/main');
		} else {
			session_start();
			$_SESSION['url'] = 'main';
			$this->redirect($domain.'/login');
		}
	}
	public function delete(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('main');
			$url = $model->parseUrl();
			$model->delete($url[3]);
			$this->redirect($domain.'/main');
		} else {
			session_start();
			$_SESSION['url'] = 'main';
			$this->redirect($domain.'/login');
		}
	}
	public function update(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('main');
			$url = $model->parseUrl();
			$model->update($_POST);
			$this->redirect($domain.'/main');
		} else {
			session_start();
			$_SESSION['url'] = 'main';
			$this->redirect($domain.'/login');
		}
	}
	public function updateInfo(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('main');
			$url = $model->parseUrl();
			$model->updateInfo($_POST);
			$this->redirect($domain.'/main');
		} else {
			session_start();
			$_SESSION['url'] = 'main';
			$this->redirect($domain.'/login');
		}
	}
	public function changePanel(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('main');
			$url = $model->parseUrl();
			$model->changePanel($url[3]);
			
			$this->redirect($domain.'/main');
		} else {
			session_start();
			$_SESSION['url'] = 'main';
			$this->redirect($domain.'/login');
		}
	}
	public function move(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('main');
			$url = $model->parseUrl();
			$data['id'] = $url[3];
			$data['mode'] = $url[4];
			$model->move($data);
			$this->redirect($domain.'/main');
		} else {
			session_start();
			$_SESSION['url'] = 'main';
			$this->redirect($domain.'/login');
		}
	}
	public function hide(){
	$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$url = $model->parseUrl();
			$model = $this->loadModel('main');
			$model->hide($url[3]);
			$this->redirect($domain.'/main');
		} else {
			session_start();
			$_SESSION['url'] = 'main';
			$this->redirect($domain.'/login');
		}
	}
	public function unhide(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$url = $model->parseUrl();
			$model = $this->loadModel('main');
			$model->unhide($url[3]);
			$this->redirect($domain.'/main');
		} else {
			session_start();
			$_SESSION['url'] = 'main';
			$this->redirect($domain.'/login');
		}
	}
}
?>
