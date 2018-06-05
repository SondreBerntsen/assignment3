function checkLoginState(){
  $.ajax({ url: 'controller/UserController.php',
           data: {action: 'checkLoginState'},
           type: 'post',
           success: function(output) {
             console.log(output);
             if(output == 'true'){
               callback('checkLoginState', 'true');
             }else{
               callback('checkLoginState', 'false');
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

    case 'login':
      if(val == 'true'){
        location.href('index.php');
      }else{
        $('#errorLogin').html('Incorrect login info');
      }
    break;

    case 'register':
      if(val == 'true'){
        location.href('index.php');
      }else{
        $('#errorLogin').html('Email already exists');
      }
    break;
  }
}
function loadGuestView(page){

  var tmpl = $('#buttonTmpl').clone();
  tmpl.removeAttr('id');
  tmpl.attr('href', 'login.php');
  tmpl.append('Log in');
  $('#headerButton').append(tmpl);

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
  var formTmpl = $('#formTmpl').clone();
  formTmpl.removeAttr('id');

  var buttonTmpl = $('#buttonTmpl').clone();
  buttonTmpl.removeAttr('id');
  buttonTmpl.attr('name', 'logout');
  buttonTmpl.attr('type', 'submit');
  buttonTmpl.append('Log out');
  formTmpl.append(tmpl);

  $('#headetButton').append(formTmpl);

  console.log('loadUserView ENGAGE');
  switch(page){
    case 'index':
      $('#').load('includes/submitButton.html');
    break;

    case 'login':
      location.href('index.php');
    break;
  }
}
