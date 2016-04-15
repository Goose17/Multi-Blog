    <div id="post-display">
        <?php foreach ($posts as $post): ?>
        <div class="container">
            <div class="panel panel-info" id="panel-info">
                <div class="panel-heading">
                    <h3><?php echo htmlentities($post['title']); ?></h3>
                    <small><?php echo htmlentities($post['username']); ?></small>
                    <input type="hidden" name="postid" value="<?php echo htmlentities($post['post_id']); ?>">
                    <div class="pull-right">
                        <small id="time-stamp"><?php echo htmlentities($post['time_stamp']); ?></small>
                    </div>
                </div>
                <div class="panel-body">
                    <p><?php echo htmlentities($post['content']); ?></p>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-default" role="button" id="thumbs-up"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a>
                    <a class="btn btn-default" role="button" id="thumbs-down"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></a>
                    <strong id="rating-number" style="padding-left: 10px;"><?php echo htmlentities($post['rating']); ?></strong>
                    <input type="hidden" name="rating" value="<?php echo htmlentities($post['rating']); ?>">
                    <div class="pull-right">
                        <!-- I'm thinking we show number of flags to admins only? -->
                        <!-- Not a bad idea. I'm displaying them here for production purposes. -->
                        <strong id="flag-number" style="padding-left: 10px;"><?php echo htmlentities($post['flags']); ?></strong>
                        <a class="btn btn-default" role="button" id="flag"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></a>
                        <input type="hidden" name="flags" value="<?php echo htmlentities($post['flags']); ?>">
                        <a class="btn btn-default <?php if (!isset($_SESSION['username'])) {echo "disabled";} ?>" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Comment</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>