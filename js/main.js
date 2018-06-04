function checkLoginState(){
  var loginState;
  $.ajax({ url: 'controller/UserController.php',
           data: {action: 'checkLoginState'},
           type: 'post',
           success: function(output) {
             if(output == 'true'){
               loginState = true;
             }else{
               loginState = false;
             }
           }
  });
  return loginState;
}

function loadGuestView(page){
  $('#headerButton').load('includes/headerButtonGuest.html');

  switch(page){
    case 'home':
      // Nothing is loaded I guess.
    break;

    case 'item'
      // Nothing is loaded here either? =(
    break;
  }
}

function loadUserView(page){
  $('#headerButton').load('includes/headerButtonUser.html');

  switch(page){
    case 'home':
      $('#').load('includes/submitButton.html');
    break;

    case 'item'
      //no idea yet
    break;
  }
}
