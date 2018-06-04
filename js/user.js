
$(document).ready(function (){
  checkLoginState();
});

function checkLoginState(){

  $.ajax({ url: 'controller/UserController.php',
           data: {action: 'checkLoginState'},
           type: 'post',
           success: function(output) {

             if(output == 'false'){
               accessDenied();
             }else{
               // Makes next ajax call current call returns 'true'
               loadSettings();
             }
           }
  });

}

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

             for(i=0; json.length > i; i++){

               var tmpl = $('#userCardTempl').clone();
               tmpl.removeAttr('id');
               tmpl.find('.card-title').html(json[i].name);
               tmpl.find('.dateItem').html(json[i].date);
               tmpl.find('.card-text').html(json[i].descr);

               var onclick = 'deleteListing('+'"'+json[i].id+'")';
               var del = $('#delTemplate').clone();

               del.removeAttr('id');
               del.attr('onclick' onclick);

               tmpl.find('.deleteSection').append(del);

               $('#listOfItems').append(tmpl);
             }

           }
  });
}
//#settings
//#listings
//#messages
