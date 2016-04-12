<?php

session_start();

// If the user succesfully logged in then redirect to index.php
if (isset($_POST['username'])) {
    header("Location: index.php");
    exit;
}

// Connect to database
require_once('models/database.php');
$db = databaseConnection();

if (!isset($db)) {
    $error = "Could not connect to the database.";
} else {
    
    
    require('views/header.php');
    require('views/sign-in-register-forms.php');
    require('views/footer.php');
}
