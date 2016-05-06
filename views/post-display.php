    <div id="post-display">
        <?php foreach ($posts as $post): ?>
        <div class="container">
            <div class="panel panel-default" id="panel-info">
                <!-- PANEL HEADING contains the post title, username, and timestamp -->
                <div class="panel-heading">
                    <h3><?php echo htmlentities($post['title']); ?></h3>
                    <small><?php echo htmlentities($post['username']); ?></small>
                    <div class="pull-right">
                        <small id="time-stamp"><?php echo htmlentities(date('m/d/Y - g:ia', strtotime($post['time_stamp']))); ?></small>
                    </div>
                </div>
                <!-- PANEL BODY contains the content of the post -->
                <div class="panel-body">
                    <p><?php echo htmlentities($post['content']); ?></p><?php if (hasComments($db, $post['post_id'])) {echo '<br>';} ?>
                    <a class="<?php if (!hasComments($db, $post['post_id'])) {echo 'hidden';} ?>" href="view-comments.php?id=<?php echo htmlentities($post['post_id']); ?>">See all comments</a>
                </div>
                <!-- PANEL FOOTER contains the thumb up and thumb down button, the post rating, the number of flags, the flag button, the comment button, the delete post button, and the drop flags button.
                All buttons are disabled for anyone not logged in.
                Users can only upvote, downvote, or flag each post once.
                The comment button takes you to a new page.
                The delete button only appears if the post was made by the user or if the user is an admin.
                The clear all flags only appears if the user is an admin-->
                <div class="panel-footer">
                    <!-- THUMB UP BUTTON -->
                    <?php if (isset($_SESSION['username'])){
                        if (requestRatings($_SESSION['username'], htmlentities($post['post_id']), $db)['rating'] == 1) {
                            echo ('<button id="thumbs-up" class="btn btn-default" disabled style="margin-right: 5px;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>');
                        } else {
                            echo ('<button id="thumbs-up" class="btn btn-default" style="margin-right: 5px;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>');
                        }
                    } else {
                        echo ('<button id="thumbs-up" class="btn btn-default" disabled style="margin-right: 5px;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>');
                    }

                    /* THUMB DOWN BUTTON */
                    if (isset($_SESSION['username'])) {
                        if (requestRatings($_SESSION['username'], htmlentities($post['post_id']), $db)['rating'] == -1) {
                            echo ('<button id="thumbs-down" class="btn btn-default" disabled><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></button>');
                        } else {
                            echo ('<button id="thumbs-down" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></button>');
                        }
                    } else {
                        echo ('<button id="thumbs-down" class="btn btn-default" disabled><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></button>');
                    }?>
                    <!-- RATING -->
                    <strong id="rating-number" style="padding-left: 10px;"><?php echo htmlentities($post['rating']); ?></strong>
                    <input type="hidden" name="rating" value="<?php echo htmlentities($post['rating']); ?>">
                    <!-- COMMENT BUTTON -->
                    <form action="postController.php" method="post" class="pull-right">
                        <input type="hidden" name="postid" value="<?php echo htmlentities($post['post_id']); ?>">
                        <input type="hidden" name="parent" value="<?php if (isset($post['parent'])) {echo htmlentities($post['parent']);}?>">
                        <button name="task" class="btn btn-default" value="addComment" <?php if (!isset($_SESSION['username'])) {echo 'disabled'; } ?>><span class="glyphicon glyphicon-pencil"></span> Comment</button>
                        <?php if (isset($_SESSION['admin_status'], $_SESSION['username']) && ($_SESSION['admin_status'] == 1 || $_SESSION['username'] == $post['username'])) {
                            echo '<button name="task" class="btn btn-danger" value="dropPost"><span class="glyphicon glyphicon-trash"></span></button>';
                        } if (isset($_SESSION['admin_status']) && $_SESSION['admin_status'] == 1) {
                            echo '<button style="margin-left: 5px;" name="task" class="btn btn-warning" value="clearFlags">Clear Flags</button>';
                        }?>
                    </form>
                    <div class="pull-right" >
                        <!-- FLAG COUNT -->
                        <strong name="flag-count" style="margin-right: 10px;"><?php if (isset($post['flags'])) { echo htmlentities($post['flags']); } ?></strong>
                        <input type="hidden" name="postid" value="<?php echo htmlentities($post['post_id']); ?>">
                        <!-- FLAG BUTTON -->
                        <?php if (isset($_SESSION['username'])) {
                            if (requestRatings($_SESSION['username'], htmlentities($post['post_id']), $db)['flagged'] == 1) {
                                echo ('<button id="flag-up" class="btn btn-default" disabled style="margin-right: 5px;"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></button>');
                            } else {
                                echo ('<button id="flag-up" class="btn btn-default" style="margin-right: 5px;"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></button>');
                            }
                        } else {
                            echo ('<button id="flag-up" class="btn btn-default" disabled style="margin-right: 5px;"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></button>');
                        }?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
