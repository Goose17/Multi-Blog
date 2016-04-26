<?php

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
    $register->bindParam(':username', $username, PDO::PARAM_STR);
    $register->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
    return $register->execute();
}

/*
 * Returns the username and admin status of the user logging in if they have an account and null otherwise.
*/
function sign_in($db, $username, $password) {
    
    // Find specific user in the database.
    $select = $db->prepare('select username, password, admin_status from Users where username=:uname;');
    $select->bindParam(':uname', $username, PDO::PARAM_STR);
    $select->execute();
     
    $user = $select->fetch(PDO::FETCH_ASSOC);
    
    if (isset($user) && password_verify($password, $user['password'])) {
        $uname = $user['username'];
        $admin = $user['admin_status'];
        return array('username' => $uname, 'admin_status' => $admin);
    } else {
        return null;
    }
}

/*
 * Returns an integer to determine what happened when trying to add admin status to an account.
 * 0 = successful status change
 * 1 = password of current admin was incorrect
 * 2 = admin status was already granted to the user
 * 3 = username entered was not registered
*/
function grant_admin($db, $username, $adminname, $password) {
    
    // Make sure admin password is good to go.
    $confirm = $db->prepare('select password from Users where username=:uname;');
    $confirm->bindParam(':uname', $adminname, PDO::PARAM_STR);
    $confirm->execute();
    $compare = $confirm->fetch(PDO::FETCH_ASSOC);
    if (!password_verify($password, $compare['password'])) {
        return 1;
    }
    
    // Make sure admin status isn't already granted.
    $admincheck = $db->prepare('select admin_status from Users where username=:uname');
    $admincheck->bindParam(':uname', $username, PDO::PARAM_STR);
    $admincheck->execute();
    $check = $admincheck->fetch(PDO::FETCH_ASSOC);
    if (isset($check['admin_status']) && $check['admin_status'] == 1) {
        return 2;
    } else if (!isset($check['admin_status'])) {
        return 3;
    }

    // If both conditions are all set we 
    $update = $db->prepare('update Users set admin_status=1 where username=:uname');
    $update->bindParam(':uname', $username, PDO::PARAM_STR);
    return $update->execute() ? 0 : 3;

}

/*
 * Returns an integer to determine if disabling admin status of a user was successful.
 * 0 = successful status change
 * 1 = password of current admin isn't correct
 * 2 = user wasn't an admin before
 * 3 = username isn't registered
*/
function disable_admin($db, $username, $adminname, $password) {
    
    // Make sure admin password is good to go.
    $confirm = $db->prepare('select password from Users where username=:uname;');
    $confirm->bindParam(':uname', $adminname, PDO::PARAM_STR);
    $confirm->execute();
    $compare = $confirm->fetch(PDO::FETCH_ASSOC);
    if (!password_verify($password, $compare['password'])) {
        return 1;
    }
    
    // Make sure admin status isn't already granted.
    $admincheck = $db->prepare('select admin_status from Users where username=:uname');
    $admincheck->bindParam(':uname', $username, PDO::PARAM_STR);
    $admincheck->execute();
    $check = $admincheck->fetch(PDO::FETCH_ASSOC);
    if (isset($check['admin_status']) && $check['admin_status'] == 0) {
        return 2;
    } else if (!isset($check['admin_status'])) {
        return 3;
    }
    
    // If both conditions are all set we 
    $update = $db->prepare('update Users set admin_status=0 where username=:uname');
    $update->bindParam(':uname', $username, PDO::PARAM_STR);
    return $update->execute() ? 0 : 3;
    
}

?>
