
<!DOCTYPE html>
<html>
<head>
    <title>user list</title>
    <link href="../src/input.css" rel="stylesheet">
    <link href="../dist/output.css" rel="stylesheet">
</head>
<body>
 <!-- Navbar start -->
<nav id="navbar" class="fixed top-0 z-40 flex w-full  flex-wrap items-center justify-between bg-neutral-100 py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-white lg:py-4">
<div class="flex w-full flex-wrap items-center justify-between px-3">
              <div>
                <a class="mx-2 my-1 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0"
                    href="#">
                    <img src="../dist/images/Logo.png" style="height: 20px" alt="TE Logo" loading="lazy" />
                </a>
              </div>
          </div>
          <div class=" flex w-full items-center justify-center py-2 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-green-800 lg:flex-wrap lg:justify-start lg:py-4" style="background-color: rgba(0, 0, 0, 0.75)">
    <div class="flex w-full flex-wrap items-center justify-center px-3 text-white">
        <a class="mx-2 my-1 font-Poppins font-medium hover:text-zinc-100 focus:text-white" href="#">Home</a>
        <a class="mx-2 my-1 font-Poppins font-medium hover:text-zinc-100 focus:text-white" href="#">About Us</a>
        <a class="mx-2 my-1 font-Poppins font-medium hover:text-zinc-100 focus:text-white" href="#">News</a>
        <a class="mx-2 my-1 font-Poppins font-medium hover:text-zinc-100 focus:text-white" href="#">Contact</a>
        <div class="mx-2 my-1 flex items-center">
            <input type="text" class="rounded-md p-2" placeholder="Search">
            
        </div>
        <button id="btnSidebarToggler" type="button" class="py-4 text-2xl text-white hover:text-gray-200">
        <svg id="navClosed" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="h-8 w-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        <svg id="navOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="hidden h-8 w-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    </div>
</div>
</nav>
<!-- Navbar end -->

<!-- Sidebar start-->
<div id="containerSidebar" class="z-40 ">
    <div class="navbar-menu relative z-40">
        <nav id="sidebar"
            class="fixed left-0 bottom-0 flex w-3/4 flex-col overflow-y-auto bg-neutral-100 pt-6 pb-8 sm:max-w-xs lg:w-80">
            <!-- one category / navigation group -->
            <div class="px-4 pb-6">
                <h3 class="mb-2 text-xs font-medium uppercase text-black">
                    Main
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class=" flex items-center rounded py-3 pl-3 pr-4 text-black hover:bg-gray-600"
                            href="admin1_dashboard.php">
                            <span class="select-none">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-black hover:bg-gray-600"
                            href="admin1_userlist.php">
                            <span class="select-none">Users</span>
                        </a>
                    </li>
                  
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-black hover:bg-gray-600"
                            href="">
                            <span class="select-none">Prescription records</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-black hover:bg-gray-600"
                        href="?logout=true">
                            <span class="select-none">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- navigation group end-->

            <!-- example copies start -->
            <div class="px-4 pb-6">
                <h3 class="mb-2 text-xs font-medium uppercase text-black">
                    Legal
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-black hover:bg-gray-600"
                            href="#tc">
                            <span class="select-none">Terms and Condition</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-black hover:bg-gray-600"
                            href="#privacy">
                            <span class="select-none">Privacy policy</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-black hover:bg-gray-600"
                            href="#imprint">
                            <span class="select-none">Imprint</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="px-4 pb-6">
                <h3 class="mb-2 text-xs font-medium uppercase text-gray-500">
                    Others
                </h3>
                <ul class="mb-8 text-sm font-medium">
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-black hover:bg-gray-600"
                            href="#ex1">
                            <span class="select-none">...</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center rounded py-3 pl-3 pr-4 text-black hover:bg-gray-600"
                            href="#ex2">
                            <span class="select-none">...</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- example copies end -->
        </nav>
    </div>
</div>
</body>
</html>