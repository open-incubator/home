<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require 'config.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->SMTPOptions = array (
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true)
);
$mail->SMTPSecure = false;
$mail->SMTPAutoTLS = false;

if ($_SERVER['REQUEST_METHOD']  === 'POST') {
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = $params['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $params['username'].'@openincubator.tech';
        $mail->Password   = $params['password'];
        $mail->Port       = 587;
    
        //Recipients
        $mail->setFrom('erwan.roussel@openincubator.tech', 'Erwan');
        $mail->addAddress('e-roussel@outlook.com');
        $mail->addAddress('ianis.pouru@openincubator.tech');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New message from landing page';
        $mail->Body = '<h5>Nouvelle demande de contact de '.$_POST['name'].'</h5><br> avec le contenu : '.$_POST['message'].' <br> repondre a <a href=\"mailto:'.$_POST['email'].'\">'.$_POST['email'].'</a>';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        var_dump($mail->ErrorInfo);
    }
    header('Location: /');
} else {
    header('Location: /');
}
?>