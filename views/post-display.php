    <div id="post-display">
        <?php foreach ($posts as $post): ?>
        <div class="container">
            <div class="panel panel-info" id="panel-info">
                <div class="panel-heading">
                    <h3><?php echo htmlentities($post['title']); ?></h3>
                    <small><?php echo htmlentities($post['username']); ?></small>
                    <div class="pull-right">
                        <small id="time-stamp"><?php echo htmlentities(date('m/d/Y - g:ia', strtotime($post['time_stamp']))); ?></small>
                    </div>
                </div>
                <div class="panel-body">
                    <p><?php echo htmlentities($post['content']); ?></p>
                </div>
                <div class="panel-footer">
                    <?php if (isset($_SESSION['username'])) {
                        if (requestRatings($_SESSION['username'], htmlentities($post['post_id']), $db)['rating'] == 1) {
                            echo ('<button id="thumbs-up" class="btn btn-default" disabled style="margin-right: 5px;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>');
                        } else {
                            echo ('<button id="thumbs-up enabled" class="btn btn-default" style="margin-right: 5px;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>');
                        }
                    } else {
                        echo ('<button id="thumbs-up" class="btn btn-default" disabled style="margin-right: 5px;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>');
                    }
                    
                    if (isset($_SESSION['username'])) {
                        if (requestRatings($_SESSION['username'], htmlentities($post['post_id']), $db)['rating'] == -1) {
                            echo ('<button id="thumbs-down" class="btn btn-default disabled"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></button>');
                        } else {
                            echo ('<button id="thumbs-down enabled" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></button>');
                        }
                    } else {
                        echo ('<button id="thumbs-down" class="btn btn-default disabled"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></button>');
                    }?>
                    <strong id="rating-number" style="padding-left: 10px;"><?php echo htmlentities($post['rating']); ?></strong>
                    <input type="hidden" name="rating" value="<?php echo htmlentities($post['rating']); ?>">
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
                        <strong name="flag-count" style="margin-right: 10px;"><?php if (isset($post['flags'])) { echo htmlentities($post['flags']); } ?></strong>
                        <?php if (isset($_SESSION['username'])) {
                            if (requestRatings($_SESSION['username'], htmlentities($post['post_id']), $db)['flagged'] == 1) {
                                echo ('<button id="flag-up" class="btn btn-default" disabled style="margin-right: 5px;"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></button>');
                            } else {
                                echo ('<button id="flag-up enabled" class="btn btn-default" style="margin-right: 5px;"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></button>');
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