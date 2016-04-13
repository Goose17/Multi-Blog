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
                    <button class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></button>
                    <button class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></button>
                    <button class="btn btn-default"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></button>
                    <button class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Comment</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>