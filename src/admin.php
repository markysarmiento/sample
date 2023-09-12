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
$registration_status = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Extract user and doctor info from POST data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $name = $_POST["name"];
    $position = $_POST["position"];
    $role = $_POST["role"];
   

    // Perform SQL query to insert user into User table
    $userInsertQuery = "INSERT INTO user1 (username, password, RoleID) VALUES ('$username', '$hashedPassword', '$role')";
    if ($conn->query($userInsertQuery) === TRUE) {
        // Get the inserted user_id
        $user_id = $conn->insert_id;

        // Perform SQL query to insert doctor into Doctor table
        $adminInsertQuery = "INSERT INTO dohstaff (user_id, name, position) 
                              VALUES ('$user_id', '$name', '$position')";
        if ($conn->query($adminInsertQuery) === TRUE) {
            echo "admin registered successfully.";
        } else {
            echo "Error: " . $adminInsertQuery . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $userInsertQuery . "<br>" . $conn->error;
    }
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
$query = "SELECT * FROM dohstaff INNER JOIN user1 ON dohstaff.user_id = user1.user_id inner join role on user1.RoleID = role.RoleID LIMIT $start, $rows";
$result = $conn->query($query);

// ... (rest of the code)

$users = [];

$query1 = "SELECT * FROM dohstaff INNER JOIN user1 ON dohstaff.user_id = user1.user_id inner join role on user1.RoleID = role.RoleID  ";
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
    <title>Dashboard</title>
    <link href="../dist/output.css" rel="stylesheet">
    <link href="../src/input.css" rel="stylesheet">
</head>
<body>



<main>
    <!-- your content goes here -->
</main>
<br><br><br>
<div class="mt-8 pl-80 bg-white p-4 shadow rounded-lg">
                <h2 class="text-gray-500 text-lg font-semibold pb-4">Admin</h2>
                <div class="my-1"></div> <!-- Espacio de separación -->
                <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
                <div class="text-right mt-4">
                    <a href="rolesandpermission.php">
                <button class="bg-pink-500 text-black active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                    Roles and Permissions
                     </button>
                    </a>
                    <?php if ($canCreatePost): ?>
                <button class=" bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded showmodal">
                        Add Admin
                    </button>
                    <?php endif; ?>
                </div>
                <table class="w-full table-auto text-sm">
        <thead>
           <tr class="text-sm leading-normal">
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Photo</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Name</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Position</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Role</th>
                            <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Edit</th>
                              
                        </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr class="hover:bg-grey-lighter text-center ">
                <td class="py-2 px-4 border-b border-grey-light"><img src="https://via.placeholder.com/40" alt="Foto Perfil" class="rounded-full h-10 w-10"></td>
                    <td class="border px-4 py-2"><?php echo $user["name"]; ?></td>
                    <td class="border px-4 py-2"><?php echo $user["position"]; ?></td>
                    <td class="border px-4 py-2"><?php echo $user["RoleName"]; ?></td>
                    <?php if ($canEditPost): ?>
                    <td class="border px-4 py-2">
                        <a href="edit_user.php?id=<?php echo $user["dohstaffid"]; ?>" class="text-blue-500 hover:underline">Edit</a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>Showing 1 of <?php echo $pages?></div>
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


<div class="modal h-screen w-full fixed  py-12 left-0 top-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
<?php if (!empty($registration_status)): ?>
        <p class="mb-4 <?php echo (strpos($registration_status, "successful") !== false) ? 'text-green-500' : 'text-red-500'; ?>">
            <?php echo $registration_status; ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="" class="mt-10 space-y-4 md:space-y-6 bg-white rounded p-6">
    <div class="text-right">
          <button class="text-right p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
            <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
              ×
            </span>
          </button>
    </div>
   
    <div class="grid grid-cols-2 gap-4 w-auto">
                <div class="">
                            <label for="first_name" class="block text-gray-700 font-bold text-sm mb-2">Name</label>
                            <input type="text" name="name" id="first_name" class="mt-1 p-2 w-full border rounded">
                        </div>
                        <div class="">
                            <label for="last_name" class="block text-gray-700 font-bold text-sm mb-2">position</label>
                            <input type="text" name="position" id="last_name" class="mt-1 p-2 w-full border rounded">
                        </div>
                        <div class="block text-gray-700 font-bold text-sm mb-2">
                         
                        <label for="role" class="block text-gray-700 font-bold text-sm mb-2">Role:</label>
                            <select id="role" name="role" class="mt-1 p-2 w-full border rounded">
                            <option value="2" >Admin Role</option>
                            <option value="3">Admin1</option>
                            <option value="5">Admin2</option>
                            <option value="4">Adminview</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="username" class="block text-gray-700 font-bold text-sm mb-2">Username</label>
                            <input type="text" name="username" id="username" class="mt-1 p-2 w-full border rounded">
                        </div>
                        <div class="">
                            <label for="password" class="block text-gray-700 font-bold text-sm mb-2">Password</label>
                            <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded">
                        </div>
    </div>
                          <div class="flex items-center justify-center">
                         <button type="submit" class="w-full px-4 py-2 bg-white border border-transparent rounded-md font-semibold capitalize text-green-900 hover:bg-green-800 active:bg-green-800 focus:outline-none focus:border-green-800 focus:ring focus:ring-green-700 disabled:opacity-25 transition">
                       Register Account
                        </button>
</div>
                               
                        </form>
                    </div>

              </div>
              
         
<script src="script.js">
 
 </script>
 
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