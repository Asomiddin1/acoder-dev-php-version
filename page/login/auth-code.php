<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="auth.css">
</head>
<body>
   <div class="container flex flex-col items-center justify-center px-8">
      <div  class=" flex flex-col items-center justify-center bg-white shadow-lg rounded-lg w-full max-w-md py-10 px-8">
      <form action="../../index.php" method="POST" >
            <h1 class="text-[25px] text-center font-semibold mb-1">Enter Auth Code</h1>
            <p class="text-center mb-2">A verification code has been sent to your email address. Please check your inbox to proceed.</p>
            <div class="flex flex-col items-center">
              <input class=" auth_input" type="text" placeholder="Auth Code" class="mb-4">
              <button class="bg-blue-500 text-white py-2 px-4 rounded mt-2 ">Submit</button>
            </div>
          
            <p class="mt-4">Didn't receive the code? <a href="#" class="text-blue-500">Resend Code</a></p>
      </form>
      </div>
   </div>
</body>
</html>