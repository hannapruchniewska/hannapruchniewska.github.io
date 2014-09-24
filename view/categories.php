<?php
include_once 'view/view.php';
class CategoriesView extends View {
	public function index(){
		$model = $this->loadModel('breadcumbs');
		$infos = $this->loadModel('config');
		$this->set('infos', $infos->generate());

		$url = $model->parseUrl();
		$this->set('breadcumbs', $model->generate($url));
		$model = $this->loadModel('categories');
		$this->set('categoriesData', $model->getAll());
		$model = $this->loadModel('articles');
		$this->set('articlesData', $model->getAllFromCategory(0));
		$model = $this->loadModel('menu');
		$this->set('domain', $model->domain());
        $this->set('menuData', $model->generate());
		$this->set('siteTitle', 'Kategorie');
		$this->render('categoriesIndex');
	}
	public function one(){
		$model = $this->loadModel('breadcumbs');
		$infos = $this->loadModel('config');
		$this->set('infos', $infos->generate());
		
		$url = $model->parseUrl();
		$this->set('breadcumbs', $model->generate($url));
		$model = $this->loadModel('categories');
		$catData = $model->getOne($url[3]);
		$this->set('categoriesData', $catData);
		$model = $this->loadModel('articles');
		$this->set('articlesData', $model->getAllFromCategory($url[3]));
		$model = $this->loadModel('menu');
		$this->set('domain', $model->domain());
        $this->set('menuData', $model->generate());
		$this->set('siteTitle', $catData['name']);
		$this->render('categoriesOne');
	}	
}
?>
