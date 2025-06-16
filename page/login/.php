<?php
session_start();
include "../../config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';
// register
// register
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $name = $_POST['username'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // xavfsiz

    // Email allaqachon ro'yxatdan o'tganmi?
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo "<script>alert('Bu email allaqachon ro\'yxatdan o\'tgan.'); window.location.href='';</script>";
        exit();
    }

    // 6 raqamli OTP
    $otp = rand(100000, 999999);

    // Ma'lumotlar vaqtincha sessiyada saqlanadi
    $_SESSION['otp'] = $otp;
    $_SESSION['user_data'] = [
        'name' => $name,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password,
        'auth_code' => $otp   
    ];

    // Emailga OTP yuborish
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'asomiddin320@gmail.com';
        $mail->Password = 'lfvb vpwq qimz tjzf';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('asomiddin320@gmail.com', 'Acoder Auth Code');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "Your OTP code is: <b>$otp</b>";

        $mail->send();
        header("Location: ./auth-code.php");
        exit();
    } catch (Exception $e) {
        echo "Email yuborilmadi. Xatolik: {$mail->ErrorInfo}";
    }
}



// login

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && !isset($_POST['username'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // faqat verify bo'lgan foydalanuvchini kiritamiz
        if ($user['is_verified'] == 1 && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'lastname' => $user['lastname'],
                'email' => $user['email']
            ];
            header("Location: ../../index.php");
            exit();
        } else {
            echo "<script>alert('Login muvaffaqiyatsiz. Parol xato yoki account tasdiqlanmagan.');</script>";
        }
    } else {
        echo "<script>alert('Email topilmadi');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="login.css">
    <title>Acoder | Login</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form  method="POST">
                <h1 class="text-[30px] font-semibold mb-10">Create Account</h1>
                <br>
                <input type="text" placeholder="Name" name="username" required>
                <input type="text" placeholder="Last Name" name="lastname" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">    
            <form method="POST">
                <h1 class="text-[30px] font-semibold mb-10">Sign In</h1>
                <br>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <a  href="https://t.me/asomiddin_004">Forget Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1 class="text-[22px] text-semibold">Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden_btn" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1 class="text-[22px] text-semibold">Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden_btn" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="login.js"></script>
</body>

</html>