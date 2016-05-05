<?php

session_start();

require_once('models/posts.php');
require_once("models/database.php");
$db = databaseConnection();
if ($db == 1) {
  header('Location: index.php');
  exit();
}

if (isset($_POST['task']) && $_POST['task'] == 'dropPost') {
  drop($_POST['comment_id'], $db);
  header("Location: view-comments.php?id=" . $_POST['comment_parent']);
  exit();
} else if (($_POST['task'] == 'addComment' && isset($_POST['title']) && isset($_POST['parent']) && isset($_POST['content']))) {
  if (isset($_SESSION['parent'])) {$_POST['parent'] = $_SESSION['parent']; unset($_SESSION['parent']);}
  addComment($_POST['title'], $_POST['parent'], $_POST['content'], $_SESSION['username'], $db);
  header("Location: view-comments.php?id=" . $_POST['parent']);
  exit();
} else if ($_POST['task'] == 'doubleComment') {
  $singlePost = requestOne($_POST['comment_id'], $db);
  $_SESSION['parent'] = $_POST['comment_parent'];
  require('views/user-header.php');
  require('views/create-comment-form.php');
  require('views/create-comment-footer.php');
} else {
  $singlepost = isset($_POST['task']) && $_POST['task'] == "addComment" ? requestOne($_POST['comment_parent'], $db) : requestOne($_GET['id'], $db);
  require(isset($_SESSION['username']) ? 'views/user-header.php' : 'views/header.php');
  require('views/create-comment-form.php');
  require('views/create-comment-footer.php');
}
