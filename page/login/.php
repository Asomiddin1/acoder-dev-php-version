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
            <form action="./auth-code.php" method="POST">
                <h1 class="text-[30px] font-semibold mb-10">Create Account</h1>
                <br>
                <input type="text" placeholder="Name">
                <input type="text" placeholder="Last Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">    
            <form action="./auth-code.php" method="POST">
                <h1 class="text-[30px] font-semibold mb-10">Sign In</h1>
                <br>
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <a  href="https://t.me/asomiddin_004">Forget Your Password?</a>
                <a href="./auth-code.php"><button>Sign In</button></a>
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