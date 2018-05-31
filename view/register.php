<html>
<head>
  <!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/style.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>


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

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>
