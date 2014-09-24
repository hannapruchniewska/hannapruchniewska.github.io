<?php
include_once 'view/view.php';
class ContactView extends View {
	public function index(){
		$model = $this->loadModel('breadcumbs');
		$infos = $this->loadModel('config');
		$this->set('infos', $infos->generate());
		
		$url = $model->parseUrl();
		$this->set('breadcumbs', $model->generate($url));
		$model = $this->loadModel('contact');
		$info = $model->getInfo();
		$this->set('siteTitle', 'Kontakt');
		$this->set('contactData', $info);
		$model = $this->loadModel('menu');
		$this->set('domain', $model->domain());
        $this->set('menuData', $model->generate());
        $this->render('contactIndex');
	}
}
?>
