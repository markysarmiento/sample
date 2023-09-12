<?php
require_once("config.php");

session_start();

if (isset($_GET["logout"])) {
    if ($_GET["logout"] === "true") {
        // Clear all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();
    }
   }

// Redirect to login page if user is not logged in
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

// Get the logged-in username
$username = $_SESSION["username"];
$conn->close();
include './var/navsidebar.php'
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="../dist/output.css" rel="stylesheet">
    <link href="../src/input.css" rel="stylesheet">
</head>
<body>
    
<br><br><br><br><br>
<div class="flex py-8 w-full flex-wrap  items-center justify-center px-3">
              <h2 class="text-2xl font-semibold mb-4">Welcome, <?php echo $username; ?>!</h2>
        </div>
    </div>  
         
         <div class="mt-8 ml-80 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
                
                <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                    <h2 class="text-gray-500 text-lg font-semibold pb-1">Announcements</h2>
                    <div class="my-1"></div> 
                    <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
                    <div class="chart-container" style="position: relative; height:150px; width:100%">
                        
                        <canvas id="usersChart"></canvas>
                    </div>
                </div>

                <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
                    <h2 class="text-gray-500 text-lg font-semibold pb-1">Calendar</h2>
                    <div class="my-1"></div> 
                    <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
                    <div class="chart-container" style="position: relative; height:150px; width:100%">
                        
                        <canvas id="commercesChart"></canvas>
                    </div>
                </div>
            </div>
</body>
</html>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", () => {
        const navbar = document.getElementById("navbar");
        const sidebar = document.getElementById("sidebar");
        const btnSidebarToggler = document.getElementById("btnSidebarToggler");
        const navClosed = document.getElementById("navClosed");
        const navOpen = document.getElementById("navOpen");

        btnSidebarToggler.addEventListener("click", (e) => {
            e.preventDefault();
            sidebar.classList.toggle("show");
            navClosed.classList.toggle("hidden");
            navOpen.classList.toggle("hidden");
        });

        sidebar.style.top = parseInt(navbar.clientHeight) - 1 + "px";
    });
</script>