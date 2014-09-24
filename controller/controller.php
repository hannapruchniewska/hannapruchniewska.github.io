<?php

abstract class Controller{
 
    public function redirect($url) {
		header("Location: ".$url);
    }
 
    public function loadView($name, $path='view/') {
		$path = $path.$name.'.php';
		$name = $name.'View';
		try {
            if(is_file($path)) {
                require_once $path;
                $o=new $name();
            } else {
                throw new Exception('Can not open view '.$name.' in: '.$path);
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
}
?>
