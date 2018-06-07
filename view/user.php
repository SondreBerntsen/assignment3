


<div class="container py-3">
    <div class="row">
        <div class="col-10 mx-auto">
          <div class="profileheader">
            <h2 class="mb-3 profileheading justify-content-left">Your profile</h2>
          </div>
            <ul class="nav nav-tabs small justify-content-end" role="tablist">
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#listings" role="tab">Listings</a></li>
            </ul>
            <div id="content" class="tab-content py-4">
                <div class="tab-pane active" id="settings" role="tabpanel">
                  <div class="row">
                    <div class="col-md-4">

                    <ul class="list-group list-group-flush">
                      <li class="list-group-item" id="userfName"> </li>
                      <li class="list-group-item" id="userSurname"></li>
                      <li class="list-group-item" id="userEmail"><i class="fas fa-at"></i></li>
                    </ul>
                    </div>

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
                </div>

                <div class="tab-pane" id="listings" role="tabpanel">
                  <h4 id="listItems" class="mb-3"></h2>

                </div>
						</div>
        </div>
    </div>
</div>

<!-- Templates for specific page -->
<div class="tmplContainer">

  <div id="userCardTmpl" class="useritem rounded">
    <div class="row">
      <div class="col-md-8 useritemdesc">
        <div class="card-block">
          <h5 class="card-title"></h5>
          <h6 class='card-subtitle mb-2 text-muted dateItem'></h6><br />
          <p class="card-text"></p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-img-bottom float-right">
          <img src="resources/images/testimg.jpg" class="img-fluid imgItem" alt="Responsive image">
        </div>
        <button name="deleteitem" type="submit" class="btn btn-outline-danger userbutton deleteItemButton">Delete item</button>
      </div>
    </div>
  </div>

</div>
<script src="js/user.js"></script>
