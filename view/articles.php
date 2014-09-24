<?php
include_once 'view/view.php';
class ArticlesView extends View {
	public function one(){
		$model = $this->loadModel('breadcumbs');
		$infos = $this->loadModel('config');
		$this->set('infos', $infos->generate());
		
		$url = $model->parseUrl();
		$this->set('breadcumbs', $model->generate($url));
		$model = $this->loadModel('articles');
		$this->set('domain', $model->domain());
		$data = $model->getOne($url[3]);
		$model = $this->loadModel('menu');
        $this->set('menuData', $model->generate());
		$this->set('articlesData', $data);
		$this->set('siteTitle', $data['title']);
		$this->render('articlesOne');
	}
}
?>
