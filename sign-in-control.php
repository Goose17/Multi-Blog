<?php

session_start();

// Connect to database
require_once('models/database.php');
$db = databaseConnection();

require_once('models/accounts.php');

// When we have a login attempt
if (isset($_POST['username_login'])) {
    
    // Attempt to sign in.
    $signin = sign_in($db, trim($_POST['username_login']), $_POST['password_login']);
    
    // If login was successful redirect to home page
    if (isset($signin)) {
        $_SESSION['username'] = $signin['username'];
        $_SESSION['admin_status'] = isset($signin['admin_status']) ? $signin['admin_status'] : 'not set';
        header('Location: index.php');
        exit();
    }
    
    // If login was unsuccessful then show forms again with error message.
    $failed_login_message = 'Username/password combination is incorrect. Please try again.';
}

if (isset($_POST['username_register'])) {
    
    // Attempt to register a new user.
    $register = register_user($db, trim($_POST['username_register']), $_POST['password_register']);
    
    // If registration was successful redirect to index.php
    if ($register) {
        $_SESSION['username'] = $_POST['username_register'];
        header('Location: index.php');
        exit();
    }
    
    // Otherwise display error message.
    $failed_register_message = 'Username is already taken please try again.';
}

require('views/header.php');
require('views/sign-in-register-forms.php');
require('views/footer.php');