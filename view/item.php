
<div class="container" id="itemContainer">

</div>


<div id="tmplContainer">
  <div id="tmplItem" class="row">
    <div class="col-md-8">
        <img  class="imgInItem" src="resources/images/testimg.jpg" class="img-fluid imgItem" alt="Responsive image">
          <h1 class="itemName"></h1>
          <p class="itemDate">
          </p>
          <p class="itemDescr">
          </p>
    </div>
    <div class="col-md-4" >
      <h4 class="nameHeadingItem"><i class="fas fa-user-circle userImg"></i><span class="nameOwner"></span></h4>
      <button class="btn btn-primary col-md-12" data-toggle="modal" data-target="#sendMessageModal" style="margin-top:20px;">Send melding</button>
    </div>
  </div>
</div>


<div class="modal fade" id="sendMessageModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="sendMessageModalTitle">Your message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="includes/entries.inc.php" method="POST">
              <div class="form-group">
                <label for="itemTitle">Item in question</label>
                <input type="text" class="form-control" placeholder="Enter entry title" name="title">
              </div>
              <div class="form-group">
                <textarea class="form-control" name="content" rows="5"></textarea>
                <small id="usernameHelp" class="form-text text-muted">Hope your new entry is a hit!</small>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Select topic</label>
                <select class="form-control" name="topics">
                  <?php
                      while ($row = mysqli_fetch_array($result)) {
                          echo "<option name='topics' value='" . $row['topic_id'] . "'>" . $row['topic_name'] . "</option>";
                      }
                  ?>
                </select>
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
