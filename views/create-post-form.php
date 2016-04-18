        <div class="container">
            <div class="row">
                <form method="post" action="postController.php" id="create-post" class="col-sm-12">
                    <h4>Create Post</h4>
                    <?php if (isset($failed_register_message)) { echo "<div class='alert alert-danger' role='alert'><p>$failed_register_message</p></div>";} ?>
                    <div class="form-group">
                        <div class="row container">
                            <label for="title">Title</label>
                            <input type="text" class="form-control col-sm-12" id="title" placeholder="Title" name="title">
                        </div>
                        <div class="row container" style="padding-top: 15px; padding-bottom:15px;">
                            <textarea class="col-sm-12" name="content" form="create-post" style="min-height: 500px; border-radius: 5px;" placeholder="Enter post..."></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Post">
                    </div>
                    <input type="hidden" name="task" value="addPost">
                </form>
            </div>
        </div>