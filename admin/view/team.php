<?php
include_once 'view/view.php'; 
class TeamView extends View{
    public function  index() {
        $model=$this->loadModel('team');
        $url = $model->parseUrl();
		$this->set('domain', $model->domain());
        $data = $model->getAll();
//        if ($data != NULL) $data = array_reverse($data);
        $this->set('teamData', $data);
        $this->set('siteTitle', 'Zarządzanie ludźmi');
        $model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
        $this->render('teamIndex');
    }
    public function  add() {
        $this->set('siteTitle','Dodaj osobę');
        $model = $this->loadModel('ask');
        $url = $model->parseUrl();
		$this->set('domain', $model->domain());
        $this->set('askNotify', $model->countWaiting());
        $this->render('teamAdd');
    }
    public function edit(){
		$model = $this->loadModel('team');
		$url = $model->parseUrl();
		$this->set('domain', $model->domain());
		$this->set('teamData', $model->getOne($url[3]));
		$this->set('siteTitle', 'Edytuj osobę');
		$model = $this->loadModel('ask');
        $this->set('askNotify', $model->countWaiting());
		$this->render('teamEdit');
	}
}
?>
