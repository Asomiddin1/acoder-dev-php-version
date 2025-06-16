<?php
session_start();
include "../../config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userOtp = $_POST['otp'];
    $data = $_SESSION['user_data'];

    if ($userOtp == $data['auth_code']) {
        // Ma'lumotni bazaga qo‘shamiz
        $stmt = $conn->prepare("INSERT INTO users (name, lastname, email, password, auth_code, is_verified) VALUES (?, ?, ?, ?, ?, 1)");
        $stmt->bind_param("sssss", $data['name'], $data['lastname'], $data['email'], $data['password'], $data['auth_code']);
        $stmt->execute();

        // Bazaga qo‘shilgan user ma'lumotlarini olish (id ham)
        $userId = $stmt->insert_id;

        $_SESSION['user'] = [
            'id' => $userId,
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email']
        ];

        unset($_SESSION['user_data']); // vaqtinchalik datani o‘chiramiz
        header("Location: ../../index.php");
        exit();
    } else {
        $error = "❌ Noto'g'ri auth code. Qayta urinib ko'ring.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Acoder | Auth</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="stylesheet" href="auth.css">
</head>
<body>
  <div class="container flex flex-col items-center justify-center px-8">
    <div class="flex flex-col items-center justify-center bg-white shadow-lg rounded-lg w-full max-w-md py-10 px-8">
      <form action="" method="POST">
        <h1 class="text-[25px] text-center font-semibold mb-1">Enter Auth Code</h1>
        <p class="text-center mb-2"><?php 
        $email = $_SESSION['user_data']['email'];
        echo "A verification code has been sent to your email: <strong>$email</strong>. Please check your inbox.";
        ?></p>
        
        <?php if (!empty($error)) { echo "<p class='text-red-500'>$error</p>"; } ?>

        <div class="flex flex-col items-center">
          <input class="auth_input mb-4" type="text" placeholder="Auth Code" name="otp" required>
          <button class="bg-blue-500 text-white py-2 px-4 rounded mt-2" type="submit">Submit</button>
        </div>

        <p class="mt-4">Didn't receive the code? <a href="resend.php" class="text-blue-500">Resend Code</a></p>
      </form>
    </div>
  </div>
</body>
</html>
