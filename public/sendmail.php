<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$from = 'Kabriacid01@gmail.com';
$to = 'ibrahimfura@gmail.com';
$subject = 'Your Subject Here';
$message = 'This is the email content.';

try {
    $host = getenv('SMTP_HOST');
    $username = getenv('SMTP_USERNAME');
    $password = getenv('SMTP_PASSWORD');

    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $username;
    $mail->Password = $password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($from, 'Mailer');
    $mail->addAddress($to);
    $mail->addReplyTo($from, 'No-reply');

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = strip_tags($message);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not