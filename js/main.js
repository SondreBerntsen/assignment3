function checkLoginState(){

  $.ajax({ url: 'controller/UserController.php',
           data: {action: 'checkLoginState'},
           type: 'post',
           success: function(output) {
             if(output == 'true'){
               callback('checkLoginState', 'true');
             }else{
               callback('checkLoginState', 'true');
             }
           }
  });
}

var loginState;
//Denne brukes om vi trenger return variabler uten å kjøre kode i success funksjonen til ajax callet.
function callback(func, val){
  switch(func){
    case 'checkLoginState':
      if(val == 'true'){
        loginState = true;
      }else{
        loginState = false;
      }
    break;
  }
}
function loadGuestView(page){
  $('#headerButton').load('includes/headerButtonGuest.html');

  switch(page){
    case 'home':
      // Nothing is loaded I guess.
    break;

    case 'item':
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

    case 'item':
      //no idea yet
    break;
  }
}
