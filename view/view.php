<?php

abstract class View{
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

    public function render($name, $path='templates/', $header='header', $menu='menu', $footer='footer') {
		$header = $path.$header.'.html.php';
		// $menu = $path.$menu.'.html.php';
		$footer = $path.$footer.'.html.php';
		$path=$path.$name.'.html.php';
		try {
            if(is_file($header)) {
                require_once $header;
            } else {
                throw new Exception('Can not open header template.');
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;
        }
        // try {
        //     if(is_file($menu)) {
        //         require_once $menu;
        //     } else {
        //         throw new Exception('Can not open menu template.');
        //     }
        // }
        // catch(Exception $e) {
        //     echo $e->getMessage().'<br />
        //         File: '.$e->getFile().'<br />
        //         Code line: '.$e->getLine().'<br />
        //         Trace: '.$e->getTraceAsString();
        //     exit;
        // }
        try {
            if(is_file($path)) {
                require_once $path;
            } else {
                throw new Exception('Can not open template '.$name.' in: '.$path);
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;
        }
        try {
            if(is_file($footer)) {
                require_once $footer;
            } else {
                throw new Exception('Can not open footer template.');
            }
        }
        catch(Exception $e) {
            echo $e->getMessage().'<br />
                File: '.$e->getFile().'<br />
                Code line: '.$e->getLine().'<br />
                Trace: '.$e->getTraceAsString();
            exit;
        }
    }

    public function set($name, $value) {
		$this->$name = $value;
    }

    public function get($name) {
		return $this->$name;
    }
}
?>
