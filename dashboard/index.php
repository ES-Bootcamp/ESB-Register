<?php 
session_start();
$_SESSION['redirected_from_dashboard'] = true;
if(!isset($_SESSION['is_logged_in'])) header('Location: ../login.php'); exit;
require '../includes/header.php'; 
?>
<form action="../actions/logout.action.php" method="POST">
    <button type="submit">Log out</button>
</form>

<?php require '../includes/footer.php';