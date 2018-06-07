$(document).ready(function (){
  checkLoginState();
  loadOwnListings();
});
// Loads user's listings
function loadOwnListings(){
  // Reloads view
  $('#listItems').html('');
  // Ajax call to listOwnItems function
  $.ajax({
    url: 'controller/UserController.php',
    data: {action: 'listOwnItems'},
    type: 'post',
    success: function(output) {
      // Parses JSON output
      json = JSON.parse(output);
      // Loads existing user information
      var userfName = json.firstName;
      var userSurname = json.lastName;
      var userEmail = json.email;
      delete json.firstName;
      delete json.lastName;
      delete json.email;

      $('#userfName').html(userfName);
      $('#userSurname').html(userSurname);
      $('#userEmail').html(userEmail);
      // Clones and appends user cards for each item
      for(i=0; i < Object.keys(json).length; i++){
        var tmpl = $('#userCardTmpl').clone();
        tmpl.removeAttr('id');
        // Image path to current item's image
        var src = 'storedImages/'+json[i].itemID+'/image';
        tmpl.find('img').attr('src', src);
        tmpl.find('.card-title').html(json[i].name);
        tmpl.find('.dateItem').html(json[i].date);
        tmpl.find('.card-text').html(json[i].descr);
        // Makes onclick function call ith current itemID as parameter
        var onclickDel = 'deleteItem('+'"'+json[i].itemID+'")';
        tmpl.find('.deleteItemButton').attr('onclick', onclickDel);
        $('#listItems').append(tmpl);
      }
    }
  });
}

function updateName(){
  $.ajax({
    url: 'controller/userController.php',
    data: {
      action: 'updateName',
      firstName: $('#firstname').val(),
      lastName: $('#lastname').val()
    },
    type: 'post',
    success: function(output) {
     console.log(output);
    }
  });
}
function updateEmail(){
  $.ajax({
    url: 'controller/userController.php',
    data: {
      action: 'updateEmail',
      email: $('#email').val()
    },
    type: 'post',
    success: function(output) {
     console.log(output);
    }
  });
}
function updatePwd(){
  $.ajax({
    url: 'controller/userController.php',
    data: {
      action: 'updatePwd',
      pwd1: $('#password1').val(),
      pwd2: $('#password2').val()
    },
    type: 'post',
    success: function(output) {
     console.log(output);
    }
  });
}

function deleteItem(itemID){
  $.ajax({
    url: 'controller/userController.php',
    data: {
      action: 'deleteItem',
      itemID: itemID
    },
    type: 'post',
    success: function(output) {
      loadOwnListings();
    }
  });
}
