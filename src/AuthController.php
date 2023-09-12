<?php
require_once("usermodel.php");

class AuthController {
    public function login($conn, $username, $password) {
        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($conn, $username);

        if ($user && password_verify($password, $user['password'])) {
            // User authentication successful, retrieve user data
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['PrivilegesName'] = $user['PrivilegesName']; // Make sure this matches the role IDs in your permissions array

            // Redirect the user to the dashboard page
            header('Location: dashboard.php');
            exit(); // Terminate script execution after redirection
        } else {
            // User authentication failed
            return false;
        }
    }
}

function checkPermission($permission) {
    // Get the user's role ID from the session
    $userRoleID = $_SESSION['PrivilegesName'];

    // Define role-based permissions with role IDs
    $permissions = [
        'admin' => ['create', 'edit', 'view'],
        'editor' => ['edit', 'view'],
        'viewer' => ['view'],
    ];

    // Check if the user has the specified permission based on role ID
    return isset($permissions[$userRoleID]) && in_array($permission, $permissions[$userRoleID]);
}

// Sample usage
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $authController = new AuthController();
    
    if ($authController->login($conn, $username, $password)) {
        // The user will be redirected to dashboard.php upon successful login
    } else {
        $error_message = "Invalid login credentials.";
        require("login1.php");
    }
}
?>
