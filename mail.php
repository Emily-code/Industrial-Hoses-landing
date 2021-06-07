<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-6.1.4/src/Exception.php';
require 'PHPMailer-6.1.4/src/PHPMailer.php';
require 'PHPMailer-6.1.4/src/SMTP.php';
$mail = new PHPMailer (true);
$mail->CharSet = 'utf-8';


try {
    $name = $_POST['user_name'];
    $phone = $_POST['phone_number'];
    $email = $_POST['email'];
    $message = $_POST['message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '1504670@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
    $mail->Password = 'industrial_sale2020'; // Ваш пароль от почты с которой будут отправляться письма
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

    $mail->setFrom('1504670@mail.ru', 'Заявка'); // от кого будет уходить письмо?
    $mail->addAddress('sale@industrial-hoses.ru', 'Industrial Hoses');     // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Заявка с лендинга';
    $mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email. '<br>Сообщение: ' .$message;
    $mail->AltBody = '';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}