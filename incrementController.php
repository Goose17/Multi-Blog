<?php // Controller for Posts generation

session_start();

if (!isset($_SESSION['username'])){
    header('Location: index.php');
    exit();
}

if (isset($_POST['task'])){

    // Connect to database
    require_once('models/database.php');
    $db = databaseConnection();
    
    if (!isset($db)) {
        $error = "Could not connect to the database.";
    } else {
        
        if ($_POST['task'] == 'ratingUp' && isset($_POST['postid'])) {
           
           require_once('models/posts.php');
           ratingUp($_SESSION['username'], $_POST['postid'], $db);
           
           echo("ratingUp successful");
        }
        
        elseif ($_POST['task'] == 'ratingDown' && isset($_POST['postid'])) {
           
           require_once('models/posts.php');
           ratingDown($_SESSION['username'], $_POST['postid'], $db);
           
           echo("ratingDown successful");
        }
        
        elseif ($_POST['task'] == 'flagUp' && isset($_POST['postid'])) {
           
           require_once('models/posts.php');
           flagUp($_SESSION['username'], $_POST['postid'], $db);
           
           echo("flagUp successful");
        }
        
    }
}