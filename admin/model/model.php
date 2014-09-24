<?php

abstract class Model{
    protected $pdo;
 
    public function  __construct() {
		try {
            require '../config/sql.php';
            $this->pdo=new PDO('mysql:host='.$host.';dbname='.$dbase, $user, $pass,  array(
                PDO::ATTR_PERSISTENT => true,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(DBException $e) {
            echo 'Cannot create connection: ' . $e->getMessage();
        }        
    }
 
    public function loadModel($name, $path='model/') {
 		$path = $path.$name.'.php';
		$name = $name.'Model';
		try {
            if(is_file($path)) {
                require_once $path;
                $o=new $name();
            } else {
                throw new Exception('Can not open model '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;
        }
        return $o;
    }
 
    public function select($from, $select='*', $where=NULL, $order=NULL, $limit=NULL) {
		$query='SELECT '.$select.' FROM '.$from;
		if($where!=NULL)
			$query=$query.' WHERE '.$where;
		if($order!=NULL)
            $query=$query.' ORDER BY '.$order;
        if($limit!=NULL)
            $query=$query.' LIMIT '.$limit;
 
        $select=$this->pdo->query($query);
        foreach ($select as $row) {
            $data[]=$row;
        }
        $select->closeCursor();
 
        return $data;
    }
  public function domain(){
		require '../config/config.php';
		return $domain.'/admin';
	}
	public function getImageExts(){
		require '../config/config.php';
		return $imageExts;
	}
    public function parseUrl(){
		$url = $_SERVER['REQUEST_URI'];
		$domain = $this->domain();
		if ($domain != '/'){
			$url = str_replace($domain,'',$url);
		}
		$url = explode('/', $url);
		return $url;
	}
	public function uploadImage($image, $path){
		$imageExts = $this->getImageExts();
		$temp = explode(".", $_FILES['image']['name']);
		$extension = end($temp);
		$extension = strtolower($extension);
		if ((($image['type'] == 'image/gif')
		|| ($image['type'] == 'image/jpeg')
		|| ($image['type'] == 'image/jpg')
		|| ($image['type'] == 'image/pjpeg')
		|| ($image['type'] == 'image/x-png')
		|| ($image['type'] == 'image/png'))
		&& ($image['size'] < 1024*1024)
		&& in_array($extension, $imageExts)
		&& $image['error'] <= 0) {
			$newname = $this->generateRandomString().'.'.$extension;
			if (DIRECTORY_SEPARATOR == '/'){
				// UNIX //
				move_uploaded_file($image['tmp_name'], '../images/'.$path.'/fullsize/'.$newname);
				include_once 'vendor/php-image-magician/php_image_magician.php';
				$magician = new imageLib('../images/'.$path.'/fullsize/'.$newname);
				$magician->resizeImage(450, 450, 'crop');
				$magician->saveImage('../images/'.$path.'/'.$newname);
				$magician = new imageLib('../images/'.$path.'/fullsize/'.$newname);
				$magician->resizeImage(150,150);
				$magician->saveImage('../images/'.$path.'/thumbnails/'.$newname);
			} else if (DIRECTORY_SEPARATOR == '\\'){
				// WINDOWS //
				move_uploaded_file($image['tmp_name'], '..\images\\'.$path.'\fullsize\\'.$newname);
				include_once 'vendor\php-image-magician\php_image_magician.php';
				$magician = new imageLib('..\images\\'.$path.'\fullsize\\'.$newname);
				$magician->resizeImage(450, 450, 'crop');
				$magician->saveImage('..\images\\'.$path.'\\'.$newname);
				$magician = new imageLib('..\images\\'.$path.'\fullsize\\'.$newname);
				$magician->resizeImage(150,150,'crop');
				$magician->saveImage('..\images\\'.$path.'\thumbnails\\'.$newname);
				
			}
		}
		return $newname;
	}
	public function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	public function checkImage($image, $path){
		if (DIRECTORY_SEPARATOR == '/' ){
			if ($image == NULL || !file_exists('../images/'.$path.'/'.$image)){
				$image = 'default.jpg';
			}
		} else if (DIRECTORY_SEPARATOR == '\\'){
			if ($image == NULL || !file_exists( '..\images\\'.$path.'\\'.$image)){
				$image = 'default.jpg';
			}
		}
		return $image;
	}
}
?>
