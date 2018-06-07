


<div class="container py-3">
    <div class="row">
        <div class="col-10 mx-auto">
          <div class="profileheader">
            <h2 class="mb-3 profileheading justify-content-left">Your profile</h2>
          </div>
            <ul class="nav nav-tabs small justify-content-end" role="tablist">
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#listings" role="tab">Listings</a></li>
								<a href="view/messagerino.php">
									<button name="messages" type="button" class="btn btn-info messagebutton"><i class="fas fa-comments messageicon"></i> Messages</button>
								</a>
            </ul>
            <div id="content" class="tab-content py-4">
                <div class="tab-pane active" id="settings" role="tabpanel">
                  <h4 class="mb-3">Change your settings</h2>
                    <div class="accordion col-md-8" id="accordion">
                      <div class="card">
                        <div class="card-header" id="headingName"  type="button" data-toggle="collapse" data-target="#nameChangeForm" aria-expanded="false" aria-controls="nameChangeForm">
                          <h6 class="mb-0">Change your name</h6>
                        </div>
                        <div id="nameChangeForm" class="collapse" aria-labelledby="headingName" data-parent="#accordion">
                          <div class="card-body">
                            <form>
                              <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" id="firstname"  placeholder="Firstname" required>
                              </div>
                              <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Lastname" required>
                              </div>
                              <button type="submit" class="btn btn-primary" name="submitNameChange">Change name</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingEmail" type="button" data-toggle="collapse" data-target="#emailChangeForm" aria-expanded="false" aria-controls="emailChangeForm">
                          <h6 class="mb-0">Change your email</h6>
                        </div>
                        <div id="emailChangeForm" class="collapse" aria-labelledby="headingEmail" data-parent="#accordion">
                          <div class="card-body">
                            <form>
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" required>
                              </div>
                              <button type="submit" class="btn btn-primary" name="submitEmailChange">Change email</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingPassword" type="button" data-toggle="collapse" data-target="#passwordChangeForm" aria-expanded="false" aria-controls="passwordChangeForm">
                          <h6 class="mb-0">Change your password</h6>
                        </div>
                        <div id="passwordChangeForm" class="collapse" aria-labelledby="headingPassword" data-parent="#accordion">
                          <div class="card-body">
                            <form>
                              <div class="form-group">
                                <label for="password1">Password</label>
                                <input type="password" class="form-control" id="password1"  placeholder="Password" required>
                              </div>
                              <div class="form-group">
                                <label for="password2">Repeat password</label>
                                <input type="password" class="form-control" id="password2" placeholder="Password" required>
                              </div>
                              <button type="submit" class="btn btn-primary" name="submitPasswordChange">Change Password</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="tab-pane" id="listings" role="tabpanel">
                  <h4 class="mb-3">Listings</h2>
                    <div class="useritem rounded">
                      <div class="row">
                        <div class="col-md-8 useritemdesc">
                          <div class="card-block">
                            <h5 class="card-title">Test title</h5>
                            <h6 class='card-subtitle mb-2 text-muted dateItem'></h6><br />
                            <p class="card-text">The nav-tabs above use `justify-content-end` to align all tabs on the right. Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut
                                semiotics, raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave
                                meditation. Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card-img-bottom float-right">
                            <img src="resources/images/testimg.jpg" class="img-fluid imgItem" alt="Responsive image">
                          </div>
                          <button name="edit" type="submit" class="btn btn-info userbutton">Edit item</button>
                          <button name="deleteitem" type="submit" class="btn btn-outline-danger userbutton">Delete item</button>
                        </div>
                      </div>
                    </div>
                </div>
						</div>
        </div>
    </div>
</div>

<!-- Templates -->
<div id="tmplContainer">
  <div class="recipientmessage">
    <div class="recipientname">
      <h6>Ronny</h6>
    </div>
    <p>yo</p>
  </div>
  <div class="mymessage">
    <h6>Me</h6>
    <p>About that used condom?About that used condom?</p>
  </div>
  <a id="convTmpl">
    <div class="card">
      <div class="card-block">
        <h6 class="card-title msgTitle"></h5>
          <h6 class='card-subtitle mb-2 text-muted dateItem msgParticipant'></h6>
      </div>
    </div>
  </a>
  <a id="categoryTmpl"><li></li></a>

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
						<img id="pleaseWork" class="img-fluid imgItem" alt="Responsive image">
					</div>
				</div>
			</div>
		</div>
	</a>

	<div id="tmplContainer"></div>

	<!-- login, logout, message and add item -->
		<!--<a href="messages.php" id="messageButton"><button class="btn btn-info"><i class="fas fa-comments"></i> Messages</button></a>-->

		<a href="messages.php" class="messagesButton" id="messageButton"><button class="btn btn-info"><i class="fas fa-comments"></i> Messages</button></a>

  <form id="formTmpl" class="logoutloginform" method="post">
	<div class="form-group">
		<a href="user.php" id="userButton"><button class="btn btn-info"><i class="fas fa-user"></i> My profile</button></a>
		<a href="login.php" id="loginButton"><button class="btn btn-success"><i class="fas fa-power-off"></i> Log in</button></a>
		<button id="logoutButton" name="logout" class="btn btn-outline-danger" role="button" type="submit"><i class="fas fa-power-off"></i> Log out</button>
	</div>
</form>


</div>

<?php
if(isset($_POST['logout'])){
  session_destroy();
  header('Refresh:0');
}
?>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="js/user.js"></script>

</body>
</html>
