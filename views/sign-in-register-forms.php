        <div class="container">
            <div class="row">
                <form id="register-form" method="post" action="sign-in-control.php" class="col-sm-12 col-md-6" id="register-form">
                    <h4>Register</h4>
                    <?php if (isset($failed_register_message)) { echo "<div class='alert alert-danger' role='alert'><p>$failed_register_message</p></div>";} ?>
                    <div class="form-group">
                        <div>
                          <label for="username-signup" class="control-label">Username</label>
                          <label for="username-signup" class="hidden pull-right control-label" id="username-warning">Must have a username.</label>
                        </div>
                        <input type="text" class="form-control" id="username-signup" placeholder="Username" name="username_register">
                    </div>
                    <div class="form-group">
                        <div>
                          <label for="password-signup" class="control-label">Password</label>
                          <label for="password-signup" class="hidden control-label pull-right" id="p_warning">Password must be at least 6 characters.</label>
                        </div>
                        <input type="password" class="form-control" id="password-signup" placeholder="Password" name="password_register">
                    </div>
                    <div class="form-group">
                        <div>
                          <label for="password-confirm-signup" class="control-label">Confirm Password</label>
                          <label for="password-confirm-signup" id="pc_warning" class="hidden pull-right control-label">Passwords do not match.</label>
                        </div>
                        <input type="password" class="form-control" id="password-confirm-signup" placeholder="Confirm Password">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Register" id="signup-submit">
                </form>
                <form method="post" action="sign-in-control.php" class="col-sm-12 col-md-6">
                    <h4>Login</h4>
                    <?php if (isset($failed_login_message)) { echo "<div class='alert alert-danger' role='alert'><p>$failed_login_message</p></div>";} ?>
                    <div class="form-group">
                        <label for="username-signin">Username</label>
                        <input type="text" class="form-control" id="username-signin" placeholder="Username" name="username_login">
                    </div>
                    <div class="form-group">
                        <label for="password-signin">Password</label>
                        <input type="password" class="form-control" id="password-signin" placeholder="Password" name="password_login">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Login">
                </form>
            </div>
        </div>
