        <?php foreach ($posts as $post): ?>
        <div class="container">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3><?php echo htmlentities($post['title']); ?></h3>
                    <small><?php echo htmlentities($post['username']); ?></small>
                    <input type="hidden" name="postid" value="<?php echo htmlentities($post['post_id']); ?>">
                </div>
                <div class="panel-body">
                    <p><?php echo htmlentities($post['content']); ?></p>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-default" role="button"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a>
                    <a class="btn btn-default" role="button"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></a>
                    <strong style="padding-left: 10px;"><?php echo htmlentities($post['rating']); ?></strong>
                    <div class="pull-right">
                        <!-- I'm thinking we show number of flags to admins only? -->
                        <a class="btn btn-default" role="button"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></a>
                        <a class="btn btn-default <?php if (!isset($_SESSION['username'])) {echo "disabled";} ?>" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Comment</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>