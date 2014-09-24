<?php
include_once 'model/model.php';
class LoginModel extends Model {
	public function login($data){
		session_start();
		$user = $_POST['username'];
		$pass = md5($_POST['password'].'gm19mp91');
		$auto = $_POST['autologin'];
		if ($auto != 1) $auto = 0;
		$ct = $this->pdo->prepare('SELECT COUNT(*) FROM users WHERE username=:username AND password=:password');
		$ct->bindValue(':username', $user, PDO::PARAM_STR);
		$ct->bindValue(':password', $pass, PDO::PARAM_STR);
		$ct->execute();
		foreach($ct as $row){
			$count = $row['COUNT(*)'];
		}
		if ($count == 1){
			$_SESSION['logged_in'] = "HannaPruchniewska";
			if ($auto == 1){
				setcookie('autologin', 1, time()+60*60*24*30);
			}
		}		
	}
	public function logout(){
		session_start();
		session_destroy();
		if (isset($_COOKIE['autologin'])){
			unset($_COOKIE['autologin']);
			setcookie('autologin', null, time()-3600);
		}
	}
	public function check(){
		session_start();
		if (isset($_COOKIE['autologin'])){
			$_SESSION['logged_in'] = "HannaPruchniewska";
		}
		if (isset($_SESSION['logged_in'])){
			return true;
		} else {
			return false;
		}
	}
}
?>
