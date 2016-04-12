<?php

session_start();

/*
 * Returns false if username is taken and true if username is eligible and has been entered into Users table.
*/
function register_user($db, $username, $password) {
    
    // Look at the usernames of all current users.
    $users = $db->query('select username from Users;');
    foreach ($users as $user) { // Check each user's username
        if ($username == $user['username']) {
            return false;
        }
    } 
    
    // If none of the usernames in the database are the same as the one entered then add it.
    // DEFAULT ADD AS NON-ADMIN USER.
    $register = $db->prepare('insert into Users(username, password, admin_status) values(:username, :password, 0);');
    $register = $db->bindParam(':username', $username, PDO::PARAM_STR);
    $register = $db->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
    return $register->execute();
}

function sign_in($db, $username, $password) {
    
}
