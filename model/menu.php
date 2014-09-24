<?php
include_once 'model/model.php';
class MenuModel extends Model {
	public function generate(){
		$data = $this->select('menu','*',NULL,'position');
		$menu = array();
		foreach((array)$data as $row){
			if ($row['active'] == 1){
				$element['url'] = $row['url'];
				$element['name'] = $row['name'];
				$element['menuName'] = explode('/', $row['url']);
				if ($row['submenu'] == -1){
					$catmodel = $this->loadModel('categories');
					$cats = $catmodel->getAll();
					foreach((array)$cats as $cat){
						$submenu[] = array(
							'url' => $domain.'/categories/one/'.$cat['id'],
							'name' => $cat['name']
						);
					}
					$element['submenu'] = $submenu;
				} else if ($row['submenu'] != 0){
					$artmodel = $this->loadModel('articles');
					$arts = $artmodel->getAllFromCategory($row['submenu']);
					foreach ((array)$arts as $art){
						$submenu[] = array(
							'url' => $domain.'/articles/one/'.$art['id'],
							'name' => $art['title']
						);
					}
					$element['submenu'] = $submenu;
				}
				$menu[] = $element;
			}
		}
		return $menu;
	}
}
?>
