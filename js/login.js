function login(){

  $.ajax({ url: 'controller/UserController.php',
           data: {
             action: 'login',
             email: $('#ext_email').val(),
             password: $('#ext_pwd').val()
            },
           type: 'post',
           success: function(output) {
             console.log(output);
             if(output == 'true'){
               callback('login', 'true');
             }else if(output == 'false'){
               callback('login', 'false');
             }
           }
  });
  getURL();
  checkLoginState();
}

function register(){

  $.ajax({ url: 'controller/UserController.php',
           data: {
             action: 'register',
             fName: $('#firstName').val(),
             surname: $('#lastName').val(),
             email: $('#email').val(),
             password: $('#pwd').val()
            },
           type: 'post',
           success: function(output) {
             console.log(output);
             if(output == 'true'){
               callback('register', 'true');
             }else if(output == 'false'){
               callback('register', 'false');
             }
           }
  });

}
