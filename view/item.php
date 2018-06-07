
<div class="container" id="itemContainer">
  <div class="row">
    <div class="col-md-8">
        <img  class="imgInItem" class="img-fluid imgItem" alt="Responsive image" onerror="this.src ='./resources/images/error.jpg';">
          <h1 class="itemName"></h1>
          <p class="itemDate">
          </p>
          <p class="itemDescr">
          </p>
    </div>
    <div id="messageButtonContainer" class="col-md-4" >
      <h4 class="nameHeadingItem"><i class="fas fa-user-circle userImg"></i><span class="nameOwner"></span></h4>
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

<div class="tmplContainer">
  <button id="sendMessageButton" class="btn btn-primary col-md-12" style="margin-top:20px;" onclick="checkExistingThread()">Send melding</button>
</div>

    <script src="js/item.js"></script>
