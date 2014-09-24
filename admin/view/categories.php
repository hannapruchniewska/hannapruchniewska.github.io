<?php
include_once 'view/view.php';
 
class CategoriesView extends View{
    public function  index() {
        $model=$this->loadModel('categories');
        $url = $model->parseUrl();
		$this->set('domain', $model->domain());
        $this->set('categoriesData', $model->getAll());
        $this->set('siteTitle', 'Zarządzanie kategoriami');
        $model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
        $this->render('categoriesIndex');
    }
    public function  add() {
		$this->set('siteTitle', 'Dodaj kategorię');
		$model = $this->loadModel('ask');
		$url = $model->parseUrl();
		$this->set('domain', $model->domain());
        $this->set('askNotify', $model->countWaiting());
        $this->render('categoriesAdd');
    }
    public function edit(){
		$model = $this->loadModel('categories');
		$url = $model->parseUrl();
		$this->set('domain', $model->domain());
		$this->set('categoriesData', $model->getOne($url[3]));
		$this->set('siteTitle', 'Edytuj kategorię');
		$model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
		$this->render('categoriesEdit');
	}
}
?>
