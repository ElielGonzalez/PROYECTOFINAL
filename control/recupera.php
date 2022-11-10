<?php  
include('../control/correo/PHPMailer-master/src/Exception.php');
include('../control/correo/PHPMailer-master/src/PHPMailer.php');
include('../control/correo/PHPMailer-master/src/SMTP.php');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

try {
    //$bodyEmail= $_REQUEST['fecha'];
    //$newDate = date("d-m-Y", strtotime($bodyEmail));
    //$subject= $_REQUEST['mensaje'];
    $emailto = $_REQUEST['controlBuscador'];
    $nombre= $_REQUEST['correo'];
    $fromemail="gveo181997@upemor.edu.mx";
    $fromname="Sistema web de nutrcion";
    $host="smtp.gmail.com";
    $port="587";
    $SMTPauth ="login";
    $SMTPSecure="tls";
    $password="Bell12345.";
    $mail = new PHPMailer();
    
    //Server settings                      
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPDebug = 1;                           //Enable verbose debug output
    $mail->Host       = $host;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = $SMTPauth;                                   //Enable SMTP authentication
    $mail->Username   = $fromemail;                     //SMTP username
    $mail->Password   = $password;                               //SMTP password
    $mail->SMTPSecure = $SMTPSecure;            //Enable implicit TLS encryption
    $mail->Port       = $port;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($fromemail, $fromname);
    $mail->addAddress($emailto);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = utf8_decode($subject);
     $mail->Body    = "Correo: ".$emailto.utf8_decode(", Sistema de nutrcion, te envia tu contrasenia: ").$nombre;
    if (!$mail->send()) {
        echo "No se envio el correo"; die();
    } 
    //echo "Se envio el correo prrote"; die();
    header("Location:../Vista/olvidar.php?correo-enviado!!");
    
} catch (Exception $e) {  
}
?>

