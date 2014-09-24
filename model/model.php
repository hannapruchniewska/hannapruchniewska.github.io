<?php

abstract class Model{
    protected $pdo;
 
    public function  __construct() {
		try {
            require 'config/sql.php';
            $this->pdo=new PDO('mysql:host='.$host.';dbname='.$dbase, $user, $pass, array(
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
		require 'config/config.php';
		return $domain;
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
    public function getConf(){
        $conf = $this->select('config','*');
        return $conf;
    }
}
?>
