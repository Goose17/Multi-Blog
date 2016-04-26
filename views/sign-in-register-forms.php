        <div class="container">
            <div class="row">
                <form method="post" action="sign-in-control.php" class="col-sm-12 col-md-6" id="register-form">
                    <h4>Register</h4>
                    <?php if (isset($failed_register_message)) { echo "<div class='alert alert-danger' role='alert'><p>$failed_register_message</p></div>";} ?>
                    <div class="form-group">
                        <label for="username-signup" class="control-label">Username</label>
                        <input type="text" class="form-control" id="username-signup" placeholder="Username" name="username_register">
                        <p class="hidden control-label">Must have a username.</p>
                    </div>
                    <div class="form-group">
                        <label for="password-signup" class="control-label">Password</label>
                        <input type="password" class="form-control" id="password-signup" placeholder="Password" name="password_register">
                        <p class="hidden control-label">Password must be at least 6 characters.</p>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm-signup" class="control-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password-confirm-signup" placeholder="Confirm Password">
                        <p class="hidden control-label">Passwords do not match.</p>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Register" id="signup-submit" disabled="true">
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