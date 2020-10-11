<?php require 'includes/header.php'; ?>


<div class="container pt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="" id="login-form" class="p-5">
                <h3>Login to your account</h3>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="user-input">
                                <span class="fa fa-user"></span>
                                Choose a username
                            </label>
                            <input type="text" class="form-control" id="user-login-input" placeholder="Username">
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
                            <input type="text" class="form-control" id="password-login-input" placeholder="Password">
                        </div>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-lg btn-primary" id="login-button">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>