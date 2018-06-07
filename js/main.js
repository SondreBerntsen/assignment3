function checkLoginState(){
  $.ajax({
    url: 'controller/UserController.php',
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
  if(path[1] != ''){
    var page = path[1].split('.')[0];
  }else{
    page = path[1];
  }
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
        location.href = 'index.php';
      }else{
        $('#errorLogin').html('Incorrect login info');
        $( '#errorLogin' ).addClass( "alertMsg alert alert-danger" );
      }
    break;

    case 'register':
      if(val == 'true'){
        location.href = 'index.php';
      }else{
        $('#errorRegister').html('Email already exists');//Fix dette funka ikke
        $( '#errorRegister' ).addClass( "alertMsg alert alert-danger" );
      }
    break;
  }
}
function loadGuestView(page){

  var tmpl = $('#loginButton').clone();
  tmpl.removeAttr('id');
  $('#headerButton').append(tmpl);

    console.log('loadGuestView ENGAGE');
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
  console.log(page);
  var formTmpl = $('#formTmpl').clone();
  formTmpl.removeAttr('id');

  var msgBtnTmpl = $('#messageButton').clone();
  msgBtnTmpl.removeAttr('id');

  var userBtnTmpl = $('#userButton').clone();
  userBtnTmpl.removeAttr('id');
  $('#headerButton').append(msgBtnTmpl);
  $('#headerButton').append(userBtnTmpl);
  $('#headerButton').append(formTmpl);
  console.log('loadUserView ENGAGE');
  switch(page){
    case 'index'||'':
      var tmpl = $('#uploadItem').clone();
      tmpl.removeAttr('id');
      $('#submitButton').append(tmpl);
    break;

    case 'login':
      location.href('index.php');
    break;
    case 'item':
      // Should check if item.owner == $_SESSION['userID'], in which case 'send message' should not load
    break;
  }
}
