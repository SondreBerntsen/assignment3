
<div class="container" id="itemContainer">

</div>


<div id="tmplContainer">
  <div id="tmplItem" class="row">
    <div class="col-md-8">
        <img  class="imgInItem" class="img-fluid imgItem" alt="Responsive image">
          <h1 class="itemName"></h1>
          <p class="itemDate">
          </p>
          <p class="itemDescr">
          </p>
    </div>
    <div class="col-md-4" >
      <h4 class="nameHeadingItem"><i class="fas fa-user-circle userImg"></i><span class="nameOwner"></span></h4>
      <button class="btn btn-primary col-md-12" style="margin-top:20px;" onclick="checkExistingThread()">Send melding</button>
    </div>
  </div>
</div>


<div class="modal fade" id="sendMessageModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="itemTitle">Item in question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h6 class="modal-title" id="sendMessageModalTitle">Your message</h6>
            <form method="post" >
              <div class="form-group">
                <textarea id="msgContent" class="form-control" name="content" rows="5"></textarea>
                <small class="form-text text-muted">You will be taken to your message thread after sending the message!</small>
              </div>
              <button type="submit" name="submit" class="btn btn-primary" onclick="newMsgThread()">Send message</button>
            </form>
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

      <!-- login, logout, message and add item -->
        <a href="uploadItem.php" id="uploadItem">
      		<button class="btn btn-primary newItemButton"><i class="fas fa-plus-circle"></i> List new item</button>
      	</a>


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
    <script src="js/item.js"></script>

    </body>
    </html>
