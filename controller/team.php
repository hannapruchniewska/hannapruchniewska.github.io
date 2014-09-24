<?php
include_once 'controller/controller.php'; 
class TeamController extends Controller{
    public function index() {
        $view=$this->loadView('team');
        $view->index();
    }
    public function one(){
		$view = $this->loadView('team');
		$view->one();
	}
}
?>
