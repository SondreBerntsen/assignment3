
 <div class="container">
   <div class="row">
     <div class="col-7">
       <!-- register form-->
       <form  class="register" action="register.php" method="post">
         <div class="form-group row">
           <div class="col-sm-12">
            <label for="firstName" class="form-label">First name</label>
             <input type="text" class="form-control" id="firstName" name="firstName" autofocus required placeholder="First name">
           </div>
         </div>
         <div class="form-group row">
           <div class="col-sm-12">
             <label for="lastName" class="form-label">Last name</label>
             <input type="text" class="form-control" id="lastName" name="lastName" required placeholder="Last name">
           </div>
         </div>
         <div class="form-group row">
           <div class="col-sm-12">
             <label for="email" class="form-label">E-mail</label>
             <input type="email" class="form-control" id="email" name="email" required placeholder="E-mail">
           </div>
         </div>
         <div class="form-group row">
           <div class="col-sm-12">
             <label for="password" class="form-label">Password</label>
             <input type="password" class="form-control" id="pwd" name="pwd" required placeholder="*******">
           </div>
         </div>
           <button name="Mads sin knapp" type="submit" class="btn btn-primary">Register user</button>
       </form>
     </div>


     <div class="col-sm">
      <!--login form -->
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Login</h1>
          <form action="login.php" method="post">
            <div class="form-group row">
              <div class="col-sm-12">
               <label for="firstName" class="form-label">Email</label>
                <input type="text" class="form-control" id="firstName" name="email" autofocus required placeholder="email">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="pwd" name="pwd" required placeholder="*******">
              </div>
            </div>
              <button name="Mads sin knapp2" type="submit" class="btn btn-success">Login!</button>
          </form>
        </div>
      </div>

     </div>
   </div>
 </div>
