    <div id="post-display">
        <?php foreach ($posts as $post): ?>
        <div class="container">
            <div class="panel panel-info" id="panel-info">
                <div class="panel-heading">
                    <h3><?php echo htmlentities($post['title']); ?></h3>
                    <small><?php echo htmlentities($post['username']); ?></small>
                    <input type="hidden" name="postid" value="<?php echo htmlentities($post['post_id']); ?>">
                    <div class="pull-right">
                        <small id="time-stamp"><?php echo htmlentities(date('m/d/Y - g:ia', strtotime($post['time_stamp']))); ?></small>
                    </div>
                </div>
                <div class="panel-body">
                    <p><?php echo htmlentities($post['content']); ?></p>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-default" role="button" id="thumbs-up" <?php if (!isset($_SESSION['username'])) {echo "disabled";} ?>><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>
                    <button class="btn btn-default" role="button" id="thumbs-down" <?php if (!isset($_SESSION['username'])) {echo "disabled";} ?>><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></button>
                    <strong id="rating-number" style="padding-left: 10px;"><?php echo htmlentities($post['rating']); ?></strong>
                    <input type="hidden" name="rating" value="<?php echo htmlentities($post['rating']); ?>">
                    <div class="pull-right">
                        <form action="postController.php" method="post" class="pull-right">
                            <input type="hidden" name="postid" value="<?php echo htmlentities($post['post_id']); ?>">
                            <input type="hidden" name="task" value="dropPost">
                            <?php if ((isset($_SESSION['username']) && $_SESSION['username'] == $post['username']) || (isset($_SESSION['admin_status']) && $_SESSION['admin_status'] == 1)) {
                                echo '<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
                            } ?>
                        </form>
                        <form action="postController.php" method="post" class="pull-right">
                            <input type="hidden" name="postid" value="<?php echo htmlentities($post['post_id']); ?>">
                            <input type="hidden" name="task" value="addComment">
                            <button type="submit" class="btn btn-default" <?php if (!isset($_SESSION['username'])) {echo "disabled";} ?>><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Comment</button>
                        </form>
                        <!-- I'm thinking we show number of flags to admins only? -->
                        <!-- Not a bad idea. I'm displaying them here for production purposes. -->
                        <button class="btn btn-default pull-right" role="button" id="flag" <?php if (!isset($_SESSION['username'])) {echo "disabled";} ?>><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></button>
                        <a class="btn btn-default pull-right" role="button" id="flag"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></a>
                        <div class="pull-right" style="padding: 7px">
                            <strong id="flag-number" ><?php echo htmlentities($post['flags']); ?></strong>
                        </div>
                        <input type="hidden" name="flags" value="<?php echo htmlentities($post['flags']); ?>">
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>