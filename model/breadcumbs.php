<?php
include_once 'model/model.php';
class BreadcumbsModel extends Model {
	public function generate($url){
		$domain = $this->domain();
		$element['url'] = $domain.'/';
		$element['title'] = 'Strona Główna';
		$bread[] = $element;
		switch($url[1]){
			case 'news':
				$element['url'] = $domain.'/news';
				$element['title'] = 'Aktualności';
				$bread[] = $element;
				switch($url[2]){
					case 'one';
						$newsm = $this->loadModel('news');
						$news = $newsm->getOne($url[3]);
						$element['url'] = $domain.'/news/one/'.$url[3];
						$element['title'] = $news['title'];
						$bread[] = $element;
					break;
				}
			break;
			case 'ask':
				$element['url'] = $domain.'/ask';
				$element['title'] = 'Pytania';
				$bread[] = $element;
			break;
			case 'categories':
				switch($url[2]){
					case 'one':
						$catm = $this->loadModel('categories');
						$cat = $catm->getOne($url[3]);
						$element['url'] = $domain.'/categories/one/'.$cat['id'];
						$element['title'] = $cat['name'];
						$bread[] = $element;
					break;
					default:
						$element['url'] = $domain.'/categories';
						$element['title'] = 'Kategorie';
						$bread[] = $element;
					break;
				}
			break;
			case 'articles':
				$artm = $this->loadModel('articles');
				$art = $artm->getOne($url[3]);
				if ($art['category'] != 0){
					$catm = $this->loadModel('categories');
					$cat = $catm->getOne($art['category']);
					$element['url'] = $domain.'/categories/one/'.$cat['id'];
					$element['title'] = $cat['name'];
					$bread[] = $element;
				}
				$element['url'] = $domain.'/articles/one/'.$art['id'];
				$element['title'] = $art['title'];
				$bread[] = $element;
			break;
			case 'contact':
				$element['url'] = $domain.'/contact';
				$element['title'] = 'Kontakt';
				$bread[] = $element;
			break;
		}
		return $bread;
	}
}
?>
