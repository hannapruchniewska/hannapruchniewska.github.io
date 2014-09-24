<?php
include_once 'controller/controller.php';
	class AskController extends Controller{
		public function index(){
			$view = $this->loadView('ask');
			$view->index();
		}
		public function insert(){
			$model = $this->loadModel('ask');
			$model->insert($_POST);
			$domain = $model->domain();
			$this->redirect($domain.'/ask');
		}
	}
?>
