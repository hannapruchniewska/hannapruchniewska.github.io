<?php

include_once 'model/model.php';

class ContactModel extends Model {

	public function getInfo(){
		$data = $this->select('contact');
		foreach($data as $row){
			return $row;
		}
	}

	public function send($data){

		$headers = 'MIME-Version: 1.0' . '\r\n';

		$headers .= 'Content-type: text/html; charset=utf-8' . '\r\n';

		$headers .= 'From: '.$data['email'].'\r\n';

		$info = $this->getInfo();

		$subject = "Wiadomość z formularza kontaktowego na stronie hannapruchniewska.pl";

		$message = $data['message'].' --- '.$data['name'].' <'.$data['email'].'>';

		mail($info['email'], $subject, $message, $headers);

	}

}

?>

