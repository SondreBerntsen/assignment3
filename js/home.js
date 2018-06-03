$(document).ready(function (){
  $.ajax({ url: 'controller/HomeController.php',
           data: {action: 'listCategories'},
           type: 'post',
           success: function(output) {
           json = JSON.parse(output);

           for(i=0; json.length > i; i++){

             var tmpl = $('#categoryTmpl').clone();
             tmpl.removeAttr('id');

             tmpl.find('li').html(json[i].name);
             tmpl.attr('href', 'index.php?id='+json[i].name);
             //tmpl.html(json[i].name);

             $('#listOfCategories').append(tmpl);
           }

           }
  });
  $.ajax({ url: 'controller/HomeController.php',
           data: {action: 'listItems'},
           type: 'post',
           success: function(output) {
           json = JSON.parse(output);
           console.log(json);

           for(i=0; json.length > i; i++){

             var tmpl = $('#itemCardTempl').clone();
             tmpl.removeAttr('id');
             tmpl.find('.card-title').html(json[i].name);
             tmpl.find('.dateItem').html(json[i].date);
             tmpl.find('.card-text').html(json[i].descr);

             $('#listOfItems').append(tmpl);
           }

           }
  });
});
