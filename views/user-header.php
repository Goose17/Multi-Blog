<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body style="padding-top: 70px;">
        <nav class="navbar-default navbar navbar-fixed-top">
            <div class="container">
                <a href="index.php" class="navbar-brand">Home</a>
                <div class="navbar-right">
                    <p class="navbar-text"><?php echo $_SESSION['username']; ?></p>
                    <a href="postController.php"><button class="navbar-btn btn btn-primary">Create Post</button></a>
                    <a href="logout.php"><button class="navbar-btn btn btn-primary">Logout</button></a>
                </div>
            </div>
        </nav>
    