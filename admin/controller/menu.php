<?php
include_once 'controller/controller.php';
class MenuController extends Controller {
	public function index(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$view = $this->loadView('menu');
			$view->index();
		} else {
			session_start();
			$_SESSION['url'] = 'menu';
			$this->redirect($domain.'/login');
		}
	}
	public function update(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('menu');
			$model->update($_POST);
			$this->redirect($domain.'/menu');
		} else {
			$_SESSION['url'] = 'menu';
			$this->redirect($domain.'/login');
		}
	}
	public function move(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('menu');
			$url = $model->parseUrl();
			$data['position'] = $url[3];
			$data['mode'] = $url[4];
			$model->move($data);
			$this->redirect($domain.'/menu');
		} else {
			$_SESSION['url'] = 'menu';
			$this->redirect($domain.'/login');
		}
	}
	public function insert(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('menu');
			$url = $model->parseUrl();
			$data['menuAdd'] = $url[3];
			$data['id'] = $url[4];
			$data['submenu'] = $url[5];
			$model->insert($data);
			$this->redirect($domain.'/menu');
		} else {
			$_SESSION['url'] = 'menu';
			$this->redirect($domain.'/login');
		}
	}
	public function hide(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('menu');
			$url = $model->parseUrl();
			$model->hide($url[3]);
			$this->redirect($domain.'/menu');
		} else {
			$_SESSION['url'] = 'menu';
			$this->redirect($domain.'/login');
		}
	}
	public function unhide(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('menu');
			$url = $model->parseUrl();
			$model->unhide($url[3]);
			$this->redirect($domain.'/menu');
		} else {
			$_SESSION['url'] = 'menu';
			$this->redirect($domain.'/login');
		}
	}
	public function delete(){
		$model = $this->loadModel('login');
		$domain = $model->domain();
		$logged = $model->check();
		if ($logged == true){
			$model = $this->loadModel('menu');
			$url = $model->parseUrl();
			$model->delete($url[3]);
			$this->redirect($domain.'/menu');
		} else {
			$_SESSION['url'] = 'menu';
			$this->redirect($domain.'/login');
		}
		
	}
}
?>
