<?php 
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;



//Load Composer's autoloader

require '../vista/vendor/autoload.php';

function sendEmail($para_usuario, $subject, $message_body){
	  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    try {

       

    $mail->isSMTP();                                      // Set mailer to use SMTP

    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers

    $mail->SMTPAuth = true;                               // Enable SMTP authentication

    $mail->Username = 'gveo181997@upemor.edu.mx';                 // SMTP username

    $mail->Password = 'Bell12345.';                           // SMTP password

    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted

    $mail->Port = 587;                                    // TCP port to connect to



    //Recipients

    $mail->setFrom('gveo181997@upemor.edu.mx','Recupera');

    $mail->addAddress($para_usuario);



    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;

    $mail->Body    = $message_body;



    $mail->send();

    echo 'Mensaje fue enviado';

    } catch (Exception $e) {

       echo 'Mensaje no puedo ser enviado. Mailer Error: ', $mail->ErrorInfo;

    }

}

?>