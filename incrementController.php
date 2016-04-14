<?php // Controller for Posts generation

session_start();

if (isset($_POST['task'])){

    // Connect to database
    require_once('models/database.php');
    $db = databaseConnection();
    
    if (!isset($db)) {
        $error = "Could not connect to the database.";
    } else {
        
        if ($_POST['task'] == 'ratingUp' && isset($_POST['postid'])) {
           
           require_once('models/posts.php');
           ratingUp($_POST['postid'], $db);
           
           echo("ratingUp successful");
        }
        
        elseif ($_POST['task'] == 'ratingDown' && isset($_POST['postid'])) {
           
           require_once('models/posts.php');
           ratingDown($_POST['postid'], $db);
           
        }
        
        elseif ($_POST['task'] == 'flagUp' && isset($_POST['postid'])) {
           
           require_once('models/posts.php');
           flagUp($_POST['postid'], $db);
           
        }
        
    }
}