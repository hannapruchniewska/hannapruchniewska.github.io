<?php
include_once 'controller/controller.php';

class ArticlesController extends Controller {
	public function one(){
		$view = $this->loadView('articles');
		$view->one($id);
	}
}
?>
