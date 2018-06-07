<div class="container">
  <div class="row">
    <div class="col-10 mx-auto">
      <div class="profileheader">
        <h2 class="mb-3 profileheading justify-content-left">Messages</h2>
      </div>
      <div class="row">
        <div class="col-3">
          <!-- message nav -->
          <ul class="nav nav-tabs small" role="tablist">
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#mymessages" role="tab">My items</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#othermessages" role="tab">Other items</a></li>
          </ul>
          <!-- message cards -->
          <div id="content" class="tab-content py-4">
            <div class="tab-pane active" id="mymessages" role="tabpanel">

            </div>

            <div class="tab-pane" id="othermessages" role="tabpanel">

            </div>
          </div>
        </div>

        <!-- messagethreadcontainer -->
        <div class="col">
          <div class="messagecontainer">
            <div class="msgList">

            </div>
            <form class="form-inline messageform" method="POST">
                <textarea name="message" required class="form-control mr-sm-2 sendmessage col-md-8" type="text" placeholder="Enter message" aria-label="entermessage"></textarea>
                <button class="headerbutton btn btn-success sendmessagebutton col-md-3" type="submit">Send message</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Templates -->
<div id="tmplContainer">

  <div id="theirMsg" class="recipientmessage">
    <div class="recipientname">
      <h6>Ronny</h6>
    </div>
    <p>yo</p>
  </div>

  <div id="myMsg" class="mymessage">
    <h6>Me</h6>
    <p>About that used condom?About that used condom?</p>
  </div>

  <div id="convTmpl">
    <div class="card">
      <div class="card-block">
        <h6 class="card-title msgTitle"></h5>
          <h6 class='card-subtitle mb-2 text-muted dateItem msgParticipant'></h6>
      </div>
    </div>
  </div>
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

  <form id="formTmpl" class="logoutloginform" method="post"></form>
  <!-- MESSAGES BUTTON
  <a href="messages.php">
    <button name="messages" type="button" class="btn btn-info messagebutton"><i class="fas fa-comments messageicon"></i> Messages</button>
  </a>

  <a id="loginButton" href="login.php" class="btn btn-success" role="button" type="submit">
    <i class="fas fa-user"></i> Log in
  </a>
  -->

  <a id="loginButton" href="login.php">
    <button name="messages" type="submit" role="button" class="btn btn-success"><i class="fas fa-user"></i> Log in</button>
  </a>

  <button id="logoutButton" name="logout" class="btn btn-success" role="button" type="submit"><i class="fas fa-user"></i> Log out</button>


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
<script src="js/messages.js"></script>


</body>
</html>
