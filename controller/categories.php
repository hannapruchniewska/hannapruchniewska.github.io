<?php
include_once 'controller/controller.php';
class CategoriesController extends Controller {
	public function index(){
		$view = $this->loadView('categories');
		$view->index();
	}
	public function one(){
		$view = $this->loadView('categories');
		$view->one();
	}
}
?>
