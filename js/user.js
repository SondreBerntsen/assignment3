$(document).ready(function (){
  //getURL();
  checkLoginState();
  loadOwnListings()
});

function accessDenied(){
  $('#content').load('accessDenied.html');
}

function loadSettings(){
  $('#settings').load('settings.php');
  loadListings();
}

function loadOwnListings(){
  $.ajax({ url: 'controller/UserController.php',
           data: {action: 'listOwnItems'},
           type: 'post',
           success: function(output) {

             json = JSON.parse(output);
             console.log(json);
             console.log(json.name);

             for(i=0; json.length > i; i++){
                console.log(json[i].name);

               var tmpl = $('#itemCardTempl').clone();
               console.log(tmpl);
               console.log(json[i].name);
               tmpl.removeAttr('id');
               tmpl.find('.card-title').html(json[i].name);
               tmpl.find('.dateItem').html(json[i].date);
               tmpl.find('.card-text').html(json[i].descr);

               ///var onclick = 'deleteListing('+'"'+json[i].id+'")';
               var del = $('#delTemplate').clone();

               del.removeAttr('id');
               //del.attr('onclick' onclick);

               tmpl.find('.deleteSection').append(del);

               $('#listings').append(tmpl);
             }

           }
  });
}
//#settings
//#listings
//#messages
