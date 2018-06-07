
 <div class="container">
   <div class="row">
     <div class="col-7">

       <!-- register form-->
       <form id="formReg" class="register" method="post">
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
         <button class="btn btn-primary" onclick="register()">Register user</button>
         <p id="errorRegister"></p>
       </form>

     </div>


     <div class="col-sm">

      <!--login form -->
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Login</h1>

          <form id="formLogin" method="post">
            <div class="form-group row">
              <div class="col-sm-12">
               <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="ext_email" name="ext_email" autofocus required placeholder="email">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="ext_pwd" name="ext_pwd" required placeholder="*******">
              </div>
            </div>
            <button class="btn btn-success" onclick="login()">Login!</button>
            <p id="errorLogin"></p>
          </form>


        </div>
      </div>

     </div>
   </div>
 </div>

 <script src="js/login.js"></script>
