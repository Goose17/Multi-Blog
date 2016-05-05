<?php // Controller for the home page

session_start();

// Connect to database
require_once('models/database.php');
$db = databaseConnection();

if (!isset($db)) {
  require((isset($_SESSION['username']) ? 'views/user-header.php' : 'views/header.php'));
  require('views/failed-connection.php');
  require('views/footer.php');
} else if (isset($_GET['about']) && $_GET['about']==1) {
  require((isset($_SESSION['username']) ? 'views/user-header.php' : 'views/header.php'));
  require('views/about.php');
  require('views/footer.php');
} else {
  require_once('models/posts.php');
  $posts = request($db);
  require((isset($_SESSION['username']) ? 'views/user-header.php' : 'views/header.php'));
  require('views/post-display.php');
  require('views/footer.php');
}
