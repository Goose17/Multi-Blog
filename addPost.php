<?php // Controller for Post generation

session_start();

// Should have form inputs
if (isset($_POST['title']) && isset($_POST['content'])) {
             
    // Connect to database
    require_once('models/database.php');
    $db = databaseConnection();
    
    if (!isset($db)) {
        $error = "Could not connect to the database.";
    } else {
        
        require_once('models/posts.php');
        $posts = Add($_POST['title'], $_POST['content'], $_SESSION['userName'], $db);
        
    }
}