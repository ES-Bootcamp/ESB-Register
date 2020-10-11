<?php require 'includes/header.php'; ?>
<div class="container pt-5">
    <h1>Welcome to the interface </h1>
    <h5 class="text-muted">Please choose whether to login or to register!</h5>

    <!-- Action Cards -->
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <span class="fa fa-sign-in"></span>&nbsp;&nbsp;Sign in
                </div>
                <div class="card-body">
                    <h5 class="card-title">Sign in to your account</h5>
                    <p class="card-text">Here, you can login to our magic system!</p>
                    <a href="login.php" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <span class="fa fa-plus"></span>&nbsp;&nbsp;Sign in
                </div>  
                <div class="card-body">
                    <h5 class="card-title">New? Register here!</h5>
                    <p class="card-text">Here, you can Register as a new user in our magic system!</p>
                    <a href="register.php" class="btn btn-primary">Sign up</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'includes/footer.php'; ?>
