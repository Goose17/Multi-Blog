    <div class="container" id="post-display">
        <div class="panel panel-default">
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
                        echo ('<button id="thumbs-up" class="btn btn-default" style="margin-right: 5px;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>');
                    }
                } else {
                    echo ('<button id="thumbs-up" class="btn btn-default" disabled style="margin-right: 5px;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>');
                }
                if (isset($_SESSION['username'])) {
                    if (requestRatings($_SESSION['username'], htmlentities($post['post_id']), $db)['rating'] == -1) {
                        echo ('<button id="thumbs-down" class="btn btn-default disabled"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></button>');
                    } else {
                        echo ('<button id="thumbs-down" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></button>');
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
                    <input type="hidden" name="postid" value="<?php echo htmlentities($post['post_id']); ?>">
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
        <?php foreach($comments as $comment): ?>
        <div class="well">
          <div class="row">
            <div class="col-sm-2">
                <h3><?php echo htmlentities($comment['username']); ?></h3>
                <small><?php echo htmlentities(date('m/d/Y - g:ia', strtotime($comment['time_stamp']))); ?></small>
            </div>
            <div class="col-sm-10">
              <h5><strong><?php echo htmlentities($comment['title']); ?></strong></h5>
              <p><?php echo htmlentities($comment['content']); ?></p>
            </div>
          </div>
          <form class="row" action="commentController.php" method="post">
            <input type="hidden" value="<?php echo htmlentities($comment['post_id']); ?>" name="comment_id">
            <input type="hidden" value="<?php echo htmlentities($comment['parent']); ?>" name="comment_parent">
            <div class="pull-right">
              <button name="task" value="doubleComment" class="btn btn-default" <?php if (!isset($_SESSION['username'])) {echo 'style="margin-right: 5px;" '; echo 'disabled'; } else if($_SESSION['username'] != $comment['username']) {echo 'style="margin-right: 5px;"';} ?>><span class="glyphicon glyphicon-pencil"></span> Comment</button>
              <?php if (isset($_SESSION['admin_status'], $_SESSION['username']) && ($_SESSION['admin_status'] == 1 || $_SESSION['username'] == $comment['username'])) {
                  echo '<button name="task" class="btn btn-danger" value="dropPost" style="margin-right: 5px;"><span class="glyphicon glyphicon-trash"></span></button>';
                } ?>
            </div>
          </form>
        </div>
        <?php endforeach; ?>
    </div>
