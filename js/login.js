function login(){
  // Ajax call which sends email and password values to login function
  $.ajax({
    url: 'controller/UserController.php',
    data: {
      action: 'login',
      email: $('#ext_email').val(),
      password: $('#ext_pwd').val()
    },
    type: 'post',
    success: function(output) {
      // Sends return value to callback function
      if(output == 'true'){
        callback('login', 'true');
      }else if(output == 'false'){
        callback('login', 'false');
      }
    }
  });
}
function register(){
  // Ajax call which sends input values to registrer fucntion
  $.ajax({
    url: 'controller/UserController.php',
    data: {
      action: 'register',
      fName: $('#firstName').val(),
      surname: $('#lastName').val(),
      email: $('#email').val(),
      password: $('#pwd').val()
    },
    type: 'post',
    success: function(output) {
      // Sends return value to callback function
      if(output == 'true'){
        callback('register', 'true');
      }else if(output == 'false'){
        callback('register', 'false');
      }
    }
  });

}
