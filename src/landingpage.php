<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETPMS</title>

    <link rel="stylesheet" href="../dist/output.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Work Sans:wght@400;500;600;700&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500&display=swap" />
    <style>
       .custom-button {
      background-size: cover;
      background-repeat: no-repeat;
      width: 200px; /* Adjust the width of the button */
      height: 75px; /* Adjust the height of the button */
    }
    </style>
</head>
  <body>
        <nav class="relative flex w-full flex-wrap items-center justify-between bg-neutral-100 py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-white lg:py-4">
          <div class="flex w-full flex-wrap items-center justify-between px-3">
            <div>
              <a class="mx-2 my-1 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0"
                href="#">
                <img src="../dist/images/Logo.png" style="height: 20px" alt="TE Logo" loading="lazy" />
              </a>
            </div>
          </div>
        </nav>
        
        <div class="flex w-full items-center justify-center py-2 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-green-800 lg:flex-wrap lg:justify-start lg:py-4" style="background-color: rgba(0, 0, 0, 0.75)">
    <div class="flex w-full flex-wrap items-center justify-center px-3 text-white">
        <a class="mx-2 my-1 font-Poppins font-medium hover:text-zinc-100 focus:text-white" href="#">Home</a>
        <a class="mx-2 my-1 font-Poppins font-medium hover:text-zinc-100 focus:text-white" href="#">About Us</a>
        <a class="mx-2 my-1 font-Poppins font-medium hover:text-zinc-100 focus:text-white" href="#">News</a>
        <a class="mx-2 my-1 font-Poppins font-medium hover:text-zinc-100 focus:text-white" href="#">Contact</a>
        <div class="mx-2 my-1 flex items-center">
            <input type="text" class="rounded-md p-2" placeholder="Search">
        </div>
    </div>
</div>

<div class="relative overflow-hidden bg-cover bg-no-repeat" style="background-position: 100%; background-image: url('../dist/images/backgroundImage.png'); height: 620px;">
    <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed">
        <div class="flex text-left h-full items-center">
            <div class="px-6 text-center md:px-12">
                <p class="mb-6 text-left text-3xl">WELCOME TO EPTM</p>
                <p class="mb-8 text-5xl  font-serif ">We are delighted managing <br>your health </p>
                <button onclick="registration.php" type="button" class="inline-block rounded-2xl border-2 border-green-900 px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-green-900 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-green-900 dark:hover:bg-opacity-10" style="background-color: rgba(0, 0, 0, 0.75); font-family: 'Poppins', sans-serif;"><a href="registration.php">Get started</a></button>
            </div>
        </div>
    </div>
</div>
      <div class="flex justify-center items-center min-h-screen bg-white">
        <div class="flex flex-wrap justify-center items-center space-x-2 space-y-2">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          style="background-image: url('../dist/images/Doh.jpg'); background-size: cover;"> </button>
        </div>
      </div>
   
  </body>
</html>