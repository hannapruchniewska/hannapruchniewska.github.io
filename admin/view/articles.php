<?php
include_once 'view/view.php';
class ArticlesView extends View {
	public function  index() {
        $model=$this->loadModel('articles');
        $url = $model->parseUrl();
		$this->set('domain', $model->domain());
        $this->set('articlesData', $model->getAll());
        $model=$this->loadModel('categories');
        $this->set('categoriesData', $model->getAll());
        $this->set('siteTitle', 'Zarządzanie artykułami');
        $model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
        $this->render('articlesIndex');
    }
    public function  add() {
		$model=$this->loadModel('categories');
		$url = $model->parseUrl();
		$this->set('domain', $model->domain());
        $this->set('categoriesData', $model->getAll());
        $this->set('siteTitle', 'Dodaj artykuł');
        $model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
        $this->render('articlesAdd');
    }
    public function edit(){
		$model = $this->loadModel('articles');
		$url = $model->parseUrl();
		$this->set('domain', $model->domain());
		$this->set('articlesData', $model->getOne($url[3]));
		$model=$this->loadModel('categories');
        $this->set('categoriesData', $model->getAll());
		$this->set('siteTitle', 'Edytuj artykuł');
		$model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
		$this->render('articlesEdit');
	}
}
?>
