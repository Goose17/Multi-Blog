<?php // Controller for Posts generation

session_start();

if (isset($_POST['task'])) {

    // Connect to database
    require_once('models/database.php');
    $db = databaseConnection();

    if (!isset($db)) {
        $error = "Could not connect to the database.";
    } else {
        if ($_POST['task'] == 'addPost' && isset($_POST['title']) && isset($_POST['content'])) {
            require_once('models/posts.php');
            addPost($_POST['title'], $_POST['content'], $_SESSION['username'], $db);
            header('Location: index.php');
            exit();
        } else if ($_POST['task'] == 'addComment' && isset($_POST['title']) && isset($_POST['parent']) && isset($_POST['content'])) {
            header("Location: commentController.php?id=" . $_POST['postid']);
            exit();
        } else if ($_POST['task'] == 'dropPost' && isset($_POST['postid'])) {
            require_once('models/posts.php');
            drop($_POST['postid'], $db);
            header('Location: index.php');
            exit();
        } else if ($_POST['task'] == 'clearFlags' && isset($_POST['postid'])) {
            require_once('models/posts.php');
            removeFlags($_POST['postid'], $db);
            header('Location: index.php');
            exit();
        }

    }
}

require('views/user-header.php');
if (isset($_POST['task']) && isset($db) && isset($_POST['postid']) && $_POST['task'] == 'addComment') {
    require_once('models/posts.php');
    $singlePost = requestOne($_POST['postid'], $db);
    require('views/create-comment-form.php');
    require('views/create-comment-footer.php');
} else {
    require('views/create-post-form.php');
    require('views/create-post-footer.php');
}
