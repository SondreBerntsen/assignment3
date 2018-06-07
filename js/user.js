$(document).ready(function (){
  checkLoginState();
  loadOwnListings();
});

function accessDenied(){
  $('#content').load('accessDenied.html');
}
function loadOwnListings(){
  $.ajax({
    url: 'controller/UserController.php',
    data: {action: 'listOwnItems'},
    type: 'post',
    success: function(output) {
      json = JSON.parse(output);

      var userfName = json[0].firstName;
      var userSurname = json[0].lastName;
      var userEmail = json[0].email;

      $('#userfName').html(userfName);
      $('#userSurname').html(userSurname);
      $('#userEmail').html(userEmail);

      for(i=0; json.length > i; i++){

        var tmpl = $('#userCardTmpl').clone();
        var src = 'storedImages/'+json[i].itemID+'/image';

        tmpl.removeAttr('id');
        tmpl.find('img').attr('src', src);
        tmpl.find('.card-title').html(json[i].name);
        tmpl.find('.dateItem').html(json[i].date);
        tmpl.find('.card-text').html(json[i].descr);

        var onclick = 'deleteListing('+'"'+json[i].itemID+'")';
        tmpl.find('.deleteItemButton').attr('onclick', onclick);
        $('#listItems').append(tmpl);
      }
    }
  });
}
//#settings
//#listings
//#messages
