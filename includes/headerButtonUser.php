
<form method="post">
  <button name="logout" class="btn btn-success" role="button" type="submit">
    <i class="fas fa-user"></i> Log out
  </button>
</form>
<?php
if(isset($_POST['logout'])){
  session_start();
  session_unset();
  session_destroy();
  header('location:index.php');
}
?>
