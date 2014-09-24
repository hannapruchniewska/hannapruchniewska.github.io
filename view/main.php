<?php
include_once 'view/view.php';
class MainView extends View {
	public function index(){
		$model = $this->loadModel('breadcumbs');
		$infos = $this->loadModel('config');
		$this->set('infos', $infos->generate());
		
		$url = $model->parseUrl();
		$this->set('breadcumbs', $model->generate($url));
		$model = $this->loadModel('main');
		$data = $model->getAll();
		// $conf = $model->getConf();
		
		$this->set('siteTitle', 'Strona glowna');
		$this->set('mainData', $data);
		// $this->set('conf', $conf);
		$model = $this->loadModel('menu');
		$this->set('domain', $model->domain());
    $this->set('menuData', $model->generate());
    $this->render('mainIndex');
	}
}
?>
