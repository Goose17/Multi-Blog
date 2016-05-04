        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="panel panel-info" id="panel-info">
                        <div class="panel-heading">
                            <h3><?php echo htmlentities($singlePost['title']); ?></h3>
                            <small><?php echo htmlentities($singlePost['username']); ?></small>
                            <input type="hidden" name="postid" value="<?php echo htmlentities($singlePost['post_id']); ?>">
                            <div class="pull-right">
                                <small id="time-stamp"><?php echo htmlentities(date('m/d/Y - g:ia', strtotime($singlePost['time_stamp']))); ?></small>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p><?php echo htmlentities($singlePost['content']); ?></p>
                        </div>
                        <div class="panel-footer">
                            <a class="btn btn-default" role="button" id="thumbs-up"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span></a>
                            <a class="btn btn-default" role="button" id="thumbs-down"><span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span></a>
                            <strong id="rating-number" style="padding-left: 10px;"><?php echo htmlentities($singlePost['rating']); ?></strong>
                            <input type="hidden" name="rating" value="<?php echo htmlentities($singlePost['rating']); ?>">
                            <div class="pull-right">
                                <a class="btn btn-default pull-right" role="button" id="flag"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span></a>
                                <div class="pull-right" style="padding: 7px">
                                    <strong id="flag-number" ><?php echo htmlentities($singlePost['flags']); ?></strong>
                                </div>
                                <input type="hidden" name="flags" value="<?php echo htmlentities($singlePost['flags']); ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <form method="post" action="commentController.php" id="create-post" class="col-sm-12">
                    <h4>Comment</h4>
                    <?php if (isset($failed_register_message)) { echo "<div class='alert alert-danger' role='alert'><p>$failed_register_message</p></div>";} ?>
                    <div class="form-group">
                        <div class="alert alert-danger hidden" role="alert"><p>Comments must have content.</p></div>
                        <div class="row container">
                            <input type="text" class="form-control col-sm-12" id="title" placeholder="Title (Optional)" name="title">
                        </div>
                        <div class="row container" style="padding-top: 15px; padding-bottom:15px;">
                            <textarea class="col-sm-12" name="content" form="create-post" style="min-height: 300px;" placeholder="Enter post..."></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Post">
                    </div>
                    <input type="hidden" name="task" value="addComment">
                    <input type="hidden" name="parent" value="<?php echo htmlentities($singlePost['post_id']); ?>">
                </form>
            </div>
        </div>
