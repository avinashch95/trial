<?php

		require '/Users/avinash.c/code/PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'vasuchoudhary95@gmail.com';                 // SMTP username
		$mail->Password = 'dpsvasu1234';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		$mail->setFrom('vasuchoudhary95@gmail.com', 'Ecriptify');
		$mail->addAddress($eid, $name);     // Add a recipient
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Your OTP';
		$mail->Body    = 'Hi '.$name.', <br> your otp is <b>'.$otp.'</b> please verify .  <br> Ignore if you did not request' ;
		if(!$mail->send()) {
    		echo 'Message could not be sent.';
    		echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
    		echo 'Message has been sent';
		}

?>