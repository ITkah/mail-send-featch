<?php
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (empty($_POST['formName']) || empty($_POST['formEmail'])) die('Некорретные данные!');

$userName = trim(urldecode(htmlspecialchars($_POST['formName'])));
$userPhone = trim(urldecode(htmlspecialchars($_POST['formEmail'])));

$subject = 'Заявка на обратный звонок';

$message = $subject . ':<br>Имя: ' . $userName . '<br>Почта: ' . $userPhone;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->CharSet    = 'UTF-8';
    $mail->Host       = 'smtp.yandex.ru';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'почта';
    $mail->Password   = 'пароль';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('почта', 'Илья');
    $mail->addAddress('кому');

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;
    // $mail->AltBody = '';

    $mail->send();
    return true;
} catch (Exception $e) {
    echo "Возникла ошибка. Mailer Error: {$mail->ErrorInfo}";
}
?>