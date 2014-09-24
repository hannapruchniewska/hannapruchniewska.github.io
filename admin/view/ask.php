<?php
include_once 'view/view.php';

class AskView extends View {
	public function index(){
		$model = $this->loadModel('ask');
		$url = $model->parseUrl();
		$this->set('domain', $model->domain());
		$waiting = $model->getAllWaiting();
		$answered = $model->getAllAnswered();
		if ($answered != NULL) $answered = array_reverse($answered);
		$this->set('waitingData', $waiting);
		$this->set('answeredData', $answered);
		$this->set('siteTitle', 'Zarządzanie pytaniami');
        $this->set('askNotify', $model->countWaiting());
		$this->render('askIndex');
	}
}
?>
