<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $msg = htmlspecialchars(trim($_POST['msg']));
    $services = $_POST['services'] ?? [];

    if (empty($name)) {
        $errors['name'] = 'الاسم مطلوب.';
    }
    if (empty($phone)) {
        $errors['phone'] = 'رقم الهاتف مطلوب.';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'البريد الإلكتروني غير صحيح.';
    }
    if (empty($msg)) {
        $errors['msg'] = 'الرسالة مطلوبة.';
    }
    if (empty($services)) {
        $errors['services'] = 'يجب اختيار خدمة واحدة على الأقل.';
    }

    if (empty($errors)) {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'admin@3alamah.com';
            $mail->Password = '[4Fp#duB';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';

            $mail->setFrom('admin@3alamah.com', 'Support 3alamah');
            $mail->addReplyTo($email, $name);
            $mail->addAddress('Nasr2017nnss@gmail.com', 'Nasr');
            $mail->isHTML(true);

            $mail->Subject = "استفسار العميل: $name";
            $mail->Body = "
                <h2>تفاصيل العميل</h2>
                <p><strong>الاسم:</strong> $name</p>
                <p><strong>الهاتف:</strong> $phone</p>
                <p><strong>البريد:</strong> $email</p>
                <p><strong>الخدمات:</strong> " . implode(', ', $services) . "</p>
                <p><strong>الرسالة:</strong> $msg</p>
            ";

            $mail->CharSet = 'UTF-8';

            if ($mail->send()) {
                $_SESSION['success'] = 'تم إرسال الرسالة بنجاح!';
            } else {
                $_SESSION['error']['mail'] = 'حدث خطأ أثناء إرسال الرسالة.';
            }
        } catch (Exception $e) {
            $_SESSION['error']['mail'] = 'فشل إرسال البريد: ' . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = $errors;
    }

    header('Location: contact.php');
    exit;
}

?>
