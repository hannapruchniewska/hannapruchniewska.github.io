<?php
include_once 'view/view.php';
 
class NewsView extends View{
    public function  index() {
        $model=$this->loadModel('news');
        $url = $model->parseUrl();
		$this->set('domain', $model->domain());
        $data = $model->getAll();
//        if ($data != NULL) $data = array_reverse($data);
        $this->set('newsData', $data);
        $this->set('siteTitle', 'Zarządzanie aktualnościami');
        $model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
        $this->render('newsIndex');
    }
    public function  add() {
        $this->set('siteTitle','Dodaj newsa');
        $model = $this->loadModel('ask');
        $url = $model->parseUrl();
		$this->set('domain', $model->domain());
        $this->set('askNotify', $model->countWaiting());
        $this->render('newsAdd');
    }
    public function edit(){
		$model = $this->loadModel('news');
		$url = $model->parseUrl();
		$this->set('domain', $model->domain());
		$this->set('newsData', $model->getOne($url[3]));
		$this->set('siteTitle', 'Edytuj newsa');
		$model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
		$this->render('newsEdit');
	}
}
?>
