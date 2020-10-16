<?php 
session_start();
if(!$_SESSION['is_logged_in']) {
    header('Location: ../login.php'); 
    exit;
}
require '../includes/header.php'; 
?>
<div class="container pt-5">
    <h1>Weclome <?=$_SESSION['username_value'] ?></h1>
<form action="../actions/logout.action.php" method="POST">
    <button type="submit">Log out</button>
</form>
</div>
<?php require '../includes/footer.php';