<?php
include_once 'view/view.php';
 
class NewsView extends View{
    public function  index() {
        $model = $this->loadModel('breadcumbs');
        $infos = $this->loadModel('config');
        $this->set('infos', $infos->generate());
        
		$url = $model->parseUrl();
		$this->set('breadcumbs', $model->generate($url));
        $model=$this->loadModel('news');
        $data = $model->getAllActive();
        //if ($data != NULL) $data = array_reverse($data);
        $model = $this->loadModel('menu');
        $this->set('domain', $model->domain());
        $this->set('menuData', $model->generate());
        $this->set('newsData', $data);
        $this->set('siteTitle', 'Aktualności');
        $this->render('newsIndex');
    }
    public function one(){
		$model = $this->loadModel('breadcumbs');
		$url = $model->parseUrl();
		$this->set('breadcumbs', $model->generate($url));
		$model = $this->loadModel('news');
		$data = $model->getOne($url[3]);
		$model = $this->loadModel('menu');
		$this->set('domain', $model->domain());
        $this->set('menuData', $model->generate());
		$this->set('newsData', $data);
		$this->set('siteTitle', $data['title']);
		$this->render('newsOne');
	}
}
?>
