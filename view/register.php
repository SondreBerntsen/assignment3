<?php
include_once '../includes/header.inc.php';
 ?>


  <div class="container">
    <h2>Registrer en ny bruker</h2>
    <div class="col-md-5 formSetup">
      <form  class="register" action="register.php" method="post">
        <div class="form-group row">
          <label for="firstName" class="col-sm-2 col-form-label">Fornavn</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="firstName" name="firstName" autofocus required placeholder="Fornavn">
          </div>
        </div>
        <div class="form-group row">
          <label for="lastName" class="col-sm-2 col-form-label">Etternavn</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="lastName" name="lastName" required placeholder="Etternavn">
          </div>
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">E-post</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" required placeholder="E-post">
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Passord</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="pwd" name="pwd" required placeholder="*******">
          </div>
        </div>
        <div class="form-group row float-right ">
          <div class="col-sm-10 ">
            <input type="submit" class="btn-primary btn"value="Registrer bruker" name="register">
          </div>
        </div>
      </form>
    </div>
  </div>

	<?php
	include_once '../includes/footer.inc.php'
	 ?>
