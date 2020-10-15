<?php
session_start();
require 'includes/header.php'; ?>

<div class="container pt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="actions/login.action.php" id="login-form" class="p-5" method="POST">
                <h3>Login to your account</h3>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="user-input">
                                <span class="fa fa-user"></span>
                                Choose a username
                            </label>
                            <input type="text" class="form-control" id="user-login-input" placeholder="Username" name="user" value="<?php 
                            if(isset($_SESSION['username_value'])) {
                                echo $_SESSION['username_value'];
                            } ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="password-input">
                                <span class="fa fa-lock"></span>
                                Pick a strong password
                            </label>
                            <input type="password" class="form-control" id="password-login-input" placeholder="Password" name="password">
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-lg btn-primary" id="login-button">Login</button>
                    </div>
                </div>
                <div class="row mt3">
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
                        endif;
                        if(isset($_SESSION['redirected_from_dashboard'])){
                        ?>
                         <div class="alert alert-danger mt-3" role="alert">
                            Please login first!
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
<?php 
unset($_SESSION['errors']);
session_destroy();
?>