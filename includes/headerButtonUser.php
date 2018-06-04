
<form method="post">
  <button name="logout" class="btn btn-success" role="button" type="submit">
    <i class="fas fa-user"></i> Log out
  </button>
</form>
<?php
if(isset($_POST['logout'])){
  session_unset($_SESSION['userID']);
  session_destroy();
  header('location:index.php');
}
?>
