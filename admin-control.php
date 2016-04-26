<?php

session_start();

require_once('models/database.php');
$db = databaseConnection();

require_once('models/accounts.php');

// Redirect to index.php if grant status works otherwise redirect to forms.
if (isset($_POST['username_grant'], $_POST['password_grant'])) {
    $grant_result = grant_admin($db, $_POST['username_grant'], $_SESSION['username'], $_POST['password_grant']);
    if ($grant_result == 0) {
        header('Location: index.php');
        exit();
    } else if ($grant_result == 1) {
        $failed_grant_message = 'Incorrect password.';
    } else if ($grant_result == 2) {
        $failed_grant_message = 'User already has admin status.';
    } else {
        $failed_grant_message = 'Username is not registered';
    }
    
}

require('views/user-header.php');
require('views/admin-status-change.php');
require('views/footer.php');