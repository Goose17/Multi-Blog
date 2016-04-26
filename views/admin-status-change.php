        <div class="container">
            <div class="row">
                <form method="post" action="admin-control.php" class="col-sm-12 col-md-6" id="register-form">
                    <h4>Grant Administrator Status</h4>
                    <?php if (isset($failed_grant_message)) { echo "<div class='alert alert-danger' role='alert'><p>$failed_grant_message</p></div>";} ?>
                    <?php if (isset($success_grant_message)) { echo "<div class='alert alert-success' role='alert'><p>$success_grant_message</p></div>";} ?>
                    <div class="form-group">
                        <label for="username-grant">Username <small>(of user you wish to grant admin status)</small></label>
                        <input type="text" class="form-control" id="username-grant" placeholder="Username" name="username_grant">
                    </div>
                    <div class="form-group">
                        <label for="password-grant">Password <small>(of current user)</small></label>
                        <input type="password" class="form-control" id="password-grant" placeholder="Password" name="password_grant">
                    </div>
                    <input type="submit" class="btn btn-warning" value="Grant Status" id="grant-submit"> <!--disabled="true"-->
                </form>
                <form method="post" action="admin-control.php" class="col-sm-12 col-md-6">
                    <h4>Disable Administrative Status</h4>
                    <?php if (isset($failed_disable_message)) { echo "<div class='alert alert-danger' role='alert'><p>$failed_disable_message</p></div>";} ?>
                    <?php if (isset($success_disable_message)) { echo "<div class='alert alert-success' role='alert'><p>$success_disable_message</p></div>";} ?>
                    <div class="form-group">
                        <label for="username-disable">Username <small>(of admin you wish to disable status for)</small></label>
                        <input type="text" class="form-control" id="username-disable" placeholder="Username" name="username_disable">
                    </div>
                    <div class="form-group">
                        <label for="password-disable">Password <small>(of current user)</small></label>
                        <input type="password" class="form-control" id="password-disable" placeholder="Password" name="password_disable">
                    </div>
                    <input type="submit" class="btn btn-danger" value="Remove Administrative Status">
                </form>
            </div>
        </div>