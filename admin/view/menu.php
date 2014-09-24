<?php
include_once 'view/view.php';
class MenuView extends View {
	public function index(){
		$model = $this->loadModel('menu');
		$url = $model->parseUrl();
		$this->set('domain', $model->domain());
		$this->set('menuData', $model->getAll());
		$this->set('siteTitle','Zarządzanie menu');
		$model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
		$this->render('menuIndex');
	}
}
?>
