<?php
include_once 'view/view.php';
class MainView extends View {
	public function index(){
		$model = $this->loadModel('main');
		$this->set('mainConfigData', $model->getConfig());
		$url = $model->parseUrl();
		$this->set('domain', $model->domain());
		$mainData['left'] = $model->getAllFromPanel(1);
		$mainData['right'] = $model->getAllFromPanel(0);
		$this->set('mainData', $mainData);
		$this->set('siteTitle','Zarządzanie stroną główną');
		$model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
		$this->render('mainIndex');
	}
	public function add(){
		$model = $this->loadModel('main');
		$url = $model->parseUrl();
		$this->set('domain', $model->domain());
		$this->set('siteTitle','Dodaj do strony głównej');
		$model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
        $model = $this->loadModel('categories');
        $this->set('categoriesData', $model->getAll());
        $model = $this->loadModel('articles');
        $this->set('articlesData', $model->getAll());
		$this->render('mainAdd');
	}
}
?>
