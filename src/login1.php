<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link href="../dist/output.css" rel="stylesheet">
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

  
<div class="bg-gray-100 h-screen flex items-center justify-center">  
        <div class="bg-white p-8 rounded shadow-md w-96" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <a class="flex">
                <img class="w-32 h-16 " src="../dist/images/loginlogo.svg" alt="Login Icon">  
                <h2 class="text-2xl font-semibold mb-4">Login</h2>
            </a>
                <form method="POST" action="" class="space-y-4">
            <?php if (isset($error_message)): ?>
                <p class="text-red-500"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <div>
                <label class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" required class="mt-1 p-2 w-full border rounded">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required class="mt-1 p-2 w-full border rounded">
            </div>
            <div class="mt-6 flex items-center justify-between" style="font-family: 'Poppins', sans-serif;">
            <div class="flex items-center">
              <input id="remember_me" type="checkbox" class="border border-green-800 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50" />
              <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900"> Remember me </label>
            </div>
            <a href="#" class="font-medium text-green-700 hover:underline dark:text-green-900"> Forgot your password? </a>
          </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>
           


                <div class="mt-6 text-center" style="font-family: 'Poppins';">
                    <h4 class="font-normal" style="display: inline-block; margin-right: 10px;">Don't have an Account?</h4>
                    <a href="registration.php" class="underline font-medium text-green-700 hover:underline dark:text-green-900">Sign up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
