<?php
session_start();
require_once("config.php");
require_once("AuthController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $authController = new AuthController();
    $authController->login($conn, $username, $password);
}

require("login1.php");
?>
