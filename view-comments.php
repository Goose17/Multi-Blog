<?php

session_start();

require_once('models/database.php');
$db = databaseConnection();

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

require_once('models/posts.php');
$post = requestOne($_GET['id'], $db);
$comments = requestComments($db, $_GET['id']);

require(isset($_SESSION['username']) ? 'views/user-header.php' : 'views/header.php');
require('views/see-comments.php');
require('views/footer.php');