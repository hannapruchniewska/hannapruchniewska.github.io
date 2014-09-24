<?php
include_once 'model/model.php';
class MainModel extends Model {
	public function getAll(){
		$left = $this->select('main','*','leftpanel=1 AND active=1', 'position');
		$right = $this->select('main','*','leftpanel=0 AND active=1', 'position');
		foreach ($left as $wdg){
			$wmodel = $this->loadModel($wdg['source']);
			$src = $wmodel->getOne($wdg['sourceid']);
			$element['source'] = $wdg['source'];
			if (isset($src['image'])) $element['image'] = $src['image'];
			$element['title'] = $wdg['title'];
			if ($wdg['source'] == 'news') $element['newsTitle'] = $src['title'];
			if($wdg['showcontent'] == 1) {
				if (isset($src['shortcontent'])){
					$element['content'] = $src['shortcontent'];
				} else if (isset($src['content'])){
					$element['content'] = $src['content'];
				}
			}
			if ($wdg['source'] == 'ask'){
				$element['question'] = $src['question'];
				$element['answer'] = $src['answer'];
			}
			$element['url'] = $this->domain().'/'.$wdg['source'];
			if (isset($src['created'])) $element['date'] = $src['created'];
			if (isset($src['asked'])) $element['date'] = $src['asked'];
			if ($wdg['source'] != 'ask') $element['url'] .= '/one/'.$src['id'];
			if ($src['showlinks'] == 1){
				$amodel = $this->loadModel('articles');
				$arts = $amodel->getAllFromCategory((int)$src['id']);
				foreach ((array)$arts as $art){
					$element['links'][]['title'] = $art['title'];
					$element['links'][]['url'] = $this->domain().'/articles/one'.$art['id'];
				}
			}
			$leftpanel[] = $element;
		}
		foreach ((array)$right as $wdg){
			$wmodel = $this->loadModel($wdg['source']);
			$src = $wmodel->getOne($wdg['sourceid']);
			$element['source'] = $wdg['source'];
			$element['title'] = $wdg['title'];
			if($wdg['showcontent'] == 1) {
				if (isset($src['shortcontent'])){
					$element['content'] = $src['shortcontent'];
				} else if (isset($src['content'])){
					$element['content'] = $src['content'];
				}
			}
			if ($wdg['source'] == 'ask'){
				$element['question'] = $src['question'];
				$element['answer'] = $src['answer'];
			}
			$element['url'] = $this->domain().'/'.$wdg['source'];
			if (isset($src['created'])) $element['date'] = $src['created'];
			if (isset($src['asked'])) $element['date'] = $src['asked'];
			if ($wdg['source'] != 'ask') $element['url'] .= '/one/'.$src['id'];
			if ($src['showlinks'] == 1){
				$amodel = $this->loadModel('articles');
				$arts = $amodel->getAllFromCategory((int)$src['id']);
				foreach ((array)$arts as $art){
					$element['links'][]['title'] = $art['title'];
					$element['links'][]['url'] = $this->domain().'/articles/one'.$art['id'];
				}
			}
			$rightpanel[] = $element;
		}

		$data['left'] = $leftpanel;
		$data['right'] = $rightpanel;
		return $data;
		// $data[0] = $left;
		// $data[1] = $right;
		// print_r($data);

		//return $data;
	}
	
}
?>
