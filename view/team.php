<?php
include_once 'view/view.php';
class TeamView extends View{
    public function  index() {
        $model = $this->loadModel('breadcumbs');
        $infos = $this->loadModel('config');
        $this->set('infos', $infos->generate());
		$url = $model->parseUrl();
		$this->set('breadcumbs', $model->generate($url));
        $model=$this->loadModel('team');
        $data = $model->getAll();
        //if ($data != NULL) $data = array_reverse($data);
        $model = $this->loadModel('menu');
        $this->set('domain', $model->domain());
        $this->set('menuData', $model->generate());
        $this->set('teamData', $data);
        $this->set('siteTitle', 'Komitet Wyborczy');
        $this->render('teamIndex');
    }
    public function one(){
		$model = $this->loadModel('breadcumbs');
		$url = $model->parseUrl();
		$this->set('breadcumbs', $model->generate($url));
		$model = $this->loadModel('team');
		$data = $model->getOne($url[3]);
		$model = $this->loadModel('menu');
		$this->set('domain', $model->domain());
        $this->set('menuData', $model->generate());
		$this->set('teamData', $data);
		$this->set('siteTitle', $data['name']);
		$this->render('teamOne');
	}
}
?>
