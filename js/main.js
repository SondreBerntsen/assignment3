// Chceks if user is logged in
function checkLoginState(){
  $.ajax({
    url: 'controller/UserController.php',
    data: {action: 'checkLoginState'},
    type: 'post',
    success: function(output) {
      // Sends output data to callback function
      if(output == 'true'){
        callback('checkLoginState', 'true');
      }else{
        callback('checkLoginState', 'false');
      }
    }
  });
}
var page;
// Responds to ajax calls and does whatever it's told to do based on which function name is sent as parameter
function callback(func, val){
  // Gets page name
  var path = location.pathname.split('assignment3/');
  if(path[1] != ''){
    var page = path[1].split('.')[0];
  }else{
    page = 'index';
  }
  // Checks function name sent as parameter
  switch(func){
    case 'checkLoginState':
      // Loads view based on login status, sends page as parameter to user view
      if(val == 'true'){
        loadUserView(page);
      }else{
        loadGuestView(page);
      }
    break;
    // Notifies user if they entered invalid login information
    case 'login':
      if(val == 'true'){
        location.href = 'index.php';
      }else{
        $('#errorLogin').html('Incorrect login info');
        $( '#errorLogin' ).addClass( "alertMsg alert alert-danger" );
      }
    break;
    // Notifies user if registration email already exists
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

// Loads guest view
function loadGuestView(page){
  console.log(page);
  switch(page){
    case 'user':
    location.href('index.php');
    break;
    case 'messages':
    location.href('index.php');
    break;
  }
  var tmpl = $('#loginButton').clone();
  tmpl.removeAttr('id');
  $('#headerButton').append(tmpl);

}

// Loads user view. Different items are cloned and appended based on page.
function loadUserView(page){
  console.log(page);
  switch(page){
    case 'index':
    console.log('ayo');
    var tmpl = $('#uploadItem').clone();
    tmpl.removeAttr('id');
    $('#submitButton').append(tmpl);
    break;
    case 'login':
    location.href('index.php');
    break;
    // =)
    case 'item':
    var tmpl = $('#sendMessageButton').clone();
    tmpl.removeAttr('id');
    $('#messageButtonContainer').append(tmpl);
    break;
  }
  var formTmpl = $('#formTmpl').clone();
  formTmpl.removeAttr('id');

  var msgBtnTmpl = $('#messageButton').clone();
  msgBtnTmpl.removeAttr('id');

  var userBtnTmpl = $('#userButton').clone();
  userBtnTmpl.removeAttr('id');

  $('#headerButton').append(msgBtnTmpl);
  $('#headerButton').append(userBtnTmpl);
  $('#headerButton').append(formTmpl);
  // Checks page and takes appropriate actions
}
