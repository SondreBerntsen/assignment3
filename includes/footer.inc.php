<!-- General templates -->
<div class="tmplContainer">

	<a  id="itemCardTempl">
		<div class="card">
			<div class="row">
				<div class="col-md-8">
					<div class="card-block">
						<h5 class="card-title"></h5>
						<h6 class='card-subtitle mb-2 text-muted dateItem'></h6><br />
						<p class="card-text"></p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card-img-bottom float-right">
						<img id="pleaseWork" class="img-fluid imgItem" alt="Responsive image" onerror="this.src ='./resources/images/error.jpg';">
					</div>
				</div>
			</div>
		</div>
	</a>

<!-- login, logout, message and add item -->
  <a href="uploadItem.php" id="uploadItem">
		<button class="btn btn-primary"><i class="fas fa-plus-circle"></i> List new item</button>
	</a>


	<a href="messages.php" class="messagesButton" id="messageButton"><button class="btn btn-info"><i class="fas fa-comments"></i> Messages</button></a>

  <form id="formTmpl" class="logoutloginform" method="post">
		<div class="form-group">
			<button id="logoutButton" name="logout" class="btn btn-outline-danger" role="button" type="submit"><i class="fas fa-power-off"></i> Log out</button>
		</div>
	</form>

  <a href="user.php" id="userButton"><button class="btn btn-info"><i class="fas fa-user"></i> My profile</button></a>
  <a href="login.php" id="loginButton"><button class="btn btn-success"><i class="fas fa-power-off"></i> Log in</button></a>

</div>

<?php
if(isset($_POST['logout'])){
	session_destroy();
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/main.js"></script>


</body>
</html>
