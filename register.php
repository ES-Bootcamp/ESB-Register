
<?php
session_start();
require 'includes/header.php'; ?>

<div class="container pt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="actions/register.action.php" method="post" id="register-form" class="p-5">
                <h3>Login to your account</h3>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="user-input">
                                <span class="fa fa-user"></span>
                                Username
                            </label>
                            <input type="text" class="form-control" id="user-register-input" name="username" placeholder="Username">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="password-input">
                                <span class="fa fa-lock"></span>
                                Password
                            </label>
                            <input type="password" class="form-control" id="password-register-input" name="password" placeholder="Password">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="password-input">
                                <span class="fa fa-lock"></span>
                                Repeat password
                            </label>
                            <input type="password" class="form-control" id="re-password-register-input" name="Repeat_password" placeholder="Repeat password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="password-input">
                                <span class="fa fa-at"></span>
                                Your email
                            </label>
                            <input type="email" class="form-control" id="email-register-input" 
                            name="email"
                            placeholder="email">
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-lg btn-primary" id="register-button" name='register-button'>Register</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                    <?php 
                        if(isset($_SESSION['errors'])):
                            foreach($_SESSION['errors'] as $error):
                        ?>
                        <div class="alert alert-danger mt-3" role="alert">
                        <?= $error; ?>
                        </div>
                        <?php 
                            endforeach;    
                        endif; ?>
                        </div>
                        </div>
            </form>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; 
unset($_SESSION['errors']);
session_destroy();?>