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

//Denne brukes om vi trenger return variabler uten å kjøre kode i success funksjonen til ajax callet.
function callback(func, val){

  var path = location.pathname.split('assignment3/');
  var page = path[1].split('.');

  switch(func){
    case 'checkLoginState':
      if(val == 'true'){
        loadUserView(page);
      }else{
        loadGuestView(page);
      }
    break;
  }
}
function loadGuestView(page){
  $('#headerButton').load('includes/headerButtonGuest.html');
  console.log('EXCUSE ME, WHY DOES THIS LOAD?');
  switch(page){
    case 'index':
      // Nothing is loaded I guess.
    break;

    case 'item':
      // Nothing is loaded here either? =(
    break;
  }
}

function loadUserView(page){
  $('#headerButton').load('includes/headerButtonUser.php');
  console.log('loadUserView ENGAGE');
  switch(page){
    case 'index':
      $('#').load('includes/submitButton.html');
    break;

    case 'item':
      //no idea yet
    break;
  }
}
