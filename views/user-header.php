<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css">
    </head>
    <body style="padding-top: 70px;">
        <nav class="navbar-default navbar navbar-fixed-top">
            <div class="container">
                <a href="index.php" class="navbar-brand">Home</a>
                <?php if (isset($_SESSION['admin_status']) && $_SESSION['admin_status'] == 1) {
                    echo '<a href="admin-control.php"><button class="navbar-btn btn btn-warning">Edit Administrative Rights</button></a>';
                } ?>
                <ul class="navbar-right navbar-nav nav">
                    <li class="navbar-text"><?php echo $_SESSION['username']; ?></li>
                    <li><a href="postController.php">Create Post</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
