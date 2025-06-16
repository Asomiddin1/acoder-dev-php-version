<?php
session_start();
include "../../config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

if (isset($_SESSION['user_data'])) {
    $data = $_SESSION['user_data'];
    
    // Yangi kod yaratamiz
    $otp = rand(100000, 999999);
    $_SESSION['user_data']['auth_code'] = $otp;

    // Email yuborish
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'asomiddin320@gmail.com';     // O'zgartiring
        $mail->Password = 'lfvb vpwq qimz tjzf';       // O'zgartiring
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('asomiddin320@gmail.com', 'Acoder Auth Code');
        $mail->addAddress($data['email']);

        $mail->isHTML(true);
        $mail->Subject = 'Your New OTP Code';
        $mail->Body    = "Your new OTP code is: <b>$otp</b>";

        $mail->send();
        header("Location: auth-code.php?resent=1");
        exit();
    } catch (Exception $e) {
        echo "Xatolik: Kod yuborilmadi. {$mail->ErrorInfo}";
    }
} else {
    echo "Sessiya mavjud emas. Iltimos, ro'yxatdan o'ting.";
}
