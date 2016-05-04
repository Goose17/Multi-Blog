        <div class="container">
            <div class="row">
                <form method="post" action="postController.php" id="create-post" class="col-sm-12">
                    <h4>Create Post</h4>
                    <div class="alert alert-danger hidden" role="alert"><p>Cannot post without a title and content.</p></div>
                    <div class="form-group">
                        <div class="row container">
                            <input type="text" class="form-control col-sm-12" id="title" placeholder="Title" name="title">
                        </div>
                        <div class="row container" style="padding-top: 15px; padding-bottom:15px;">
                            <textarea class="col-sm-12" name="content" form="create-post" style="min-height: 300px;" placeholder="Enter post..."></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Post">
                    </div>
                    <input type="hidden" name="task" value="addPost">
                </form>
            </div>
        </div>
