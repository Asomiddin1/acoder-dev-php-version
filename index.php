<?php 
include 'db.php'
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Acoder</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
       
       <header class="main_bg w-full h-[100vh] relative">
        <div class=" absolute top-0 left-0 right-0 bottom-0 blue_effect_bg "></div>
      <nav class="flex justify-between h-[10vh] items-center px-8 nav_bg text-white z-10 fixed top-0 left-0 right-0">
        <div class="flex items-center space-x-4">
            <img src="https://acoder-dev.vercel.app/static/media/favicon.a9d7f9ee6a3b64ffa82c6d74731e95eb.svg" alt="logo">
            <h1 class="text-white text-[25px] font-semibold">Acoder</h1>
        </div>
        <div class="flex items-center">
            <ul class="text-white flex gap-8 mr-10 nav_links items-center">
                <li><a href="#">All Projects</a></li>
                <li><a href="#">Web Sites</a></li>
                <li><a href="#">Mobile Apps</a></li>
                <li><a href="#">Telegram Bots</a></li>
            </ul>
            <a href="./page/login/.php"><button class="bg-[white] py-2 rounded-[20px] px-4 text-[black]">Sign in</button></a>
        </div>
     </nav>
        
     
     <div class="flex flex-col items-center justify-center h-[90vh] relative  px-8">
            <h1 class="text-[50px] text-white font-semibold mb-4">Share Your Programs <br>
            and Projects With Us !</h1>
            <div class="bg-white rounded-[30px]  h-[50px] flex items-center px-2 py-2">
                 <input type="text" placeholder="Search for projects, websites, apps..." class="w-full h-full bg-transparent outline-none text-[20px] px-4">
                    <button class="bg-[#7700e7] text-white px-4 py-2 rounded-[20px] ml-2 flex items-center justify-center gap-1">
                        <span class="sr-only">Search</span>
                    <i class="fa-solid fa-magnifying-glass text-[13px]"></i> Search</button>
            </div>
            
     </div>
     
        

        </div>
      </header>
    

      <div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, laudantium fuga laborum amet nemo sequi omnis? Corrupti ab ipsum sint qui odio amet, quos expedita necessitatibus laboriosam adipisci aspernatur natus nostrum provident voluptatibus enim, magnam soluta, illum ducimus at voluptatem vel asperiores accusantium? Cupiditate optio pariatur quibusdam vel odit debitis deleniti similique omnis architecto expedita molestias placeat fugiat dolorem consectetur nihil dolorum ad est nobis eos vitae laborum enim sequi, illo odio. Illum, dicta facere! Corrupti unde, at soluta maxime deleniti quo ipsum eos reiciendis, officiis saepe non nobis quis est. Architecto, voluptatum? Ad accusantium temporibus quisquam consectetur voluptatum nihil!</p>
      </div>



      <!-- nav -script -->
      <script src="./nav.js"></script>
  </body>
</html>