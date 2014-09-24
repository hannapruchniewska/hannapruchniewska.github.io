<?php
include_once 'controller/controller.php';
 
class NewsController extends Controller{
    public function index() {
        $view=$this->loadView('news');
        $view->index();
    }
    public function one(){
		$view = $this->loadView('news');
		$view->one();
	}
}
?>
