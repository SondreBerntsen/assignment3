
<div class="container" id="itemContainer"></div>

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

    <script src="js/item.js"></script>
