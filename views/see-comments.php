    <div class="container">    
        <div class="panel panel-info">    
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
        </div>
        <?php foreach($comments as $comment): ?>
        <div class="well">
            <div class="pull-right">
                <small><?php echo htmlentities(date('m/d/Y - g:ia', strtotime($comment['time_stamp']))); ?></small>
            </div>
            <h4><?php echo htmlentities($comment['username']); ?></h5>
            <h5><?php echo htmlentities($comment['title']); ?></h5>
            <p><?php echo htmlentities($comment['content']); ?></p>
        </div>
        <?php endforeach; ?>
    </div>