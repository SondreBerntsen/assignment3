$(document).ready(function listCategories(){
  var json;
  $.ajax({ url: 'controller/HomeController.php',
           data: {action: 'testRonny'},
           type: 'post',
           success: function(output) {
           json = JSON.parse(output);

           for(i=0; json.length > i; i++){

             var tmpl = $('#listItemTmpl').clone();
             tmpl.removeAttr('id');
             tmpl.html(json[i].name);

             $('#listOfCategories').append(tmpl);
           }

           }
  });
});
