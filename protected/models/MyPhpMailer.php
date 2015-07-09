<?php

class MyPhpMailer {

    public static function send($email, $subject, $message, $from = false) {

        if ( Yii::app()->request->userHostAddress=='127.0.0.1' ) {
            return true;
        }
        
        Yii::import('application.extensions.phpmailer.JPhpMailer');

        $mail = new JPhpMailer;
        $mail->IsSMTP();
		$mail->Host = 'smtp.mandrillapp.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth	= true;
		$mail->Username	= 'denis@ekimov.su';
		$mail->Password	= 'lnm7781kBDBaljNLL5TKqw';
		$mail->CharSet = 'utf8';

		if (!$from)
	        $mail->SetFrom("noreply@fermionam.ru", "FermionAm");
		else
			$mail->SetFrom($from);

        $mail->AddAddress($email);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);

        if ($mail->Send())
            return true;
        else {
        	echo $mail->ErrorInfo;
            return false;
		}
    }
}