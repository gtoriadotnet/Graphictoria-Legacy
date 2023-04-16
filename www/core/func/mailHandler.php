<?php
	class mailHandler {
		public static function sendMail($message, $altmessage, $to, $title, $username) {
			include_once $_SERVER['DOCUMENT_ROOT'].'/core/func/libs/mail/PHPMailerAutoload.php';
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = 'mailsrv.gtoria.net';
			$mail->Port = 25;
			$mail->SMTPAuth = true;
			$mail->Username = 'no-reply@gtoria.net';
			$mail->Password = '"qF[mK!zvp~{ry42BZ]vBK2d+cHyJKQN';
			$mail->From = 'no-reply@gtoria.net';
			$mail->FromName = 'Graphictoria';
			$mail->addAddress($to, $username);
			$mail->addReplyTo('no-reply@gtoria.net', 'Graphictoria');
			$mail->WordWrap = 50;
			$mail->isHTML(true);
			$mail->Subject = $title;
			$mail->Body    = $message;
			$mail->AltBody = $altmessage;
			$mail->send();
		}
	}
?>
