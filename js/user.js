$(document).ready(function (){
  //getURL();
  checkLoginState();
  loadOwnListings()
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
      console.log(json[0]);

      for(i=0; json.length > i; i++){

        

        var tmpl = $('#userCardTmpl').clone();
        tmpl.removeAttr('id');
        tmpl.find('.card-title').html(json[i].name);
        tmpl.find('.dateItem').html(json[i].date);
        tmpl.find('.card-text').html(json[i].descr);

        var onclick = 'deleteListing('+'"'+json[i].id+'")';
        tmpl.find('.deleteItemButton').attr('onclick', onclick);
        $('#listItems').append(tmpl);
      }
    }
  });
}
//#settings
//#listings
//#messages
