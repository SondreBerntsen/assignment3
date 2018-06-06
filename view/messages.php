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
