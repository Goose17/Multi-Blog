<?php // Controller for the home page

session_start();
             
// Connect to database
require_once('models/database.php');
$db = databaseConnection();

if (!isset($db)) {
    $error = "Could not connect to the database.";
} else {
    
    require_once('models/posts.php');
    $posts = request($db);
    
}

require('views/header.php');
require('views/post-display.php');
require('views/footer.php');