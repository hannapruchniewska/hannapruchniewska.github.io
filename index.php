<?php
include_once 'controller/news.php';
include_once 'controller/ask.php';
include_once 'controller/categories.php';
include_once 'controller/articles.php';
include_once 'controller/contact.php';
include_once 'controller/main.php';
include_once 'controller/team.php';
include_once 'model/main.php';
$m = new MainModel();
$url = $m->parseUrl();
$domain = $m->domain();
$adminUrl = '';
foreach($url as $element){
	if ($element != NULL && $element != '' ){
		$adminUrl .= '/'.$element;
	}
}
// if($url[1] == 'admin') header("Location: ".$domain.$adminUrl);

if ($url[1] != 'admin'){
	if($url[1] == ''){
		$url[1] = 'main';
	}

	if(!isset($url[2]) || $url[2] == ''){
		$url[2] = 'index';
	}

	$ctrl = $url[1].'Controller';
	$o = new $ctrl();
	$o->$url[2]();
}
/*
if($_GET['task']=='news') {
    include 'controller/news.php';
    $o = new NewsController();
    $o->$_GET['action']();
} else if ($_GET['task'] == 'ask'){
	include 'controller/ask.php';
	$o = new AskController();
	$o->$_GET['action']();
} else if ($_GET['task'] == 'categories'){
	include 'controller/categories.php';
	$o = new CategoriesController();
	$o->$_GET['action']();
} else if ($_GET['task'] == 'articles'){
	include 'controller/articles.php';
	$o = new ArticlesController();
	$o->$_GET['action']();
} else if ($_GET['task'] == 'contact'){
	include 'controller/contact.php';
	$o = new ContactController();
	$o->$_GET['action']();
}
*/
?>
