        <div class="container">
            <div class="row">
                <form method="post" action="postController.php" id="create-post" class="col-sm-12">
                    <h4>Create Post</h4>
                    <?php if (isset($failed_register_message)) { echo "<div class='alert alert-danger' role='alert'><p>$failed_register_message</p></div>";} ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Post">
                    <input type="hidden" name="task" value="addPost">
                </form>
                <textarea name="content" form="create-post">Enter text here...</textarea>
            </div>
        </div>