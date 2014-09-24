<?php
	include_once 'view/view.php';
	
	class AskView extends View {
		public function index(){
			$model = $this->loadModel('breadcumbs');
			$infos = $this->loadModel('config');
			$this->set('infos', $infos->generate());
			
			$url = $model->parseUrl();
			$this->set('breadcumbs', $model->generate($url));
			$model = $this->loadModel('ask');
			$data = $model->getAllAnswered();
			if ($data!=NULL) $data = array_reverse($data);
			$model = $this->loadModel('menu');
			$this->set('domain', $model->domain());
			$this->set('menuData', $model->generate());
			$this->set('askData', $data);
			$this->set('siteTitle', 'Pytania');
			$this->render('askIndex');
		}
	}
?>
