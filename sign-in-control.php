<?php

session_start();

// If the user succesfully logged in then redirect to index.php
if (isset($_POST['username'])) {
    header("Location: index.php");
    exit;
} else { // If not logged in try again.
    require('views/header.php');
    require('views/sign-in-register-forms.php');
    require('views/footer.php');
}