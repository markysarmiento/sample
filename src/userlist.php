<?php
require_once("config.php");
require_once("AuthController.php");
session_start();
$userRole = $_SESSION['roleID'];
$username = $_SESSION['username'];

// Check specific permissions
$canCreatePost = checkPermission('create');
$canEditPost = checkPermission('edit');
$canViewAdmin = checkPermission('view');

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
// Pagination settings
$rows = 5;
$page = 1; // Default page number if not set

if(isset($_GET['page-nr'])){
    $page = (int)$_GET['page-nr'];
}

// Calculate the starting row for the query
$start = ($page - 1) * $rows;

// Query to fetch limited users for the current page
$query = "SELECT * FROM doctor LIMIT $start, $rows";
$result = $conn->query($query);

// ... (rest of the code)

$users = [];

$query1 = "SELECT * FROM doctor";
$records  = $conn->query($query1);
$nr_rows = $records->num_rows;
$pages = ceil($nr_rows / $rows);

if(isset($_GET['page-nr'])){
    $page = $_GET['page-nr'] - 1;
    $start = $page * $rows; 
}
// Fetch users and store in the $users array
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}
$conn->close();
include './var/navsidebar.php'
?>

<!DOCTYPE html>
<html>
<head>
    <title>user list</title>
    <link href="../src/input.css" rel="stylesheet">
    <link href="../dist/output.css" rel="stylesheet">
</head>
<body>
<main>
    <!-- your content goes here -->
</main>
<br><br><br>
<div class="mt-8 pl-80 bg-white p-4 shadow rounded-lg">
                <h2 class="text-gray-500 text-lg font-semibold pb-4">Doctors</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
                <?php if ($canCreatePost): ?>
                <div class="text-right mt-4">
                <button class=" bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded showmodal">
                        Add Doctor
                    </button>
                    <?php endif; ?>
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-sm text-center">
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Photo</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Name</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">contact</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Email</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Prescription</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Edit</th>                        
                        </tr>
                    </thead>
                    <tbody>
            <?php foreach ($users as $user): ?>
                <tr class="hover:bg-grey-lighter text-center">
                <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40" alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                    <td class="border px-4 py-2"><?php echo $user["first_name"]; ?><?php echo $user["last_name"]; ?></td>
          
                    <td class="border px-4 py-2"><?php echo $user["contact_info"]; ?></td>
                    <td class="border px-4 py-2"><?php echo $user["email"]; ?></td>
                    <td class="border px-4 py-2">
                    <button class=" bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded showmodal">
                       Prescriptions
                    </button>
                    </td>
                    
              <?php if ($canEditPost): ?>
                    <td class="border px-4 py-2">
                        <a href="edit_user.php?id=<?php echo $user["doctor_id"]; ?>" class="text-blue-500 hover:underline">Edit</a>

                    </td>
                    <?php endif; ?>
                   
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <div>Showing 1 of <?php echo $pages?>
    <!-- Pagination links -->
<div class="mt-4 flex items-center justify-center space-x-2">
    <a href="?page-nr=1" class="px-4 py-2 border rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring">
        First
    </a>
    <?php if ($page > 1): ?>
        <a href="?page-nr=<?php echo $page - 1 ?>" class="px-4 py-2 border rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring">
            Previous
        </a>
    <?php else: ?>
        <a class="px-4 py-2 border rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring" >
            Previous
        </a>
    <?php endif; ?>

    <?php if ($page < $pages): ?>
        <a href="?page-nr=<?php echo $page + 1 ?>" class="px-4 py-2 border rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring">
            Next
        </a>
    <?php else: ?>
        <a class="px-4 py-2 border rounded-lg text-gray-300 cursor-not-allowed" aria-disabled="true">
            Next
        </a>
    <?php endif; ?>

    <a href="?page-nr=<?php echo $pages ?>" class="px-4 py-2 border rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring">
        Last
    </a>
</div>
</div>
</div>
</div>
<div class="modal h-screen w-full fixed  py-12 left-0 top-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">

<form method="POST" action="" class="mt-10 space-y-4 md:space-y-6 bg-white rounded p-6">
<div class="text-right">
          <button class="text-right p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
            <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
              ×
            </span>
          </button>
</div>
        <div class="grid grid-cols-2 gap-4 w-auto">
                                        <div>
                                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                            <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                        </div>                                 
                                        <div>
                                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required="">
                                        </div>
                                        <div>
                                            <label for="specialty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Specialist</label>
                                            <input type="text" name="specialty" id="specialty" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required="">
                                        </div>
                                        <div>
                                            <label for="contact_info" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
                                            <input type="text" name="contact_info" id="contact_info" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required="">
                                        </div>
                                        <div>
                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input type="email" name="email" id="email"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                        </div>
                                        <div>
                                            <label for="region" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region</label>
                                            <input type="text" name="region" id="region"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                        </div>
                                        <div>
                                            <select name="status" class="mt-1 p-2 w-full border rounded">
                                                <option value="inactive">Inactive</option>
                                                <option value="active">Active</option> <!-- Changed to lowercase "active" -->
                                            </select>  </div>
                                        <div>
                                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                            <input type="text" name="username" id="username" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                        </div>
                                        <div>
                                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                        </div>
                                        <div>
                                            <label for="picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Picture</label>
                                            <input type="file" name="image" id="image" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                        </div>
</div>
                                        <div >
                                            <button type="submit" class="w-full text-center inline-flex items-center justify-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold capitalize text-green-900 hover:bg-green-800 active:bg-green-800 focus:outline-none focus:border-green-800 focus:ring focus:ring-green-700 disabled:opacity-25 transition">Register Account</button>
                                        </div>
                                        
                                    </div> 

</form>
<script src="script.js">
 
 </script>
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