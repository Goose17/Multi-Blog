<?php

session_start();

require_once('models/database.php');
$db = databaseConnection();

require_once('models/accounts.php');

// Display whether the grant worked or not if there is an attempted grant of status.
if (isset($_POST['username_grant'], $_POST['password_grant'])) {
    $grant_result = grant_admin($db, $_POST['username_grant'], $_SESSION['username'], $_POST['password_grant']);
    if ($grant_result == 0) {
        $success_grant_message = 'Successfully granted admin status.';
    } else if ($grant_result == 1) {
        $failed_grant_message = 'Incorrect password.';
    } else if ($grant_result == 2) {
        $failed_grant_message = 'User already has admin status.';
    } else {
        $failed_grant_message = 'Username is not registered.';
    }
}

// Display whether the disable admin status attempt worked or not.
if (isset($_POST['username_disable'], $_POST['password_disable'])) {
    $disable_result = disable_admin($db, $_POST['username_disable'], $_SESSION['username'], $_POST['password_disable']);
    if ($disable_result == 0) {
        $success_disable_message = 'Admin status succesfully removed.';
    } else if ($disable_result == 1) {
        $failed_disable_message = 'Incorrect password.';
    } else if ($disable_result == 2) {
        $failed_disable_message = 'User is not an admin.';
    } else {
        $failed_disable_message = 'Username is not registered.';
    }
}

require('views/user-header.php');
require('views/admin-status-change.php');
require('views/footer.php');