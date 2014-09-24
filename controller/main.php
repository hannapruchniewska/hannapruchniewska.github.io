<?php
include_once 'controller/controller.php';
class MainController extends Controller {
	public function index(){
		$view = $this->loadView('main');
		$view->index();
	}
}
?>
