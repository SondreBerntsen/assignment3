function login(){

  $.ajax({ url: 'controller/UserController.php',
           data: {action: 'login'},
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

}

function register(){

  $.ajax({ url: 'controller/UserController.php',
           data: {action: 'register'},
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
