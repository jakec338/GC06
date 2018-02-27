<?php
require 'PHPMailerAutoload.php';
require 'credential.php';

function send_email($sending_email, $sending_text, $subject) {
	$mail = new PHPMailer;
	// $mail->SMTPDebug = true;

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = EMAIL;
	$mail->Password = PASS;
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$mail->setFrom(EMAIL, 'Auction Platform');
	$mail->addAddress('me.hira.kafle@gmail.com'); //TODO: replace email id with the argument
	$mail->addReplyTo(EMAIL);

	$mail->isHTML(true);

	$mail->Subject = $subject;
	$mail->Body    = $sending_text;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	    die();
	} else {
	    // echo 'Message has been sent';
	}
}

?>