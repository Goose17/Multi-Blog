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
 * Returns the username of the user logging in if they have an account and null otherwise.
*/
function sign_in($db, $username, $password) {
    
    // Find specific user in the database.
    $select = $db->prepare('select username, password from Users where username=:uname;');
    $select->bindParam(':uname', $username, PDO::PARAM_STR);
    $select->execute();
    
    // Check if passwords match.
    $user = $select->fetch(PDO::FETCH_ASSOC);
    return (isset($user) && password_verify($password, $user['password'])) ? $user['username'] : null;
    
}
?>
