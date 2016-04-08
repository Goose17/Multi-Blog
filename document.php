<?php // Controller for Post generation
             
// Connect to database
require_once('models/database.php');
$db = databaseConnection();

if (!isset($db)) {
    $error = "Could not connect to the database.";
} else {
    
    require_once('models/posts.php');
    $posts = request($db);
    
}