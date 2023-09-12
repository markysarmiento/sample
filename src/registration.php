<?php
require_once("config.php");
$registration_status = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Extract user and doctor info from POST data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $specialty = $_POST["specialty"];
    $contactInfo = $_POST["contact_info"];
    $email = $_POST["email"];
    $status = $_POST["status"];
    $region = $_POST["region"];

    // Perform SQL query to insert user into User table
    $userInsertQuery = "INSERT INTO user1 (username, password, RoleID) VALUES ('$username', '$hashedPassword', 1)";
    if ($conn->query($userInsertQuery) === TRUE) {
        // Get the inserted user_id
        $user_id = $conn->insert_id;

        // Perform SQL query to insert doctor into Doctor table
        $doctorInsertQuery = "INSERT INTO doctor (user_id, first_name, last_name, specialty, contact_info, email,  status,  region) 
                              VALUES ('$user_id', '$firstName', '$lastName', '$specialty', '$contactInfo', '$email', '$status', '$region')";
        if ($conn->query($doctorInsertQuery) === TRUE) {
            echo "Doctor registered successfully.";
        } else {
            echo "Error: " . $doctorInsertQuery . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $userInsertQuery . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
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
<div class="h-screen w-screen justify-center items-center">
    <div class="floating-container rounded-lg shadow-lg overflow-hidden">
        <div class="floating-container1 ml-4 rounded-lg shadow-lg overflow-hidden">
            <br>
            <div class="container mx-auto">
                <div class="flex justify-center px-6 my-12">
                    <div class="w-full lg:w-7/12 bg-white p-5 shadow-green-600 rounded-lg lg:rounded-l-none">
                       <a class="flex mx-2 my-1 items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0"
                                href="#">
                                <img src="../dist/images/loginlogo.svg" style="height: 50px" alt="TE Logo"
                                    loading="lazy" />
                                    <h2 class="text-2xl font-semibold mb-4">REGISTER</h2>
                </a>
                <?php if (!empty($registration_status)): ?>
            <p class="mb-4 <?php echo (strpos($registration_status, "successful") !== false) ? 'text-green-500' : 'text-red-500'; ?>">
                <?php echo $registration_status; ?>
            </p>
        <?php endif; ?>
        

        <form method="POST" action="" class="space-y-4 md:space-y-6 bg-white rounded">
               
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
                               
                                 

                   <div class="flex items-start">
                    <div class="flex items-center h-4">
                      <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                    </div>
                    <div class="ml-3 items-center text-sm" style="font-family: 'Poppins';">
                      <label for="terms" class="font-light">I accept the <a class="font-medium text-green-700 hover:underline dark:text-green-900" href="#">Terms and Conditions</a></label>
                    </div>
                    </div>

                    <div class="mt-6">
                      <button type="submit" class="w-full text-center inline-flex items-center justify-center px-4 py-2 bg-white border border-transparent rounded-md font-semibold capitalize text-green-900 hover:bg-green-800 active:bg-green-800 focus:outline-none focus:border-green-800 focus:ring focus:ring-green-700 disabled:opacity-25 transition">Register Account</button>
                    </div>


                    <p class="text-sm text-center font-normal text-gray-500 dark:text-gray-400" style="font-family: 'Poppins';">
                        Already have an account? <a href="index.php" class="font-medium text-green-700 hover:underline dark:text-green-900">Login here</a>
                    </p>
                </form>
              </div>
            </div>
          </div>
             
        </div>
      </div>
    </div>


</body>
</html>