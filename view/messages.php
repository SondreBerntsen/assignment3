<div class="container">
  <div class="row">
    <div class="col-10 mx-auto">
      <div class="profileheader">
        <h2 class="mb-3 profileheading justify-content-left">Messages</h2>
      </div>
      <div class="row">
        <div class="col-md-3">
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
        <div class="col-md-9">
          <div class="messagecontainer">
            <div class="msgList">

            </div>

          </div>
          <form class="form-inline messageform" method="POST">
              <textarea id="messageContent" name="message" required class="form-control mr-sm-2 sendmessage col-sm-12 col-md-8" type="text" placeholder="Enter message" aria-label="entermessage" required></textarea>
          </form>
          <button class="headerbutton btn btn-success sendmessagebutton col-md-3 col-sm-12" onclick="newMessage()">Send message</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Templates for individual page-->
<div class="tmplContainer">

  <div id="theirMsg" class="recipientmessage col-md-6">
      <h6 class="senderName">Ronny</h6>
    <p></p>
  </div>

  <div id="myMsg" class="mymessage col-md-6">
    <h6 class="myName">Me</h6>
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

</div>

<?php
  if(!isset($_SESSION['userID'])){
    header('location:login.php');
  }
?>

<script src="js/messages.js"></script>
